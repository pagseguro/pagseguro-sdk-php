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

namespace PagSeguro\Domains\DirectPreApproval;

/**
 * Class Holder
 *
 * @package PagSeguro\Domains\DirectPreApproval
 */
class Holder
{
    /**
     * @var
     */
    public $name;
    /**
     * @var
     */
    public $birthDate;
    /**
     * @var
     */
    public $documents;
    /**
     * @var
     */
    public $phone;
    /**
     * @var BillingAddress
     */
    public $billingAddress;

    /**
     * Holder constructor.
     */
    public function __construct()
    {
        $this->billingAddress = new BillingAddress();
    }

    /**
     * @param $name
     *
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @param $birthDate
     *
     * @return $this
     */
    public function setBirthDate($birthDate)
    {
        $this->birthDate = $birthDate;

        return $this;
    }

    /**
     * @param Document $document
     *
     * @return $this
     */
    public function setDocuments(Document $document)
    {
        $this->documents[] = $document;

        return $this;
    }

    /**
     * @return Phone
     */
    public function setPhone()
    {
        $this->phone = new Phone();

        return $this->phone;
    }

    /**
     * @return BillingAddress
     */
    public function setBillingAddress()
    {
        return $this->billingAddress;
    }
}