<?php

namespace PagSeguro\Tests;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\Plan;

class PlanTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Plan();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Plan::class, $this->obj);
    }

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('redirectURL', $this->obj);
        $this->assertObjectHasAttribute('reference', $this->obj);
        $this->assertObjectHasAttribute('preApproval', $this->obj);
        $this->assertObjectHasAttribute('reviewURL', $this->obj);
        $this->assertObjectHasAttribute('maxUsers', $this->obj);
        $this->assertObjectHasAttribute('receiver', $this->obj);
    }
}
