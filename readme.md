 ## Phone Operator Checker

 This package basically enforces the standard number format of 228 prefix of Togolese based mobile numbers. 
 The clean method also checks for the validity of an MSISDN number if given as 7XX, 9XX or 2289XX formats. 
 Prefixes are updated courtesy of https://en.wikipedia.org/wiki/Telephone_numbers_in_Togo


 ### Requirements
- [PHP 7.4 or higher](https://www.php.net/downloads.php)
- [Composer](https://getcomposer.org/)

### Installation

```bash
$ composer require 
```

 ### Usage
 To use the PhoneOperatorChecker class, you can call its channel method with a given MSISDN:
```php
use Godwin\TgPhoneOperatorChecker;

use PhoneOperatorChecker;

$msisdn = "22892000000";

$cleaned_msisdn = PhoneOperatorChecker::clean($msisdn);
$operator = PhoneOperatorChecker::channel($cleaned_msisdn);

echo $operator; // outputs "TOGOCOM"

```

### Tests
You can write test cases for the PhoneOperatorChecker class to verify its behavior. Here's an example using PHPUnit:

```php
use PhoneOperatorChecker;
use PHPUnit\Framework\TestCase;

class PhoneOperatorCheckerTest extends TestCase {
  public function testClean() {
    $msisdn = "22892000000";
    $expected = 22892000000;

    $result = PhoneOperatorChecker::clean($msisdn);
    $this->assertEquals($expected, $result);
  }

  public function testChannel() {
    $msisdn = "22892000000";
    $expected = "TOGOCOM";

    $result = PhoneOperatorChecker::channel($msisdn);
    $this->assertEquals($expected, $result);
  }
}
```

### Next TODO

- Soon..

- En cours