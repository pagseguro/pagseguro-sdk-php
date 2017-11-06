<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 13:33
 */

namespace PagSeguro\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    private $obj;

    public function testParameters()
    {
        $this->assertObjectHasAttribute('id', $this->obj);
        $this->assertObjectHasAttribute('description', $this->obj);
        $this->assertObjectHasAttribute('quantity', $this->obj);
        $this->assertObjectHasAttribute('amount', $this->obj);
        $this->assertObjectHasAttribute('weight', $this->obj);
        $this->assertObjectHasAttribute('shippingCost', $this->obj);
    }

    public function testWithPArameters()
    {
        $this->assertInstanceOf(Item::class, $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Item();
    }
}
