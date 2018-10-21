<?php

namespace PagSeguro\Tests;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\Address;

class AddressTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Address();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Address::class, $this->obj);
    }

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
