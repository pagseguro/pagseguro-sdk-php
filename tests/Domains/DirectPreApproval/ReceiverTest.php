<?php

namespace PagSeguro\Domains\DirectPreApproval;

class ReceiverTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Receiver();
    }

    /**
     * @todo implements test assertInstanceOf
     */

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('email', $this->obj);
    }
}
