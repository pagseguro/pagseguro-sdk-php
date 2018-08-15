<?php

namespace PagSeguro\Domains\DirectPreApproval;

class ExpirationTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Expiration();
    }

    /**
     * @todo implement assertInstanceOf
     */

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('value', $this->obj);
        $this->assertObjectHasAttribute('unit', $this->obj);
    }
}
