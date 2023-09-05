# Package OtpWasento

An OTP, or one-time password, is a randomly generated password that is sent to the user's device, such as their phone or computer, via WhatsApp, just before they log in to an account. OTPs are a type of two-factor authentication (2FA), which means that they require two different pieces of information to verify the user's identity. The first piece of information is usually the user's username and password, and the second piece of information is the OTP.

## Installation
```ssh
composer require wasento/package-wasento-otp
```

## Get countries

```php
use WASENTO\OtpWasento\{OtpWasentoApi,
	OtpWasentoConfig
};

OtpWasentoConfig::$api = 'YOUR_API_KEY';
$results = (new OtpWasentoApi)->countries();
var_dump($results);
```

**Sample Response:**
```php
stdClass Object
(
    [success] => 1
    [message] => success
    [results] => Array
        (
            [0] => stdClass Object
                (
                    [name] => Afghanistan
                    [alpha-2] => AF
                    [country-code] => 004
                )
             ...
        )
)
```

## Request OTP

```php
use WASENTO\OtpWasento\{OtpWasentoApi,
	OtpWasentoConfig
};

OtpWasentoConfig::$api = 'YOUR_API_KEY';
$results = (new OtpWasentoApi)->requestOtp('081xxxxxxxx','ID','{code} is your OTP');
var_dump($results);
```

**Sample Response:**
```php
stdClass Object
(
    [success] => 1
    [message] => success
    [results] => c442f0d92c0fec0d7a4414fc83323942
)
```

## Verify OTP

```php
use WASENTO\OtpWasento\{OtpWasentoApi,
	OtpWasentoConfig
};

OtpWasentoConfig::$api = 'YOUR_API_KEY';
$results = (new OtpWasentoApi)->verifyOtp('c442f0d92c0fec0d7a4414fc83323942','418639');
var_dump($results);
```

**Sample Response:**
```php
stdClass Object
(
    [success] => 1
    [message] => success
    [results] => 
)
```

**NOTE:**
- [x] OTP code valid for 5 minutes. It`s mean user cannot request multiple times with same phone number before OTP code expired. 
