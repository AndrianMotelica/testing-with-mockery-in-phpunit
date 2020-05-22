<?php

namespace UT;

use App\ShipmentType;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;

class ShipmentTypeTest extends TestCase
{

    public function testFreight(): void
    {
        $this->assertSame(
            'Train',
            ShipmentType::freight(ShipmentType::TRAIN)
        );
    }

    public function testFreightException(): void
    {
        $this->expectException(InvalidArgumentException::class);

        ShipmentType::freight('not_existent_type');
    }
}
