<?php

namespace PagSeguro\Tests\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\PaymentMethod;

class PaymentMethodTest extends TestCase
{
    private $obj;

    protected function setUp(): void
    {
        parent::setUp();

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
