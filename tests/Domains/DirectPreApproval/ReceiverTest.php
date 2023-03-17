<?php

namespace PagSeguro\Tests;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\Receiver;

class ReceiverTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Receiver();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Receiver::class, $this->obj);
    }

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('email', $this->obj);
    }
}
