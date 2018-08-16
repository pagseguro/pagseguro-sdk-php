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
 * Class CreditorFees
 * @package PagSeguro\Domains
 */
class CreditorFees
{
    /**
     * @var
     */
    private $intermediationRateAmount;
    /**
     * @var
     */
    private $intermediationFeeAmount;
    /**
     * @var
     */
    private $installmentFeeAmount;
    /**
     * @var
     */
    private $operationalFeeAmount;
    /**
     * @var
     */
    private $commissionFeeAmount;

    /**
     * @return mixed
     */
    public function getIntermediationFeeAmount()
    {
        return $this->intermediationFeeAmount;
    }

    /**
     * @param mixed $intermediationFeeAmount
     * @return CreditorFees
     */
    public function setIntermediationFeeAmount($intermediationFeeAmount)
    {
        $this->intermediationFeeAmount = $intermediationFeeAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIntermediationRateAmount()
    {
        return $this->intermediationRateAmount;
    }

    /**
     * @param mixed $intermediationRateAmount
     * @return CreditorFees
     */
    public function setIntermediationRateAmount($intermediationRateAmount)
    {
        $this->intermediationRateAmount = $intermediationRateAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInstallmentFeeAmount()
    {
        return $this->installmentFeeAmount;
    }

    /**
     * @param mixed $installmentFeeAmount
     * @return CreditorFees
     */
    public function setInstallmentFeeAmount($installmentFeeAmount)
    {
        $this->installmentFeeAmount = $installmentFeeAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getOperationalFeeAmount()
    {
        return $this->operationalFeeAmount;
    }

    /**
     * @param mixed $operationalFeeAmount
     * @return CreditorFees
     */
    public function setOperationalFeeAmount($operationalFeeAmount)
    {
        $this->operationalFeeAmount = $operationalFeeAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCommissionFeeAmount()
    {
        return $this->commissionFeeAmount;
    }
    /**
     * @param mixed $commissionFeeAmount
     * @return CreditorFees
     */
    public function setCommissionFeeAmount($commissionFeeAmount)
    {
        $this->commissionFeeAmount = $commissionFeeAmount;
        return $this;
    }
}
