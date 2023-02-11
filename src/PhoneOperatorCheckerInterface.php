<?php

namespace Godwin\TgPhoneOperatorChecker;

interface PhoneOperatorCheckerInterface {
    /**
     * Standardize MSISDN Format for Togo number
     * by cleaning the number
     *
     * @param string $msisdn
     * @return int
     */
    public static function clean(string $msisdn): int;

    /**
     * Check if the MSISDN is a valid Togo number
     * @param string $msisdn
     * @return string
     */
    public static function channel(string $msisdn): string;
}

