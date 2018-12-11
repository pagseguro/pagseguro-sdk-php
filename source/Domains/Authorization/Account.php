<?php
/**
 * 2007-2016 [PagSeguro Internet Ltda.]
 *
 * NOTICE OF LICENSE
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 *
 * @author    PagSeguro Internet Ltda.
 * @copyright 2007-2016 PagSeguro Internet Ltda.
 * @license   http://www.apache.org/licenses/LICENSE-2.0
 *
 */

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
     * @param string $email
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