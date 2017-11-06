<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 13:18
 */

namespace PagSeguro\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;

class HolderTest extends TestCase
{
    private $obj;

    public function testSetBillingAddress()
    {
        $this->assertInstanceOf(Holder::class, $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Holder();
    }
}
