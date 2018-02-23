<?php

namespace PagSeguro\Domains\DirectPreApproval;

class HolderTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function testSetBillingAddress()
    {
        $this->assertInstanceOf(Holder::class, $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Holder();
    }
}
