<?php

namespace PagSeguro\Tests\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\Phone;

class PhoneTest extends TestCase
{
    private $obj;

    protected function setUp(): void
    {
        parent::setUp();

        $this->obj = new Phone();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Phone::class, $this->obj);
    }

    public function testParameters()
    {
        $this->assertObjectHasAttribute('areaCode', $this->obj);
        $this->assertObjectHasAttribute('number', $this->obj);
    }
}
