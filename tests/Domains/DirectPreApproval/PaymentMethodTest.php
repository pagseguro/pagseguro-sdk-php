<?php

namespace PagSeguro\Tests;

use PagSeguro\Domains\DirectPreApproval\PaymentMethod;

class PaymentMethodTest extends \PHPUnit_Framework_TestCase
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
