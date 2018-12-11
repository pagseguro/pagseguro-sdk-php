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

use PagSeguro\Domains\Document;
use PagSeguro\Domains\Phone;

/**
 * Class Partner
 *
 * @package PagSeguro\Domains\Authorization
 */
class Partner
{
    /**
     * @var string
     */
    private $name = '';
    /**
     * @var \DateTime
     */
    private $birthDate;
    /**
     * @var array
     */
    private $documents = [];
    /**
     * @var array
     */
    private $phones = [];

    /**
     * Partner constructor.
     *
     * @param string $name
     * @param \DateTime $birthDate
     * @param Document $document
     * @param Phone $phone
     */
    public function __construct(
        $name = null,
        \DateTime $birthDate = null,
        Document $document = null,
        Phone $phone = null
    ) {
        $this->name = $name;
        $this->birthDate = date('Y-m-d', $birthDate->getTimestamp());
        if (isset($document)) {
            $this->addDocuments($document);
        }
        if (isset($phone)) {
            $this->addPhones($phone);
        }
    }

    /**
     * @param Document $document
     *
     * @return array
     */
    public function addDocuments(Document $document)
    {
        $this->documents[] = $document;

        return $this->documents;
    }

    /**
     * @param Phone $phone
     *
     * @return array
     */
    public function addPhones(Phone $phone)
    {
        try {
            if (!$phone->getType()) {
                throw new \InvalidArgumentException('Phone Type is required');
            };
        } catch (\InvalidArgumentException $exception) {
            die($exception);
        }
        $this->phones[] = $phone;

        return $this->phones;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return array
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @return null|string
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->phones;
    }
}