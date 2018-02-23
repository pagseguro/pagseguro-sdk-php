<?php

namespace PagSeguro\Domains\DirectPreApproval;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function testParameters()
    {
        $this->assertObjectHasAttribute('type', $this->obj);
        $this->assertObjectHasAttribute('value', $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Document();
    }
}
