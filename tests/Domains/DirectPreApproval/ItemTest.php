<?php

namespace PagSeguro\Tests;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\Item;

class ItemTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Item();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Item::class, $this->obj);
    }

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('id', $this->obj);
        $this->assertObjectHasAttribute('description', $this->obj);
        $this->assertObjectHasAttribute('quantity', $this->obj);
        $this->assertObjectHasAttribute('amount', $this->obj);
    }

    public function testParametersThatCanBeNull()
    {
        $this->assertNull($this->obj->weight);
        $this->assertNull($this->obj->shippingCost);
    }
}
