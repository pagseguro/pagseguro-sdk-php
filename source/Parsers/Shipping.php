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

namespace PagSeguro\Parsers;

use PagSeguro\Domains\Requests\Request;
use PagSeguro\Helpers\Currency;

/**
 * Class Shipping
 * @package PagSeguro\Parsers
 */
trait Shipping
{
    /**
     * @param Request $payment
     * @param $properties
     * @return array
     */
    public static function getData(Request $payment, $properties)
    {
        $data = [];
        // shipping
        if (!is_null($payment->getShipping())) {
            // type
            if (!is_null($payment->getShipping()->getType())) {
                array_merge($data, self::type($payment, $properties));
            }
            // cost
            if (!is_null($payment->getShipping()->getCost())) {
                array_merge($data, self::cost($payment, $properties));
            }
            // address
            if (!is_null($payment->getShipping()->getAddress())) {
                array_merge($data, self::address($payment, $properties));
            }
        }
        return $data;
    }

    /**
     * @param $payment
     * @param $properties
     * @return float|string
     */
    private static function cost($payment, $properties)
    {
        $data = [];
        $data[$properties::SHIPPING_COST] = Currency::toDecimal($payment->getShipping()->getCost()->getCost());
        return $data;
    }

    /**
     * @param $payment
     * @param $properties
     * @return mixed
     */
    private static function type($payment, $properties)
    {
        $data = [];
        $data[$properties::SHIPPING_TYPE] = $payment->getShipping()->getType()->getType();
        return $data;
    }

    /**
     * @param $payment
     * @param $properties
     * @return array
     */
    private static function address($payment, $properties)
    {
        $data = [];
        if (!is_null($payment->getShipping()->getAddress()->getStreet())) {
            $data[$properties::SHIPPING_ADDRESS_STREET] = $payment->getShipping()->getAddress()->getStreet();
        }
        if (!is_null($payment->getShipping()->getAddress()->getNumber())) {
            $data[$properties::SHIPPING_ADDRESS_NUMBER] = $payment->getShipping()->getAddress()->getNumber();
        }
        if (!is_null($payment->getShipping()->getAddress()->getComplement())) {
            $data[$properties::SHIPPING_ADDRESS_COMPLEMENT] = $payment->getShipping()->getAddress()->getComplement();
        }
        if (!is_null($payment->getShipping()->getAddress()->getCity())) {
            $data[$properties::SHIPPING_ADDRESS_CITY] = $payment->getShipping()->getAddress()->getCity();
        }
        if (!is_null($payment->getShipping()->getAddress()->getState())) {
            $data[$properties::SHIPPING_ADDRESS_STATE] = $payment->getShipping()->getAddress()->getState();
        }
        if (!is_null($payment->getShipping()->getAddress()->getDistrict())) {
            $data[$properties::SHIPPING_ADDRESS_DISTRICT] = $payment->getShipping()->getAddress()->getDistrict();
        }
        if (!is_null($payment->getShipping()->getAddress()->getPostalCode())) {
            $data[$properties::SHIPPING_ADDRESS_POSTAL_CODE] = $payment->getShipping()->getAddress()->getPostalCode();
        }
        if (!is_null($payment->getShipping()->getAddress()->getCountry())) {
            $data[$properties::SHIPPING_ADDRESS_COUNTRY] = $payment->getShipping()->getAddress()->getCountry();
        }
        return $data;
    }
}
