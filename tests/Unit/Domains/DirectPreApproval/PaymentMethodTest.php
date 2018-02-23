<?php

namespace PagSeguro\Domains\DirectPreApproval;

class PaymentMethodTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function testParameters()
    {
        $this->assertObjectHasAttribute('type', $this->obj);
    }

    public function setCreditCard()
    {
        $this->assertInstanceOf(PaymentMethod::class, $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new PaymentMethod();
    }
}
