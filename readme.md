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
```php
use Godwin\TgPhoneOperatorChecker;

Get Channel

var_dump(PhoneOperatorChecker::channel(92000000)); // string(8) "TOGOCOM"
var_dump(PhoneOperatorChecker::channel(99000000)); // string(8) "MOOV"

Clean MSISDN

var_dump(PhoneOperatorChecker::clean("0920000000")); // int(228920000000)
```

### Tests


### Next TODO

- Verify if it si fix number and the relative region
- Add more logic and refactor clean method 
- add possibility to check number with 228
      e.g : 
      ```php
       Get Channel
        var_dump(PhoneOperatorChecker::channel(22892000000)); // string(8) "TOGOCOM"
        var_dump(PhoneOperatorChecker::channel(22899000000)); // string(8) "MOOV"
      ```