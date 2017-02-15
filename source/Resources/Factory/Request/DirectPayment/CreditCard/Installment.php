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

        if (isset($array['no_interest_installment_quantity'])) {
            $installment->setNoInterestInstallmentQuantity($array['no_interest_installment_quantity']);
        }

        $this->installment = $installment;
        return $this->installment;
    }
    
    public function withParameters($quantity, $value, $noInterestInstallmentQuantity = null)
    {
        $installment = new \PagSeguro\Domains\DirectPayment\CreditCard\Installment();
        $installment->setQuantity($quantity)
            ->setValue($value);

        if ($noInterestInstallmentQuantity) {
            $installment->setNoInterestInstallmentQuantity($noInterestInstallmentQuantity);
        }

        $this->installment = $installment;

        return $this->installment;
    }
}
