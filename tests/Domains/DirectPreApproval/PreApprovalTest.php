<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 13:45
 */

namespace PagSeguro\Domains\DirectPreApproval;

class PreApprovalTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function testParameters()
    {
        $this->assertObjectHasAttribute('name', $this->obj);
        $this->assertObjectHasAttribute('charge', $this->obj);
        $this->assertObjectHasAttribute('period', $this->obj);
        $this->assertObjectHasAttribute('amountPerPayment', $this->obj);
        $this->assertObjectHasAttribute('membershipFee', $this->obj);
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

    public function testSetExpiration()
    {
        $this->assertInstanceOf(Expiration::class, $this->obj->expiration);
    }

    protected function setUp()
    {
        $this->obj = new PreApproval();
    }
}
