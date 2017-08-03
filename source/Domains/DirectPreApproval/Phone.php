<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 02/08/2017
 * Time: 14:09
 */

namespace PagSeguro\Domains\DirectPreApproval;

class Phone
{
    public $areaCode;
    public $number;

    public function withParameters(
        $areaCode,
        $number
    ) {
        $this->areaCode = $areaCode;
        $this->number = $number;

        return $this;
    }
}