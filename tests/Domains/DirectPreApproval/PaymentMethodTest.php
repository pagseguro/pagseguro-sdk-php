<?php

namespace PagSeguro\Tests;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\PaymentMethod;

class PaymentMethodTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new PaymentMethod();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(PaymentMethod::class, $this->obj);
    }

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('type', $this->obj);
    }
}
