<?php

namespace Godwin\TgPhoneOperatorChecker;

interface PhoneOperatorCheckerInterface
{
    public static function clean(string $msisdn): string;

    public static function checkMSISDNLength(string $msisdn): bool;

    public static function channel(string $msisdn): string;

    public static function isValidTogoNumber(string $msisdn): bool;

    public static function getOperatorName(string $msisdn): string;
}
