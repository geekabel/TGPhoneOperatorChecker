<?php

namespace Godwin\TgPhoneOperatorChecker\Tests;

use PHPUnit\Framework\TestCase;
use Godwin\TgPhoneOperatorChecker\PhoneOperatorChecker;

final class PhoneOperatorCheckerTest extends TestCase
{
    public function testClean()
    {
        $msisdn = '22890234567';
        $cleaned = PhoneOperatorChecker::clean($msisdn);
        $this->assertEquals('22890234567', $cleaned);
    }

    public function testCheckMSISDNLength()
    {
        $msisdn = '22890234567';
        $length = PhoneOperatorChecker::checkMSISDNLength($msisdn);
        $this->assertEquals('22890234567', $length);

        $msisdn = '228902345678';
        $length = PhoneOperatorChecker::checkMSISDNLength($msisdn);
        $this->assertEquals(-1, $length);

        $msisdn = '22890234A678';
        $length = PhoneOperatorChecker::checkMSISDNLength($msisdn);
        $this->assertEquals(-1, $length);
    }

    public function testChannel()
    {
        // $msisdn = '22890234567';
        // $channel = PhoneOperatorChecker::channel($msisdn);
        // $this->assertEquals('TOGOCOM', $channel);

        // $msisdn = '96234567';
        // $channel = PhoneOperatorChecker::channel($msisdn);
        // $this->assertEquals('MOOV', $channel);

        $msisdn = '99999999';
        $channel = PhoneOperatorChecker::channel($msisdn);
        $this->assertEquals('MOOV', $channel);

        $msisdn = '228';
        $channel = PhoneOperatorChecker::channel($msisdn);
        $this->assertEquals('INVALID MSISDN', $channel);
    }
}