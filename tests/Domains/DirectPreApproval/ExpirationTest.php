<?php

namespace PagSeguro\Tests\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;
use PagSeguro\Domains\DirectPreApproval\Expiration;

class ExpirationTest extends TestCase
{
    private $obj;

    protected function setUp(): void
    {
        parent::setUp();

        $this->obj = new Expiration();
    }

    public function testConstructor()
    {
        $this->assertInstanceOf(Expiration::class, $this->obj);
    }

    public function testRequiredParameters()
    {
        $this->assertObjectHasAttribute('value', $this->obj);
        $this->assertObjectHasAttribute('unit', $this->obj);
    }
}
