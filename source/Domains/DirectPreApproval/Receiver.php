<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 03/08/2017
 * Time: 09:04
 */

namespace PagSeguro\Domains\DirectPreApproval;

class Receiver
{
    public $email;

    public function withParameters($email)
    {
        $this->email = $email;

        return $this;
    }
}