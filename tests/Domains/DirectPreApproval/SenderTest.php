<?php

namespace PagSeguro\Domains\DirectPreApproval;

class SenderTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Sender();
    }

    /**
     * @todo implements test assertInstanceOf
     */

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('name', $this->obj);
        $this->assertObjectHasAttribute('email', $this->obj);
        $this->assertObjectHasAttribute('ip', $this->obj);
        $this->assertObjectHasAttribute('hash', $this->obj);
        $this->assertObjectHasAttribute('phone', $this->obj);
        $this->assertObjectHasAttribute('documents', $this->obj);
        $this->assertObjectHasAttribute('address', $this->obj);
    }
}
