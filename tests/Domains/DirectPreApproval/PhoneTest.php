<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 13:37
 */

namespace PagSeguro\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;

class PhoneTest extends TestCase
{
    private $obj;

    public function testParameters()
    {
        $this->assertObjectHasAttribute('areaCode', $this->obj);
        $this->assertObjectHasAttribute('number', $this->obj);
    }

    public function testWithParameters()
    {
        $this->assertInstanceOf(Phone::class, $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Phone();
    }
}
