<?php

namespace PagSeguro\Tests;

use PagSeguro\Domains\DirectPreApproval\PreApproval;

class PreApprovalTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new PreApproval();
    }

    /**
     * @todo implement assertInstanceOf
     */

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('name', $this->obj);
        $this->assertObjectHasAttribute('charge', $this->obj);
        $this->assertObjectHasAttribute('period', $this->obj);
        $this->assertObjectHasAttribute('amountPerPayment', $this->obj);
        $this->assertObjectHasAttribute('membershipFee', $this->obj);
        $this->assertObjectHasAttribute('trialPeriodDuration', $this->obj);
        $this->assertObjectHasAttribute('expiration', $this->obj);
        $this->assertObjectHasAttribute('details', $this->obj);
        $this->assertObjectHasAttribute('maxAmountPerPeriod', $this->obj);
        $this->assertObjectHasAttribute('maxAmountPerPayment', $this->obj);
        $this->assertObjectHasAttribute('maxTotalAmount', $this->obj);
        $this->assertObjectHasAttribute('maxPaymentsPerPeriod', $this->obj);
        $this->assertObjectHasAttribute('initialDate', $this->obj);
        $this->assertObjectHasAttribute('finalDate', $this->obj);
        $this->assertObjectHasAttribute('dayOfYear', $this->obj);
        $this->assertObjectHasAttribute('dayOfMonth', $this->obj);
        $this->assertObjectHasAttribute('dayOfWeek', $this->obj);
        $this->assertObjectHasAttribute('cancelURL', $this->obj);
    }
}
