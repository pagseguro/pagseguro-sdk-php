<?php

namespace PagSeguro\Domains\DirectPreApproval;

class CreditCardTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function testSetHolder()
    {
        $this->assertInstanceOf(CreditCard::class, $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new CreditCard();
    }
}
