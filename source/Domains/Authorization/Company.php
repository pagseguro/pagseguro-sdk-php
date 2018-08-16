<?php

namespace PagSeguro\Domains\Authorization;

use PagSeguro\Domains\Address;
use PagSeguro\Domains\Document;
use PagSeguro\Domains\Phone;

/**
 * Class Company
 *
 * @package PagSeguro\Domains\Authorization
 */
class Company
{
    /**
     * @var string
     */
    private $displayName = '';
    /**
     * @var \DateTime
     */
    private $websiteURL = null;
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
     * @var Partner
     */
    private $partner;

    /**
     * Person constructor.
     *
     * @param string   $displayName
     * @param string   $websiteURL
     * @param Document $document
     * @param Phone    $phone
     * @param Address  $address
     * @param Partner  $partner
     */
    public function __construct(
        $displayName = null,
        $websiteURL = null,
        Document $document = null,
        Phone $phone = null,
        Address $address = null,
        Partner $partner = null
    ) {
        $this->displayName = $displayName;
        $this->websiteURL = $websiteURL;
        if (isset($document)) {
            $this->addDocuments($document);
        }
        if (isset($phone)) {
            $this->addPhones($phone);
        }
        $this->address = $address;
        $this->partner = $partner;
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
        return $this->displayName;
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
    public function getWebsiteURL()
    {
        return $this->websiteURL;
    }

    /**
     * @return Partner
     */
    public function getPartner()
    {
        return $this->partner;
    }
}