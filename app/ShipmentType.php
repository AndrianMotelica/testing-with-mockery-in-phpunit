<?php

namespace App;

use Exception;
use InvalidArgumentException;

/**
 * ShipmentType.
 * @see ShipmentTypeTest
 */
class ShipmentType
{
    public const BOAT  = 'Boat';
    public const PLANE = 'Plane';
    public const TRAIN = 'Train';

    public static function freight(string $transport): string
    {
        switch ($transport) {
            case self::BOAT:
            case self::PLANE:
            case self::TRAIN:
                return $transport;
            default:
                throw new InvalidArgumentException('Incorrect freight type.');
        }
    }
}