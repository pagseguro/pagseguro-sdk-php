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

class Shipping
{

    /***
     * Shipping address
     * @see Address
     */
    private $address;
    /***
     * Shipping type. See the ShippingType class for a list of known shipping types.
     * @see ShippingType
     */
    private $type;
    /***
     * Shipping cost.
     */
    private $cost;
    /***
     * Shipping address required.
     */
    private $addressRequired;

    /**
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param Address $address
     * @return Shipping
     */
    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }

    /**
     * @return string
     */
    public function getCost()
    {
        return $this->cost;
    }

    /**
     * @param string $cost
     * @return Shipping
     */
    public function setCost($cost)
    {
        $this->cost = $cost;
        return $this;
    }

    /**
     * @return ShippingType
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param ShippingType $type
     * @return Shipping
     */
    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    /**
     * @return ShippingAddressRequired
     */
    public function getAddressRequired()
    {
        return $this->addressRequired;
    }

    /**
     * @param ShippingAddressRequired $addressRequired
     * @return Shipping
     */
    public function setAddressRequired($addressRequired)
    {
        $this->addressRequired = $addressRequired;
        return $this;
    }
}
