<?php

namespace PagSeguro\Tests;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\Document;

class DocumentTest extends TestCase
{
    private $obj;

    protected function setUp()
    {
        $this->obj = new Document();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Document::class, $this->obj);
    }

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('type', $this->obj);
        $this->assertObjectHasAttribute('value', $this->obj);
    }
}
