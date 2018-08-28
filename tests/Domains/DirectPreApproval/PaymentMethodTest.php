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

    /**
     * @todo implement assertInstanceOf
     */

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('type', $this->obj);
    }
}
