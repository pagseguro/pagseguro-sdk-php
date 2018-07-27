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

namespace PagSeguro\Domains;

/**
 * Class Address
 *
 * @package PagSeguro\Domains
 */
class Address
{
    /**
     * @var
     */
    private $street;
    /**
     * @var
     */
    private $number;
    /**
     * @var
     */
    private $complement;
    /**
     * @var
     */
    private $district;
    /**
     * @var
     */
    private $postalCode;
    /**
     * @var
     */
    private $city;
    /**
     * @var
     */
    private $state;
    /**
     * @var
     */
    private $country;

    /**
     * Address constructor.
     *
     * @param $street
     * @param $number
     * @param $complement
     * @param $district
     * @param $postalCode
     * @param $city
     * @param $state
     * @param $country
     */
    public function __construct(
        $street = null,
        $number = null,
        $complement = null,
        $district = null,
        $postalCode = null,
        $city = null,
        $state = null,
        $country = null
    ) {
        $this->street = $street;
        $this->number = $number;
        $this->complement = $complement;
        $this->district = $district;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->state = $state;
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param $city
     *
     * @return $this
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * @return string
     */
    public function getComplement()
    {
        return $this->complement;
    }

    /**
     * @param $complement
     *
     * @return $this
     */
    public function setComplement($complement)
    {
        $this->complement = $complement;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param $country
     *
     * @return $this
     */
    public function setCountry($country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return string
     */
    public function getDistrict()
    {
        return $this->district;
    }

    /**
     * @param $district
     *
     * @return $this
     */
    public function setDistrict($district)
    {
        $this->district = $district;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param $number
     *
     * @return $this
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getPostalCode()
    {
        return $this->postalCode;
    }

    /**
     * @param $postalCode
     *
     * @return $this
     */
    public function setPostalCode($postalCode)
    {
        $this->postalCode = $postalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param $street
     *
     * @return $this
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }
}
