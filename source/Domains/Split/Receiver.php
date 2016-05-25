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

namespace PagSeguro\Domains\Split;

/**
 * Class Receiver
 * @package PagSeguro\Domains
 */
class Receiver
{
    /**
     * @var
     */
    private $publicKey;
    /**
     * @var
     */
    private $amount;
    /**
     * @var
     */
    private $ratePercent;
    /**
     * @var
     */
    private $feePercent;

    /**
     * @return mixed
     */
    public function getAmount()
    {
        return $this->amount;
    }

    /**
     * @param mixed $amount
     * @return Receiver
     */
    public function setAmount($amount)
    {
        $this->amount = $amount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFeePercent()
    {
        return $this->feePercent;
    }

    /**
     * @param mixed $feePercent
     * @return Receiver
     */
    public function setFeePercent($feePercent)
    {
        $this->feePercent = $feePercent;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPublicKey()
    {
        return $this->publicKey;
    }

    /**
     * @param mixed $publicKey
     * @return Receiver
     */
    public function setPublicKey($publicKey)
    {
        $this->publicKey = $publicKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getRatePercent()
    {
        return $this->ratePercent;
    }

    /**
     * @param mixed $ratePercent
     * @return Receiver
     */
    public function setRatePercent($ratePercent)
    {
        $this->ratePercent = $ratePercent;
        return $this;
    }
}
