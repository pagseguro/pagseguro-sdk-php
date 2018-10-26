<?php

namespace PagSeguro\Tests;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\Holder;

class HolderTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Holder();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Holder::class, $this->obj);
    }

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('name', $this->obj);
        $this->assertObjectHasAttribute('birthDate', $this->obj);
        $this->assertObjectHasAttribute('documents', $this->obj);
        $this->assertObjectHasAttribute('phone', $this->obj);
    }
}
