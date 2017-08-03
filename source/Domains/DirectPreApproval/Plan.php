<?php
/**
 * Created by PhpStorm.
 * User: thiago.medeiros
 * Date: 03/08/2017
 * Time: 09:00
 */

namespace PagSeguro\Domains\DirectPreApproval;

class Plan
{
    public $redirectURL;
    public $reference;
    public $preApproval;
    public $reviewURL;
    public $maxUsers;
    public $receiver;

    public function __construct()
    {
        $this->preApproval = new PreApproval();
        $this->receiver = new Receiver();
    }

    public function setRedirectURL($redirectURL)
    {
        $this->redirectURL = $redirectURL;
    }

    function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setPreApproval()
    {
        return $this->preApproval;
    }

    public function setReviewURL($reviewURL)
    {
        $this->reviewURL = $reviewURL;
    }

    public function setMaxUsers($maxUsers)
    {
        $this->maxUsers = $maxUsers;
    }

    public function setReceiver()
    {
        return $this->receiver;
    }
}