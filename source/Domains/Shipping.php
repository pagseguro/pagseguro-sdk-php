<?php
/**
 * Created by PhpStorm.
 * User: esilva
 * Date: 02/03/16
 * Time: 15:50
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
}
