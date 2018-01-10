<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 04/08/2017
 * Time: 11:54
 */

namespace PagSeguro\Domains\DirectPreApproval;

use PHPUnit\Framework\TestCase;

class DocumentTest extends TestCase
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
