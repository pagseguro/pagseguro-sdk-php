<?php

namespace PagSeguro\Tests;

use PagSeguro\Domains\DirectPreApproval\BillingAddress;

class BillingAddressTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new BillingAddress();
    }

    /**
     * @todo implement assertInstanceOf
     */

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('street', $this->obj);
        $this->assertObjectHasAttribute('number', $this->obj);
        $this->assertObjectHasAttribute('district', $this->obj);
        $this->assertObjectHasAttribute('postalCode', $this->obj);
        $this->assertObjectHasAttribute('city', $this->obj);
        $this->assertObjectHasAttribute('state', $this->obj);
        $this->assertObjectHasAttribute('country', $this->obj);
    }

    public function testParametersThatCanBeNull()
    {
        $this->assertNull($this->obj->complement);
    }
}
