<?php

namespace PagSeguro\Tests;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\CreditCard;

class CreditCardTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new CreditCard();
    }

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('token', $this->obj);
        $this->assertObjectHasAttribute('holder', $this->obj);
    }

}
