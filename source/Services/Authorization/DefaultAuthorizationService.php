<?php

namespace PagSeguro\Services\Authorization;

use PagSeguro\Domains\Authorization;
use PagSeguro\Domains\Authorization\Company;

/**
 * Class CompanySeller
 *
 * @package PagSeguro\Services\Authorization
 */
class DefaultAuthorizationService
{
    /**
     * @var Company
     */
    private $authorization;
    /**
     * @var \DOMDocument
     */
    private $dom;

    /**
     * Seller constructor.
     *
     * @param Authorization $authorization
     */
    public function __construct(Authorization $authorization)
    {
        $this->authorization = $authorization;
        $this->dom = new \DOMDocument('1.0', 'UTF-8');
        $this->dom->xmlStandalone = true;
        $this->makeAuthorizationNode();
    }

    /**
     * @return \DOMNode
     */
    private function makeAuthorizationNode()
    {
        $authorizationRequestElement = $this->dom->createElement('authorizationRequest');
        $authorizationRequestDom = $this->dom->appendChild($authorizationRequestElement);

        $referenceElement = $this->dom->createElement('reference', $this->authorization->getReference());
        $authorizationRequestDom->appendChild($referenceElement);

        $permissionsElement = $this->dom->createElement('permissions');
        $permissionsDom = $authorizationRequestDom->appendChild($permissionsElement);

        $permissions = $this->authorization->getPermissions();
        $permissions = explode(',', $permissions);

        foreach ($permissions as $permission) {
            $codeElement = $this->dom->createElement('code', $permission);
            $permissionsDom->appendChild($codeElement);
        }
        $redirectURLElement = $this->dom->createElement('redirectURL', $this->authorization->getRedirectURL());
        $authorizationRequestDom->appendChild($redirectURLElement);

        $notificationURLElement = $this->dom->createElement('notificationURL',
            $this->authorization->getNotificationURL());
        $authorizationRequestDom->appendChild($notificationURLElement);

        return $authorizationRequestDom;
    }

    /**
     * @return string
     */
    public function getAsXML()
    {
        return $this->dom->saveXML();
    }
}