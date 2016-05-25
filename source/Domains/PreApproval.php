<?php
/**
 * Created by PhpStorm.
 * User: esilva
 * Date: 09/05/16
 * Time: 14:30
 */

namespace PagSeguro\Domains;

class PreApproval
{
    private $charge;
    private $name;
    private $details;
    private $amountPerPayment;
    private $maxAmountPerPayment;
    private $maxTotalAmount;
    private $maxAmountPerPeriod;
    private $maxPaymentsPerPeriod;
    private $period;
    private $initialDate;
    private $finalDate;

    /**
     * @return mixed
     */
    public function getAmountPerPayment()
    {
        return $this->amountPerPayment;
    }

    /**
     * @param mixed $amountPerPayment
     * @return PreApproval
     */
    public function setAmountPerPayment($amountPerPayment)
    {
        $this->amountPerPayment = $amountPerPayment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCharge()
    {
        return $this->charge;
    }

    /**
     * @param mixed $charge
     * @return PreApproval
     */
    public function setCharge($charge)
    {
        $this->charge = $charge;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDetails()
    {
        return $this->details;
    }

    /**
     * @param mixed $details
     * @return PreApproval
     */
    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getFinalDate()
    {
        return $this->finalDate;
    }

    /**
     * @param mixed $finalDate
     * @return PreApproval
     */
    public function setFinalDate($finalDate)
    {
        $this->finalDate = $finalDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getInitialDate()
    {
        return $this->initialDate;
    }

    /**
     * @param mixed $initialDate
     * @return PreApproval
     */
    public function setInitialDate($initialDate)
    {
        $this->initialDate = $initialDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxAmountPerPeriod()
    {
        return $this->maxAmountPerPeriod;
    }

    /**
     * @param mixed $maxAmountPerPeriod
     * @return PreApproval
     */
    public function setMaxAmountPerPeriod($maxAmountPerPeriod)
    {
        $this->maxAmountPerPeriod = $maxAmountPerPeriod;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxAmountPerPayment()
    {
        return $this->maxAmountPerPayment;
    }

    /**
     * @param mixed $maxAmountPerPayment
     * @return PreApproval
     */
    public function setMaxAmountPerPayment($maxAmountPerPayment)
    {
        $this->maxAmountPerPayment = $maxAmountPerPayment;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMaxPaymentsPerPeriod()
    {
        return $this->maxPaymentsPerPeriod;
    }

    /**
     * @param mixed $maxPaymentPerPeriod
     * @return PreApproval
     */
    public function setMaxPaymentsPerPeriod($maxPaymentsPerPeriod)
    {
        $this->maxPaymentsPerPeriod = $maxPaymentsPerPeriod;
        return $this;
    }


    /**
     * @return mixed
     */
    public function getMaxTotalAmount()
    {
        return $this->maxTotalAmount;
    }

    /**
     * @param mixed $maxTotalAmount
     * @return PreApproval
     */
    public function setMaxTotalAmount($maxTotalAmount)
    {
        $this->maxTotalAmount = $maxTotalAmount;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     * @return PreApproval
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPeriod()
    {
        return $this->period;
    }

    /**
     * @param mixed $period
     * @return PreApproval
     */
    public function setPeriod($period)
    {
        $this->period = $period;
        return $this;
    }
}
