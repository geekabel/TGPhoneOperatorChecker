<?php

namespace Godwin\TgPhoneOperatorChecker;

interface PhoneOperatorCheckerInterface {
    public static function clean(string $msisdn): int;

}
