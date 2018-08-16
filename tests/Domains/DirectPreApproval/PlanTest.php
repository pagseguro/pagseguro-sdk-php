<?php

namespace PagSeguro\Tests;

use PagSeguro\Domains\DirectPreApproval\Plan;

class PlanTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Plan();
    }

    /**
     * @todo implement assertInstanceOf
     */

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
