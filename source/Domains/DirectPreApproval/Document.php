<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 02/08/2017
 * Time: 14:09
 */

namespace PagSeguro\Domains\DirectPreApproval;

class Document
{
    public $type;
    public $value;

    public function withParameters(
        $type,
        $value
    ) {
        $this->type = $type;
        $this->value = $value;

        return $this;
    }
}