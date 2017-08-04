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

namespace PagSeguro\Domains\DirectPreApproval;

class PreApproval
{
    public $name;
    public $charge;
    public $period;
    public $amountPerPayment;
    public $membershipFee;
    public $trialPeriodDuration;
    public $expiration;
    public $details;
    public $maxAmountPerPeriod;
    public $maxAmountPerPayment;
    public $maxTotalAmount;
    public $maxPaymentsPerPeriod;
    public $initialDate;
    public $finalDate;
    public $dayOfYear;
    public $dayOfMonth;
    public $dayOfWeek;
    public $cancelURL;

    public function __construct()
    {
        $this->expiration = new Expiration();
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCharge($charge)
    {
        $this->charge = $charge;
    }

    public function setPeriod($period)
    {
        $this->period = $period;
    }

    public function setAmountPerPayment($amountPerPayment)
    {
        $this->amountPerPayment = $amountPerPayment;
    }

    public function setMembershipFee($membershipFee)
    {
        $this->membershipFee = $membershipFee;
    }

    public function setTrialPeriodDuration($trialPeriodDuration)
    {
        $this->trialPeriodDuration = $trialPeriodDuration;
    }

    public function setExpiration()
    {
        return $this->expiration;
    }

    public function setDetails($details)
    {
        $this->details = $details;
    }

    public function setMaxAmountPerPeriod($maxAmountPerPeriod)
    {
        $this->maxAmountPerPeriod = $maxAmountPerPeriod;
    }

    public function setMaxAmountPerPayment($maxAmountPerPayment)
    {
        $this->maxAmountPerPayment = $maxAmountPerPayment;
    }

    public function setMaxTotalAmount($maxTotalAmount)
    {
        $this->maxTotalAmount = $maxTotalAmount;
    }

    public function setMaxPaymentsPerPeriod($maxPaymentsPerPeriod)
    {
        $this->maxPaymentsPerPeriod = $maxPaymentsPerPeriod;
    }

    public function setInitialDate($initialDate)
    {
        $this->initialDate = $initialDate;
    }

    public function setFinalDate($finalDate)
    {
        $this->finalDate = $finalDate;
    }

    public function setDayOfYear($dayOfYear)
    {
        $this->dayOfYear = $dayOfYear;
    }

    public function setDayOfMonth($dayOfMonth)
    {
        $this->dayOfMonth = $dayOfMonth;
    }

    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;
    }

    public function setCancelURL($cancelURL)
    {
        $this->cancelURL = $cancelURL;
    }
}