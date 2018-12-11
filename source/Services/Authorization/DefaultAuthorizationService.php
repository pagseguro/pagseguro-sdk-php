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