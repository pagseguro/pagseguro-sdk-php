<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 13:40
 */

namespace PagSeguro\Domains\DirectPreApproval;

class PlanTest extends \PHPUnit_Framework_TestCase
{
    private $obj;
    private $obj2;
    private $obj3;

    public function testSetPreApproval()
    {
        $this->assertInstanceOf(PreApproval::class, $this->obj2);
    }

    public function testSetReceiver()
    {
        $this->assertInstanceOf(Receiver::class, $this->obj3);
    }

    public function testParameters()
    {
        $this->assertObjectHasAttribute('redirectURL', $this->obj);
        $this->assertObjectHasAttribute('reference', $this->obj);
        $this->assertObjectHasAttribute('preApproval', $this->obj);
        $this->assertObjectHasAttribute('reviewURL', $this->obj);
        $this->assertObjectHasAttribute('maxUsers', $this->obj);
        $this->assertObjectHasAttribute('receiver', $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Plan();
        $this->obj2 = new PreApproval();
        $this->obj3 = new Receiver();
    }
}
