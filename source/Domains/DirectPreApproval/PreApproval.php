<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 03/08/2017
 * Time: 09:02
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