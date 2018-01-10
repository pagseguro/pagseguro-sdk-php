<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 13:54
 */

namespace PagSeguro\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;

class ReceiverTest extends TestCase
{
    private $obj;

    public function testParameters()
    {
        $this->assertObjectHasAttribute('email', $this->obj);
    }

    protected function setUp()
    {
        $this->obj = new Receiver();
    }
}
