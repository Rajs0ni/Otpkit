
# Laravel OTP
[![Total Downloads](https://poser.pugx.org/rytescube/otpkit/downloads)](https://packagist.org/packages/rytescube/otpkit)
[![License](https://poser.pugx.org/rytescube/otpkit/license)](https://packagist.org/packages/rytescube/otpkit)
[![Issues](https://img.shields.io/github/issues/Rajs0ni/otpkit.svg?style=flat-square)](https://github.com/Rajs0ni/Otpkit/issues)
[![Issues](https://img.shields.io/github/stars/Rajs0ni/otpkit.svg?style=flat-square)](https://github.com/Rajs0ni/Otpkit/stargazers)

Laravel package to generate otp or one time password.

## Installation

In Laravel 5.5+ otpkit will install via the new package discovery feature so you only need to add the package to your composer.json file

```shell
composer require rytescube/otpkit
```

after installation you should see

```shell
Discovered Package: rytescube/otpkit
```

and you are ready to go
## Basic Usage

For quick generation of an OTP just do

```php
Otp::generate();
```
This will generate a numeric OTP having length 4.

## Advanced Usage
### OTP generation

Generate an OTP using three variant. You can set the length of the OTP. If not supplied it will generate an OTP having default length 4.
```php
Otp::generate($type,$length);
```
| Params | Value | Description | Example |
| :------------ | :------------- | :------------- | :------------- |
| $type | `Otp::ALPHA` | Generates only alphabetic characters type OTP | `Otp::generate(Otp::ALPHA);` //AXBZ |
| | `Otp::NUM` (Default) | Generates only numeric type OTP | `Otp::generate(Otp::NUM);` //1234 |
| | `Otp::ALPHA_NUM` | Generates mix of alphabetic characters & numeric type OTP | `Otp::generate(Otp::ALPHA_NUM);` //1A3D |
| $length | 4 (Default)  \|  5  \|  6 | Decides the length of the OTP. | `Otp::generate(Otp::ALPHA_NUM,5);` //2X8DT |

