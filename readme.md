
# Laravel OTP

Laravel package to generate otp or one time password.

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
| Params  | Value                     | Description                                               | Example                                    |
| :------ | :------------------------ | :-------------------------------------------------------- | :----------------------------------------- |
| $type   | `Otp::ALPHA`              | Generates only alphabetic characters type OTP             | `Otp::generate(Otp::ALPHA);` //AXBZ        |
|         | `Otp::NUM` (Default)      | Generates only numeric type OTP                           | `Otp::generate(Otp::NUM);` //1234          |
|         | `Otp::ALPHA_NUM`          | Generates mix of alphabetic characters & numeric type OTP | `Otp::generate(Otp::ALPHA_NUM);` //1A3D    |
| $length | 4 (Default)  \|  5  \|  6 | Decides the length of the OTP.                            | `Otp::generate(Otp::ALPHA_NUM,5);` //2X8DT |

