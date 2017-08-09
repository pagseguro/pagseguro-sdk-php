<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 13:14
 */

namespace PagSeguro\Domains\DirectPreApproval;

class ExpirationTest extends \PHPUnit_Framework_TestCase
{
    private $obj;

    public function testParameters()
    {
        $this->assertObjectHasAttribute('value', $this->obj);
        $this->assertObjectHasAttribute('unit', $this->obj);
    }

    public function testWithParameters()
    {
        $this->assertInstanceOf(Expiration::class, $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Expiration();
    }
}
