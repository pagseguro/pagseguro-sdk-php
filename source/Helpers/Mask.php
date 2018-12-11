<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

namespace PagSeguro\Helpers;

/**
 * Class Mask
 * @package PagSeguro\Helpers
 */
class Mask
{
    /**
     * @param $subject
     * @param array $options
     * @return bool|string
     */
    public static function cpf($subject, array $options)
    {
        if (self::isValidType($options['type'])) {
            return self::toHash(Characters::hasSpecialChars($subject), 3, "********", "###.###.###-##");
        }
    }

    /**
     * @param $subject
     * @param array $options
     * @return bool|string
     */
    public static function rg($subject, array $options)
    {
        if (self::isValidType($options['type'])) {
            return self::toHash(Characters::hasSpecialChars($subject), 5, "*****", "##.###.###-##");
        }
    }

    /**
     * @param $subject
     * @param array $options
     * @return bool|string
     */
    public static function birthDate($subject, array $options)
    {
        if (self::isValidType($options['type'])) {
            return self::toHash(Characters::hasSpecialChars($subject), 4, "****", "##/##/####");
        }
    }

    public static function phone($subject, array $options)
    {
        if (Characters::hasSpecialChars($subject)) {
            $subject = Characters::hasSpecialChars($subject);
        }
        $options["prefix"] = true;
        if (strlen($subject) == 8) {
            return self::telephone($subject, $options);
        }
        return self::mobile($subject, $options);
    }

    /**
     * @param $subject
     * @param array $options
     * @return bool|string
     */
    public static function mobile($subject, array $options)
    {
        if (self::isValidType($options['type'])) {
            return self::toHash(
                $subject,
                5,
                "****",
                "(##) #####-####",
                ["prefix" => true, "length" => 11]
            );
        }
    }

    /**
     * @param $subject
     * @param array $options
     * @return bool|string
     */
    private static function telephone($subject, array $options)
    {
        if (self::isValidType($options['type'])) {
            return self::toHash(
                $subject,
                4,
                "****",
                "(##) ####-####",
                ["prefix" => true, "length" => 10]
            );
        }
    }

    /**
     * @param $type
     * @return bool
     */
    private static function isValidType($type)
    {
        if (\PagSeguro\Enum\Mask::isValidName(
            \PagSeguro\Enum\Mask::getType($type)
        )) {
            return true;
        }
        return false;
    }

    /**
     * @param $subject
     * @param $rule
     * @param $pattern
     * @param $mask
     * @param array $options
     * @return bool|string
     */
    private static function toHash($subject, $rule, $pattern, $mask, $options = ["prefix" => false])
    {
        if ($subject) {
            $subject = substr_replace($subject, $pattern, $rule);
            if ($options['prefix']) {
                return self::mask(str_pad($subject, $options["length"], "*", STR_PAD_LEFT), $mask);
            }
            return self::mask($subject, $mask);
        }
        return false;
    }

    /**
     * @param $value
     * @param $mask
     * @return string
     */
    private static function mask($value, $mask)
    {
        $maskared = '';
        $key = 0;
        for ($count = 0; $count <= strlen($mask) - 1; $count++) {
            if ($mask[$count] == '#') {
                if (isset($value[$key])) {
                    $maskared .= $value[$key++];
                }
            } else {
                if (isset($mask[$count])) {
                    $maskared .= $mask[$count];
                }
            }
        }
        return $maskared;
    }
}
