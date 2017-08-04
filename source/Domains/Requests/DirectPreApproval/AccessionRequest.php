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

namespace PagSeguro\Domains\Requests\DirectPreApproval;

use PagSeguro\Domains\DirectPreApproval\PaymentMethod;
use PagSeguro\Domains\DirectPreApproval\Sender;
use PagSeguro\Domains\DirectPreApproval\Traits\ParserTrait;

/**
 * Class AccessionRequest
 *
 * @package PagSeguro\Domains\Requests\DirectPreApproval
 */
class AccessionRequest
{
    use ParserTrait;
    /**
     * @var
     */
    private $plan;
    /**
     * @var
     */
    private $reference;
    /**
     * @var Sender
     */
    private $sender;
    /**
     * @var PaymentMethod
     */
    private $paymentMethod;

    /**
     * AccessionRequest constructor.
     */
    public function __construct()
    {
        $this->paymentMethod = new PaymentMethod();
        $this->sender = new Sender();
    }

    /**
     * @param $plan
     */
    public function setPlan($plan)
    {
        $this->plan = $plan;
    }

    /**
     * @param $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @return PaymentMethod
     */
    public function setPaymentMethod()
    {
        return $this->paymentMethod;
    }

    /**
     * @return Sender
     */
    public function setSender()
    {
        return $this->sender;
    }
}
