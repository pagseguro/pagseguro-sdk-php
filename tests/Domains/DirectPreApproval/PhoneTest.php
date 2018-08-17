<?php

namespace PagSeguro\Tests;

use PagSeguro\Domains\DirectPreApproval\Phone;

class PhoneTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Phone();
    }

    /**
     * @todo implement assertInstanceOf
     */

    public function testParameters()
    {
        $this->assertObjectHasAttribute('areaCode', $this->obj);
        $this->assertObjectHasAttribute('number', $this->obj);
    }
}
