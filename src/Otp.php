<?php

namespace Rytescube\Otpkit;

use Exception;

class Otp
{
    /**
     * Class Otp
     * @package Rytescube\Otpkit
     *
     * @property string $type
     * @property integer $length
     * @property array $characters
     * @property integer $max_index
     * @property integer $index
     * @property string $random_str
     * @property integer $round
     *
     */

    /**
     *  Represents numeric otp type
     *  @var string
     */
    const NUM = 'NUM';

    /**
     *  Represents alphabetic character otp type
     *  @var string
     */
    const ALPHA = 'ALPHA';

    /**
     *  Represents mix of alphabetic character & numeric  otp type
     *  @var string
     */
    const ALPHA_NUM = 'ALPHA_NUM';

    /**
     *  Minimum length of otp
     *  @var integer
     */
    const MIN_LENGTH = 4;

    /**
     *  Maximum length of otp
     *  @var integer
     */
    const MAX_LENGTH = 6;

    /**
     * @param string $type
     * @param integer $length
     * @return OTP
     * @throws Exception
     */
    public static function generate(
        $type = self::NUM,
        $length = self::MIN_LENGTH
    ) {
        self::validateLength($length);
        switch ((string) $type) {
            case self::NUM:
                return static::numOtp($length);
            case self::ALPHA:
                return static::alphaOtp($length);
            case self::ALPHA_NUM:
                return static::alphaNumOtp($length);
            default:
                throw new Exception(
                    'Selected Otp type is invalid or unsupported.'
                );
        }
    }

    /**
     * @param integer $length
     * @return string
     */
    protected static function numOtp($length)
    {
        $characters = range('1', '9');
        return self::doGenerate($characters, $length);
    }

    /**
     * @param integer $length
     * @return string
     */
    protected static function alphaOtp($length)
    {
        $characters = range('A', 'Z');
        return self::doGenerate($characters, $length);
    }

    /**
     * @param integer $length
     * @return string
     */
    protected static function alphaNumOtp($length)
    {
        $characters = self::alphaNumCharacters();
        return self::doGenerate($characters, $length);
    }

    /**
     * @param void
     * @return array
     */

    public static function alphaNumCharacters()
    {
        return array_merge(range('A', 'Z'), range('0', '9'));
    }

    /**
     * @param array $characters
     * @param integer $length
     * @return string $random_str
     */
    public static function doGenerate($characters, $length)
    {
        $random_str = '';
        $max_index = count($characters) - 1;
        for ($round = 0; $round < $length; $round++) {
            $index = mt_rand(0, $max_index);
            $random_str .= $characters[$index];
        }
        return $random_str;
    }

    /**
     * @param integer $length
     * @throws Exception
     */
    protected static function validateLength($length)
    {
        if ($length < self::MIN_LENGTH || $length > self::MAX_LENGTH) {
            throw new Exception(
                'Selected otp length is invalid or unsupported.'
            );
        }
    }
}
