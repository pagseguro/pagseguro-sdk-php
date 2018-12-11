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

namespace PagSeguro\Parsers\Authorization;

use PagSeguro\Domains\Authorization;
use PagSeguro\Parsers\Basic;
use PagSeguro\Parsers\Error;
use PagSeguro\Parsers\Parser;
use PagSeguro\Resources\Http;
use PagSeguro\Services\Authorization\CompanyService;
use PagSeguro\Services\Authorization\DefaultAuthorizationService;
use PagSeguro\Services\Authorization\PersonalService;
use PagSeguro\Services\Authorization\SellerService;

/**
 * Class Request
 * @package PagSeguro\Parsers\Authorization
 */
class Request extends Error implements Parser
{
    use Basic;

    /**
     * @param \PagSeguro\Domains\Requests\Authorization $authorization
     * @return string
     */
    public static function getData(\PagSeguro\Domains\Requests\Authorization $authorization)
    {
        $authorization = new Authorization(
            $authorization->getReference(),
            $authorization->getPermissions(),
            $authorization->getRedirectUrl(),
            $authorization->getNotificationUrl(),
            $authorization->getAccount()
        );
        if (!$authorization->getAccount()) {
            $xml = new DefaultAuthorizationService($authorization);
        } else {
            if ($authorization->getAccount()->getCompany() instanceof Authorization\Company) {
                $xml = new CompanyService($authorization);
            } elseif ($authorization->getAccount()->getSeller() instanceof Authorization\Seller) {
                $xml = new SellerService($authorization);
            } elseif ($authorization->getAccount()->getPersonal() instanceof Authorization\Personal) {
                $xml = new PersonalService($authorization);
            }
        }
        return $xml->getAsXML();
    }

    /**
     * @param Http $http
     * @return mixed|Response
     */
    public static function success(Http $http)
    {
        $xml = simplexml_load_string($http->getResponse());
        return (new Response)->setCode(current($xml->code))
            ->setDate(current($xml->date));
    }

    /**
     * @param Http $http
     * @return mixed|\PagSeguro\Domains\Error
     */
    public static function error(Http $http)
    {
        $error = parent::error($http);
        return $error;
    }
}
