<?php

namespace PagSeguro\Domains\Authorization;

use PagSeguro\Domains\Address;
use PagSeguro\Domains\Document;
use PagSeguro\Domains\Phone;

/**
 * Class Seller
 *
 * @package PagSeguro\Domains\Authorization
 */
class Seller
{
    /**
     * @var string
     */
    private $name = '';
    /**
     * @var \DateTime
     */
    private $birthDate = null;
    /**
     * @var array
     */
    private $documents = [];
    /**
     * @var array
     */
    private $phones = [];
    /**
     * @var Address
     */
    private $address = null;

    /**
     * Person constructor.
     *
     * @param string    $name
     * @param \DateTime $birthDate
     * @param Document  $document
     * @param Phone     $phone
     * @param Address   $address
     */
    public function __construct(
        $name = null,
        \DateTime $birthDate = null,
        Document $document = null,
        Phone $phone = null,
        Address $address = null
    ) {
        $this->name = $name;
        $this->birthDate = date('Y-m-d', $birthDate->getTimestamp());
        if (isset($document)) {
            $this->addDocuments($document);
        }
        if (isset($phone)) {
            $this->addPhones($phone);
        }
        $this->address = $address;
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
            if(!$phone->getType()){
                throw new \InvalidArgumentException('Phone Type is required');
            };
        } catch (\InvalidArgumentException $exception) {
            die($exception);
            exit;
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
     * @return Address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @return array
     */
    public function getDocuments()
    {
        return $this->documents;
    }

    /**
     * @return array
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * @return null
     */
    public function getBirthDate()
    {
        return $this->birthDate;
    }
}