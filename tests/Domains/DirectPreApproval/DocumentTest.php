<?php

namespace PagSeguro\Tests;

use PagSeguro\Domains\DirectPreApproval\Document;

class DocumentTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Document();
    }

    /**
     * @todo implement assertInstanceOf
     */

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('type', $this->obj);
        $this->assertObjectHasAttribute('value', $this->obj);
    }
}
