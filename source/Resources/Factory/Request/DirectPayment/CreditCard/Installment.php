<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace PagSeguro\Resources\Factory\Request\DirectPayment\CreditCard;

/**
 * Description of Installment
 *
 * @package PagSeguro\Resources\Factory\Request\DirectPayment\CreditCard
 */
class Installment
{
    private $installment;
    
    public function __construct()
    {
        $this->installment = [];
    }
    
    public function instance(\PagSeguro\Domains\DirectPayment\CreditCard\Installment $installment)
    {
        return $installment;
    }
    
    public function withArray($array)
    {
        $installment = new \PagSeguro\Domains\DirectPayment\CreditCard\Installment();
        $installment->setQuantity($array['quantity'])
            ->setValue($array['value']);

        $this->installment = $installment;
        return $this->installment;
    }
    
    public function withParameters($quantity, $value)
    {
        $installment = new \PagSeguro\Domains\DirectPayment\CreditCard\Installment();
        $installment->setQuantity($quantity)
            ->setValue($value);
        $this->installment = $installment;

        return $this->installment;
    }
}
