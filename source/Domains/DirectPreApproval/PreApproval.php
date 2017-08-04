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

/**
 * Class PreApproval
 *
 * @package PagSeguro\Domains\DirectPreApproval
 */
class PreApproval
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $charge;
    /**
     * @var
     */
    public $period;
    /**
     * @var
     */
    public $amountPerPayment;
    /**
     * @var
     */
    public $membershipFee;
    /**
     * @var
     */
    public $trialPeriodDuration;
    /**
     * @var Expiration
     */
    public $expiration;
    /**
     * @var
     */
    public $details;
    /**
     * @var
     */
    public $maxAmountPerPeriod;
    /**
     * @var
     */
    public $maxAmountPerPayment;
    /**
     * @var
     */
    public $maxTotalAmount;
    /**
     * @var
     */
    public $maxPaymentsPerPeriod;
    /**
     * @var
     */
    public $initialDate;
    /**
     * @var
     */
    public $finalDate;
    /**
     * @var
     */
    public $dayOfYear;
    /**
     * @var
     */
    public $dayOfMonth;
    /**
     * @var
     */
    public $dayOfWeek;
    /**
     * @var
     */
    public $cancelURL;

    /**
     * PreApproval constructor.
     */
    public function __construct()
    {
        $this->expiration = new Expiration();
    }

    /**
     * @param $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param $charge
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;
    }

    /**
     * @param $period
     */
    public function setPeriod($period)
    {
        $this->period = $period;
    }

    /**
     * @param $amountPerPayment
     */
    public function setAmountPerPayment($amountPerPayment)
    {
        $this->amountPerPayment = $amountPerPayment;
    }

    /**
     * @param $membershipFee
     */
    public function setMembershipFee($membershipFee)
    {
        $this->membershipFee = $membershipFee;
    }

    /**
     * @param $trialPeriodDuration
     */
    public function setTrialPeriodDuration($trialPeriodDuration)
    {
        $this->trialPeriodDuration = $trialPeriodDuration;
    }

    /**
     * @return Expiration
     */
    public function setExpiration()
    {
        return $this->expiration;
    }

    /**
     * @param $details
     */
    public function setDetails($details)
    {
        $this->details = $details;
    }

    /**
     * @param $maxAmountPerPeriod
     */
    public function setMaxAmountPerPeriod($maxAmountPerPeriod)
    {
        $this->maxAmountPerPeriod = $maxAmountPerPeriod;
    }

    /**
     * @param $maxAmountPerPayment
     */
    public function setMaxAmountPerPayment($maxAmountPerPayment)
    {
        $this->maxAmountPerPayment = $maxAmountPerPayment;
    }

    /**
     * @param $maxTotalAmount
     */
    public function setMaxTotalAmount($maxTotalAmount)
    {
        $this->maxTotalAmount = $maxTotalAmount;
    }

    /**
     * @param $maxPaymentsPerPeriod
     */
    public function setMaxPaymentsPerPeriod($maxPaymentsPerPeriod)
    {
        $this->maxPaymentsPerPeriod = $maxPaymentsPerPeriod;
    }

    /**
     * @param $initialDate
     */
    public function setInitialDate($initialDate)
    {
        $this->initialDate = $initialDate;
    }

    /**
     * @param $finalDate
     */
    public function setFinalDate($finalDate)
    {
        $this->finalDate = $finalDate;
    }

    /**
     * @param $dayOfYear
     */
    public function setDayOfYear($dayOfYear)
    {
        $this->dayOfYear = $dayOfYear;
    }

    /**
     * @param $dayOfMonth
     */
    public function setDayOfMonth($dayOfMonth)
    {
        $this->dayOfMonth = $dayOfMonth;
    }

    /**
     * @param $dayOfWeek
     */
    public function setDayOfWeek($dayOfWeek)
    {
        $this->dayOfWeek = $dayOfWeek;
    }

    /**
     * @param $cancelURL
     */
    public function setCancelURL($cancelURL)
    {
        $this->cancelURL = $cancelURL;
    }
}