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
 * Class with helper functions to format strings
 *
 */
class StringFormat
{
    /***
     * Remove all non digit character from string
     * @param string $value
     * @return string
     */
    public static function getOnlyNumbers($value)
    {
        return preg_replace('/\D/', '', $value);
    }

    /***
     * Return formatted string to send in PagSeguro request
     * @param string $string
     * @param int $limit
     * @param mixed $endchars
     * @return string
     */
    public static function formatString($string, $limit, $endchars = '...')
    {
        $string = self::removeStringExtraSpaces($string);
        return self::truncateValue($string, $limit, $endchars);
    }

    /***
     * Remove left, right and inside extra spaces in string
     * @param string $string
     * @return string
     */
    public static function removeStringExtraSpaces($string)
    {
        return trim(preg_replace("/( +)/", " ", $string));
    }

    /***
     * Perform truncate of string value
     * @param string $string
     * @param int $limit
     * @param mixed $endchars
     * @return string
     */
    public static function truncateValue($string, $limit, $endchars = '...')
    {
        if (!is_array($string) && !is_object($string)) {
            $stringLength = strlen($string);
            $endcharsLength = strlen($endchars);

            if ($stringLength > (int)$limit) {
                $cut = (int)($limit - $endcharsLength);
                $string = substr($string, 0, $cut) . $endchars;
            }
        }
        return $string;
    }
}
