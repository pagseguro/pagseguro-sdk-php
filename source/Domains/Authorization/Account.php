<?php

namespace PagSeguro\Domains\Authorization;

/**
 * Class Account
 *
 * @package PagSeguro\Domains\Authorization
 */
class Account
{
    /**
     * @var string
     */
    private $email;
    /**
     * @var string
     */
    private $type;
    /**
     * @var Seller
     */
    private $seller;
    /**
     * @var Company
     */
    private $company;
    /**
     * @var Company
     */
    private $personal;

    /**
     * Account constructor.
     *
     * @param string                      $email
     * @param Seller | Company | Personal $type
     */
    public function __construct($email, $type)
    {
        $this->email = $email;
        if ($type instanceof Seller) {
            $this->type = 'SELLER';
            $this->seller = $type;
        } elseif ($type instanceof Company) {
            $this->type = 'BUSINESS';
            $this->company = $type;
        } elseif ($type instanceof Personal) {
            $this->type = 'PERSONAL';
            $this->personal = $type;
        } else {
            $this->type = null;
        }
    }

    /**
     * @return Seller
     */
    public function getSeller()
    {
        return $this->seller;
    }

    /**
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @return Company
     */
    public function getPersonal()
    {
        return $this->personal;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }
}