<?php
/**
 * Created by PhpStorm.
 * User: esilva
 * Date: 02/03/16
 * Time: 15:50
 */

namespace PagSeguro\Domains\DirectPayment\CreditCard;

class Billing
{

    /***
     * Billing address
     * @see Address
     */
    private $address;

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
}
