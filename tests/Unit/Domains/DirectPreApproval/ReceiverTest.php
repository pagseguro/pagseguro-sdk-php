<?php

namespace PagSeguro\Domains\DirectPreApproval;

class ReceiverTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function testParameters()
    {
        $this->assertObjectHasAttribute('email', $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Receiver();
    }
}
