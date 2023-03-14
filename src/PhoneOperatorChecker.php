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
     * @return string
     */
    public static function clean(string $msisdn) {
        if (strlen($msisdn) == 10 && substr($msisdn, 0, 3) != '228') {
            $msisdn = '228' . $msisdn;
        }

        return $msisdn;
    }

    /**
     * Check the length of the MSISDN
     *
     * @param string $msisdn
     * @return int
     */
    public static function checkMSISDNLength(string $msisdn): int {
        return (int) (strlen($msisdn) == 11 && is_numeric($msisdn)) ? $msisdn : -1;
    }

    /**
     * Check if the MSISDN is a valid Togo number
     * @param string $msisdn
     * @return string
     */
    public static function channel(string $msisdn): string {
        $clean_msisdn = self::clean($msisdn);
        $msisdn_length = self::checkMSISDNLength($clean_msisdn);

        if ($msisdn_length == -1) {
            return 'INVALID MSISDN';
        }

        if (in_array(substr($msisdn_length, 3, 2), PhoneOperatorChecker::TOGOCOM_PREFIXES)) {
            return 'TOGOCOM';
        }

        if (in_array(substr($msisdn_length, 3, 2), PhoneOperatorChecker::MOOV_AFRICA_PREFIXES)) {
            return 'MOOV';
        }

        return 'UNDEFINED';
    }

    const TOGOCOM_PREFIXES = ["22890", "22892", "22891", "22870", "22893"];

    const MOOV_AFRICA_PREFIXES = ["22896", "22897", "22898", "22899"];
}

