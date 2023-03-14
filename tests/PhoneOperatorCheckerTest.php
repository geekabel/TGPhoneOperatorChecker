<?php

namespace Godwin\TgPhoneOperatorChecker\Tests;

use PHPUnit\Framework\TestCase;

final class PhoneOperatorCheckerTest extends TestCase
{
    public function testCleanMSISDN()
    {
        $msisdn = '920000000';
        $cleanedMsisdn = PhoneOperatorChecker::clean($msisdn);

        $this->assertEquals('228' . $msisdn, $cleanedMsisdn);
    }

    public function testCheckMSISDNLength()
    {
        $msisdn = '920000000';
        $checkedMsisdn = PhoneOperatorChecker::checkMSISDNLength($msisdn);

        $this->assertEquals($msisdn, $checkedMsisdn);
    }

    public function testInvalidMSISDN()
    {
        $msisdn = '92000000';
        $checkedMsisdn = PhoneOperatorChecker::checkMSISDNLength($msisdn);

        $this->assertEquals(-1, $checkedMsisdn);
    }

    public function testTogocomChannel()
    {
        $msisdn = '920000000';
        $channel = PhoneOperatorChecker::channel($msisdn);

        $this->assertEquals('TOGOCOM', $channel);
    }

    public function testMoovAfricaChannel()
    {
        $msisdn = '970000000';
        $channel = PhoneOperatorChecker::channel($msisdn);

        $this->assertEquals('MOOV', $channel);
    }

    public function testUndefinedChannel()
    {
        $msisdn = '860000000';
        $channel = PhoneOperatorChecker::channel($msisdn);

        $this->assertEquals('UNDEFINED', $channel);
    }

    public function testCleanedMSISDNWith228Prefix()
    {
        $msisdn = '228920000000';
        $cleanedMsisdn = PhoneOperatorChecker::clean($msisdn);

        $this->assertEquals($msisdn, $cleanedMsisdn);
    }

}