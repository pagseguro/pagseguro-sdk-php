<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 03/08/2017
 * Time: 09:06
 */

namespace PagSeguro\Domains\DirectPreApproval;

class Expiration
{
    public $value;
    public $unit;

    public function withParameters(
        $value,
        $unit
    ) {
        $this->value = $value;
        $this->unit = $unit;

        return $this;
    }
}