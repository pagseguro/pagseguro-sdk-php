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

namespace PagSeguro\Domains\Responses;

/**
 * Domain class for Installment
 */
class Installment
{
    /**
     * @var
     */
    private $cardBrand;
    
    /**
     * @var
     */
    private $quantity;
    
    /**
     * @var
     */
    private $amount;
    
    /**
     * @var
     */
    private $totalAmount;
    
    /**
     * @var
     */
    private $interestFree;
    
    /**
     * Get the cardBrand attribute
     * @return Installment
     */
    public function getCardBrand()
    {
        return $this->cardBrand;
    }

    /**
     * Get the quantity attribute
     * @return Installment
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * Get the amount attribute
     * @return Installment
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * Get the totalAmount attribute
     * @return Installment
     */
    public function getTotalAmount()
    {
        return $this->totalAmount;
    }

    /**
     * Get the cardBrand attribute
     * @return Installment
     */
    public function getInterestFree()
    {
        return $this->interestFree;
    }

    /**
     * Get the cardBrand attribute
     * @return Installment
     */
    public function setCardBrand($cardBrand)
    {
        $this->cardBrand = $cardBrand;
        return $this;
    }

    /**
     * Get the quantity attribute
     * @return Installment
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
        return $this;
    }

    /**
     * Get the amount attribute
     * @return Installment
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * Get the totalAmount attribute
     * @return Installment
     */
    public function setTotalAmount($totalAmount)
    {
        $this->totalAmount = $totalAmount;
        return $this;
    }

    /**
     * Get the setInterestFree attribute
     * @return Installment
     */
    public function setInterestFree($interestFree)
    {
        $this->interestFree = $interestFree;
        return $this;
    }
}
