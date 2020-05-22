<?php

namespace App;

use InvalidArgumentException;

/**
 * Class Email.
 */
class Email
{
    /**
     * @param $mailAddress
     * @return string
     * @throws InvalidArgumentException
     */
    public static function send($mailAddress)
    {
        if (filter_var($mailAddress, FILTER_VALIDATE_EMAIL)) {
            return 'e-Mail sent to: '. $mailAddress;
        }

        throw new InvalidArgumentException('Invalid e-mail address.');
    }

}