<?php

namespace Godwin\TgPhoneOperatorChecker;

use InvalidArgumentException;

/**
 * MSISDN PhoneOperatorChecker class
 * @author godwin K. <devsgodwin@gmail.com>
 * @see https://en.wikipedia.org/wiki/Telephone_numbers_in_Togo
 */
class PhoneOperatorChecker implements PhoneOperatorCheckerInterface
{
    public const COUNTRY_CODE = '228';
    public const MSISDN_LENGTH = 8;
    public const FULL_MSISDN_LENGTH = 11;

    public const TOGOCOM_PREFIXES = ['70', '71', '90', '91', '92', '93'];
    public const MOOV_PREFIXES = ['79', '94', '95', '96', '97', '98', '99'];

    /**
     * Standardize MSISDN Format for Togo number
     * by cleaning the number
     *
     * @throws InvalidArgumentException
     */
    public static function clean(string $msisdn): string
    {
        $msisdn = preg_replace('/\D/', '', $msisdn);

        return match (strlen((string) $msisdn)) {
            self::MSISDN_LENGTH => self::COUNTRY_CODE . $msisdn,
            self::FULL_MSISDN_LENGTH => str_starts_with((string) $msisdn, self::COUNTRY_CODE) ? $msisdn : throw new InvalidArgumentException("Invalid MSISDN format"),
            default => throw new InvalidArgumentException("Invalid MSISDN format"),
        };
    }

    /**
     * Check the length of the MSISDN
     */
    public static function checkMSISDNLength(string $msisdn): bool
    {
        return strlen($msisdn) === self::FULL_MSISDN_LENGTH && is_numeric($msisdn);
    }

    /**
     * Check if the MSISDN is a valid Togo number
     * @throws InvalidArgumentException
     */
    public static function channel(string $msisdn): string
    {
        $clean_msisdn = self::clean($msisdn);

        if (! self::checkMSISDNLength($clean_msisdn)) {
            throw new InvalidArgumentException("Invalid MSISDN length");
        }

        $prefix = substr($clean_msisdn, 3, 2);

        return match (true) {
            in_array($prefix, self::TOGOCOM_PREFIXES) => 'TOGOCOM',
            in_array($prefix, self::MOOV_PREFIXES) => 'MOOV',
            default => throw new InvalidArgumentException("Undefined operator for prefix: $prefix"),
        };
    }

    /**
     * Validate if the MSISDN is a valid Togo number
     */
    public static function isValidTogoNumber(string $msisdn): bool
    {
        try {
            $clean_msisdn = self::clean($msisdn);
            $prefix = substr($clean_msisdn, 3, 2);

            return in_array($prefix, [...self::TOGOCOM_PREFIXES, ...self::MOOV_PREFIXES]);
        } catch (InvalidArgumentException) {
            return false;
        }
    }

    /**
     * Get the operator name for a given MSISDN
     * @throws InvalidArgumentException
     */
    public static function getOperatorName(string $msisdn): string
    {
        return self::channel($msisdn);
    }
}
