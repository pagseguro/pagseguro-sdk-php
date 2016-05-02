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

namespace PagSeguro\Resources\Factory\Shipping;

use PagSeguro\Enum\Properties\Current;

/**
 * Class Shipping
 * @package PagSeguro\Resources\Factory\Request
 */
class Address
{

    /**
     * @var \PagSeguro\Domains\Shipping
     */
    private $shipping;

    /**
     * Shipping constructor.
     * @param $shipping
     */
    public function __construct($shipping)
    {
        $this->shipping = $shipping;
    }

    /**
     * @param \PagSeguro\Domains\Addres $address
     * @return \PagSeguro\Domains\Shipping
     */
    public function instance(\PagSeguro\Domains\Address $address)
    {
        $this->shipping->setAddress($address);
        return $this->shipping;
    }

    /**
     * @param $array
     * @return \PagSeguro\Domains\Shipping
     */
    public function withArray($array)
    {
        $properties = new Current;
        $address = new \PagSeguro\Domains\Address();
        $address->setPostalCode($array[$properties::SHIPPING_ADDRESS_POSTAL_CODE])
                ->setStreet($array[$properties::SHIPPING_ADDRESS_STREET])
                ->setNumber($array[$properties::SHIPPING_ADDRESS_NUMBER])
                ->setComplement($array[$properties::SHIPPING_ADDRESS_COMPLEMENT])
                ->setDistrict($array[$properties::SHIPPING_ADDRESS_DISTRICT])
                ->setCity($array[$properties::SHIPPING_ADDRESS_NUMBER])
                ->setState($array[$properties::SHIPPING_ADDRESS_STATE])
                ->setCountry($array[$properties::SHIPPING_ADDRESS_COUNTRY]);
        $this->shipping->setAddress($address);
        return $this->shipping;
    }

    /**
     * @param $street
     * @param $number
     * @param null $complement
     * @param $district
     * @param $postalCode
     * @param $city
     * @param $state
     * @param $country
     * @return \PagSeguro\Domains\Shipping
     */
    public function withParameters(
        $street,
        $number,
        $district,
        $postalCode,
        $city,
        $state,
        $country,
        $complement = null
    ) {
        $address = new \PagSeguro\Domains\Address();
        $address->setPostalCode($postalCode)
                ->setStreet($street)
                ->setNumber($number)
                ->setComplement($complement)
                ->setDistrict($district)
                ->setCity($city)
                ->setState($state)
                ->setCountry($country);
        $this->shipping->setAddress($address);
        return $this->shipping;
    }
}
