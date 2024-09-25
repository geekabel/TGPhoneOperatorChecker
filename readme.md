# TG Phone Operator Checker

TG Phone Operator Checker is a PHP package that allows you to validate and identify Togolese phone numbers. It provides functionality to clean phone numbers, check their validity, and determine the mobile operator.

## Features

- Clean and standardize Togolese phone numbers
- Validate Togolese phone numbers
- Identify the mobile operator (TOGOCOM or MOOV)
- PHP 8.3 compatible

## Installation

You can install this package via Composer. Run the following command in your project directory:

```bash
composer require godwin/tg-phone-operator-checker
```

## Usage

Here's a quick example of how to use the TG Phone Operator Checker:

```php
use Godwin\TgPhoneOperatorChecker\PhoneOperatorChecker;

// Clean a phone number
$cleanNumber = PhoneOperatorChecker::clean('90123456');
echo $cleanNumber; // Outputs: 22890123456

// Check if a number is valid
$isValid = PhoneOperatorChecker::isValidTogoNumber('22890123456');
echo $isValid ? 'Valid' : 'Invalid'; // Outputs: Valid

// Get the operator for a phone number
$operator = PhoneOperatorChecker::getOperatorName('22890123456');
echo $operator; // Outputs: TOGOCOM
```

### Available Methods

- `clean(string $msisdn): string`: Standardizes the MSISDN format for Togo numbers.
- `checkMSISDNLength(string $msisdn): bool`: Checks if the MSISDN length is valid.
- `channel(string $msisdn): string`: Returns the operator channel (TOGOCOM or MOOV) for a given MSISDN.
- `isValidTogoNumber(string $msisdn): bool`: Checks if the given number is a valid Togo number.
- `getOperatorName(string $msisdn): string`: Returns the operator name for a given MSISDN.

## Development

To set up the project for development:

1. Clone the repository
2. Run `composer install` to install dependencies

### Running Tests

To run the test suite:

```bash
composer test
```

To generate a code coverage report:

```bash
composer test-coverage
```

### Code Style

This project uses PHP-CS-Fixer for code style. To check your code:

```bash
composer cs-check
```

To automatically fix code style issues:

```bash
composer cs-fix
```

### Static Analysis

Rector is used for automated code upgrades and refactoring. To run Rector:

```bash
composer rector
```

To see what changes Rector would make without applying them:

```bash
composer rector-dry-run
```

### All Checks

To run all checks (tests, code style, and Rector):

```bash
composer check-all
```

To apply all fixes:

```bash
composer fix-all
```

## Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.
