<?php

namespace App;

use InvalidArgumentException;

/**
 * ShipmentDetails.
 * @see ShipmentDetailsTest
 */
class ShipmentDetails
{
    /** @var Address $address */
    private $address;

    /** @var string $shipmentType */
    private $shipmentType;

    public function __construct()
    {
        $this->address = new Address();
    }

    /**
     * @param array $shipmentDetails
     */
    public function initiateShipment(array $shipmentDetails): void
    {
        $this->shipmentType = ShipmentType::freight($shipmentDetails['shipmentType']);
        $this->address->setStreet($shipmentDetails['street']);
        $this->address->setEmail($shipmentDetails['email']);
    }

    /**
     * @return string
     * @throws InvalidArgumentException
     */
    public function notifyRecipientWhenDelivered(): string
    {
        return Email::send($this->address->getEmail());
    }

    /**
     * @return string
     */
    public function getShipmentType(): string
    {
        return $this->shipmentType;
    }
}
