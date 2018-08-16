<?php

namespace PagSeguro\Domains\Authorization;

/**
 * Trait AccountTrait
 *
 * @package PagSeguro\Domains\Authorization
 */
trait AccountTrait
{
    /**
     * @var Account
     */
    private $account;

    /**
     * @return Account
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param Account $account
     */
    public function setAccount(Account $account)
    {
        $this->account = $account;
    }
}