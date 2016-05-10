<?php
/**
 * Created by PhpStorm.
 * User: esilva
 * Date: 05/05/16
 * Time: 13:39
 */

namespace PagSeguro\Domains\Requests;

use PagSeguro\Domains\Requests\PreApproval\Request;

class PreApproval extends Request
{

    private $preApproval;

    /**
     * @return mixed
     */
    public function getPreApproval()
    {
        return $this->preApproval;
    }

    /**
     * @param mixed $preApproval
     */
    public function setPreApproval()
    {
        if (empty($this->preApproval ) || !isset($this->preApproval ) || is_null($this->preApproval )) {
            $this->preApproval = new \PagSeguro\Domains\PreApproval();
        }
        return $this->preApproval;
    }

    /**
     * @param $credentials
     * @return string
     * @throws \Exception
     */
    public function register($credentials)
    {
        return \PagSeguro\Services\PreApproval\Payment::create($credentials, $this);
    }

}