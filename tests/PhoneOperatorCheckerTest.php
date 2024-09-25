<?php

declare(strict_types=1);

namespace Godwin\TgPhoneOperatorChecker\Tests;

use Godwin\TgPhoneOperatorChecker\PhoneOperatorChecker;
use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class PhoneOperatorCheckerTest extends TestCase
{
    #[DataProvider('validNumbersProvider')]
    public function testCleanWithValidNumbers(string $input, string $expected): void
    {
        $this->assertSame($expected, PhoneOperatorChecker::clean($input));
    }

    #[DataProvider('invalidNumbersProvider')]
    public function testCleanWithInvalidNumbers(string $input): void
    {
        $this->expectException(InvalidArgumentException::class);
        PhoneOperatorChecker::clean($input);
    }

    public function testChannelWithValidNumbers(): void
    {
        $this->assertSame('TOGOCOM', PhoneOperatorChecker::channel('22890123456'));
        $this->assertSame('MOOV', PhoneOperatorChecker::channel('22896123456'));
    }

    public function testChannelWithInvalidNumbers(): void
    {
        $this->expectException(InvalidArgumentException::class);
        PhoneOperatorChecker::channel('22880123456');
    }

    public function testIsValidTogoNumber(): void
    {
        $this->assertTrue(PhoneOperatorChecker::isValidTogoNumber('22890123456'));
        $this->assertTrue(PhoneOperatorChecker::isValidTogoNumber('90123456'));
        $this->assertFalse(PhoneOperatorChecker::isValidTogoNumber('22880123456'));
    }

    public static function validNumbersProvider(): array
    {
        return [
            ['90123456', '22890123456'],
            ['22890123456', '22890123456'],
            ['228 90 12 34 56', '22890123456'],
        ];
    }

    public static function invalidNumbersProvider(): array
    {
        return [
            ['1234567'],
            ['228801234567'],
            ['abcdefghijk'],
        ];
    }
}