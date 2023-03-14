<?php

namespace Godwin\TgPhoneOperatorCheckerTest;

use PHPUnit\Framework\TestCase;
use Godwin\TgPhoneOperatorChecker\PhoneOperatorChecker;

final class PhoneOperatorCheckerTest extends TestCase
{
    public function testClean()
    {
        $msisdn = '902345678';
        $cleaned = PhoneOperatorChecker::clean($msisdn);
        $this->assertEquals('228902345678', $cleaned);
    }

    public function testCheckMSISDNLength()
    {
        $msisdn = '228902345678';
        $length = PhoneOperatorChecker::checkMSISDNLength($msisdn);
        $this->assertEquals(228902345678, $length);

        $msisdn = '22890234567';
        $length = PhoneOperatorChecker::checkMSISDNLength($msisdn);
        $this->assertEquals(-1, $length);

        $msisdn = '22890234A678';
        $length = PhoneOperatorChecker::checkMSISDNLength($msisdn);
        $this->assertEquals(-1, $length);
    }

    public function testChannel()
    {
        $msisdn = '902345678';
        $channel = PhoneOperatorChecker::channel($msisdn);
        $this->assertEquals('TOGOCOM', $channel);

        $msisdn = '962345678';
        $channel = PhoneOperatorChecker::channel($msisdn);
        $this->assertEquals('MOOV', $channel);

        $msisdn = '999999999';
        $channel = PhoneOperatorChecker::channel($msisdn);
        $this->assertEquals('MOOV', $channel);

        $msisdn = '228';
        $channel = PhoneOperatorChecker::channel($msisdn);
        $this->assertEquals('INVALID MSISDN', $channel);
    }
}