<?php

namespace PagSeguro\Tests;

use PagSeguro\Domains\DirectPreApproval\Item;

class ItemTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Item();
    }

    /**
     * @todo implement assertInstanceOf
     */

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
