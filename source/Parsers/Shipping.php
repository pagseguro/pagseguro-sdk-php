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

use PagSeguro\Domains\Requests\Requests;

/**
 * Class Shipping
 * @package PagSeguro\Parsers
 */
trait Shipping
{
    /**
     * @param Requests $request
     * @param $properties
     * @return array
     */
    public static function getData(Requests $request, $properties)
    {
        $data = [];
        // shipping
        if (!is_null($request->getShipping())) {
            // type
            if (!is_null($request->getShipping()->getType())) {
                $data = array_merge($data, self::type($request, $properties));
            }
            // cost
            if (!is_null($request->getShipping()->getCost())) {
                $data = array_merge($data, self::cost($request, $properties));
            }
            // address
            if (!is_null($request->getShipping()->getAddress())) {
                $data = array_merge($data, self::address($request, $properties));
            }
        }
        return $data;
    }

    /**
     * @param $request
     * @param $properties
     * @return float|string
     */
    private static function cost($request, $properties)
    {
        $data = [];
        $data[$properties::SHIPPING_COST] = \PagSeguro\Helpers\Currency::toDecimal(
            $request->getShipping()->getCost()->getCost()
        );
        return $data;
    }

    /**
     * @param $request
     * @param $properties
     * @return mixed
     */
    private static function type($request, $properties)
    {
        $data = [];
        $data[$properties::SHIPPING_TYPE] = $request->getShipping()->getType()->getType();
        return $data;
    }

    /**
     * @param $request
     * @param $properties
     * @return array
     */
    private static function address($request, $properties)
    {
        $data = [];
        if (!is_null($request->getShipping()->getAddress()->getStreet())) {
            $data[$properties::SHIPPING_ADDRESS_STREET] = $request->getShipping()->getAddress()->getStreet();
        }
        if (!is_null($request->getShipping()->getAddress()->getNumber())) {
            $data[$properties::SHIPPING_ADDRESS_NUMBER] = $request->getShipping()->getAddress()->getNumber();
        }
        if (!is_null($request->getShipping()->getAddress()->getComplement())) {
            $data[$properties::SHIPPING_ADDRESS_COMPLEMENT] = $request->getShipping()->getAddress()->getComplement();
        }
        if (!is_null($request->getShipping()->getAddress()->getCity())) {
            $data[$properties::SHIPPING_ADDRESS_CITY] = $request->getShipping()->getAddress()->getCity();
        }
        if (!is_null($request->getShipping()->getAddress()->getState())) {
            $data[$properties::SHIPPING_ADDRESS_STATE] = $request->getShipping()->getAddress()->getState();
        }
        if (!is_null($request->getShipping()->getAddress()->getDistrict())) {
            $data[$properties::SHIPPING_ADDRESS_DISTRICT] = $request->getShipping()->getAddress()->getDistrict();
        }
        if (!is_null($request->getShipping()->getAddress()->getPostalCode())) {
            $data[$properties::SHIPPING_ADDRESS_POSTAL_CODE] = $request->getShipping()->getAddress()->getPostalCode();
        }
        if (!is_null($request->getShipping()->getAddress()->getCountry())) {
            $data[$properties::SHIPPING_ADDRESS_COUNTRY] = $request->getShipping()->getAddress()->getCountry();
        }
        return $data;
    }
}
