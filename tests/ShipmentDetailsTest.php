<?php

namespace UT;

use App\Address;
use App\Email;
use App\ShipmentDetails;
use App\ShipmentType;
use InvalidArgumentException;
use Mockery as m;
use Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
use Mockery\MockInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class ShipmentDetailsTest
 */
class ShipmentDetailsTest extends TestCase
{
    use MockeryPHPUnitIntegration;

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws InvalidArgumentException
     */
    public function test_Shipment(): void
    {
        $shipmentData = [
            'shipmentType' => $freightType = 'train',
            'email' => $email = 'ras@lerdorf.com',
            'street' => $street = 'Piccadilly'
        ];

        /** @var ShipmentType&MockInterface $emailMock */
        $shipmentTypeMock = m::mock('alias:'.ShipmentType::class);
        $shipmentTypeMock->shouldReceive('freight')
            ->with($freightType)
            ->andReturn($freightType)
            ->once();

        /** @var Address&MockInterface $addressMock */
        $addressMock = m::mock('overload:'.Address::class);
        $addressMock->shouldReceive('setStreet')
            ->with($street)
            ->once();
        $addressMock->shouldReceive('setEmail')
            ->with($email)
            ->once();
        $addressMock->shouldReceive('getEmail')
            ->andReturn($email)
            ->once();

        /** @var ShipmentType&MockInterface $emailMock */
        $shipmentTypeMock = m::mock('alias:'.Email::class);
        $shipmentTypeMock->shouldReceive('send')
            ->with($email)
            ->andReturn('e-Mail sent to: '. $email)
            ->once();

        $shipmentDetails = new ShipmentDetails();
        $shipmentDetails->initiateShipment($shipmentData);

        $this->assertSame($freightType, $shipmentDetails->getShipmentType());
        $shipmentDetails->notifyRecipientWhenDelivered();
    }

    /**
     * @runInSeparateProcess
     * @preserveGlobalState disabled
     * @throws InvalidArgumentException
     */
    public function test_Notify_Recipient_When_Delivered_On_Exception(): void
    {
        $invalidEmail = 'http://some.site.address';

        $this->expectException(InvalidArgumentException::class);

        /** @var Address&MockInterface $addressMock */
        $addressMock = m::mock('overload:'.Address::class);
        $addressMock->shouldReceive('getEmail')
            ->andReturn($invalidEmail)
            ->once();

        /** @var ShipmentType&MockInterface $emailMock */
        $shipmentTypeMock = m::mock('alias:'.Email::class);
        $shipmentTypeMock->shouldReceive('send')
            ->with($invalidEmail)
            ->once()
            ->andThrow(new InvalidArgumentException('Mail Address is not valid.'));

        $shipmentDetails = new ShipmentDetails();
        $shipmentDetails->notifyRecipientWhenDelivered();
    }
}
