<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 11:51
 */

namespace PagSeguro\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;

class CreditCardTest extends TestCase
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
