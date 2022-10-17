<?php

namespace Godwin\TgPhoneOperatorChecker;

/**
 * MSISDN PhoneOperatorChecker class
 * @author godwin K. <devsgodwin@gmail.com>
 * @see https://en.wikipedia.org/wiki/Telephone_numbers_in_Togo
 */
class PhoneOperatorChecker {
    /**
     * Standardize MSISDN Format for Togo number
     * by cleaning the number
     *
     * @param string $msisdn
     * @return int
     */
    public static function clean(string $msisdn) {

        $msisdn = preg_replace('/^[0-9]/', '228', $msisdn);

        return $msisdn;

        //return self::checkMSISDNLength($msisdn);
    }

    /**
     * Check the message count
     *
     * @param int $msisdn
     * @return int
     */
    private static function checkMSISDNLength(string $msisdn): int {
        return (int) (strlen($msisdn) == 8 && is_numeric($msisdn)) ? $msisdn : -1;
    }

    /**
     * Check if the MSISDN is a valid Togo number
     * @param string $msisdn
     * @return string
     */
    public static function channel(string $msisdn): string {
        $clean_msisdn = self::checkMSISDNLength($msisdn);

        if (in_array(substr($clean_msisdn, 0, 2), PhoneOperatorChecker::TOGOCOM_PREFIXES)) {
            return strval('TOGOCOM');
        }

        if (in_array(substr($clean_msisdn, 0, 2), PhoneOperatorChecker::MOOV_AFRICA_PREFIXES)) {
            return strval('MOOV');
        }

        return strval('UNDEFINED');
    }

    const TOGOCOM_PREFIXES = ["90", "92", "91", "70", "93"];

    const MOOV_AFRICA_PREFIXES = ["96", "97", "98", "99"];

}