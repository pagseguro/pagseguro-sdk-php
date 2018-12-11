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

namespace PagSeguro\Parsers\DirectPreApproval;

use PagSeguro\Domains\Requests\DirectPreApproval\QueryNotification;
use PagSeguro\Parsers\Error;
use PagSeguro\Parsers\Parser;
use PagSeguro\Resources\Http;

/**
 * Class QueryNotificationParser
 * @package PagSeguro\Parsers\DirectPreApproval
 */
class QueryNotificationParser extends Error implements Parser
{
    /**
     * @param QueryNotification $queryNotification
     * @return mixed
     */
    public static function getNotificationCode(QueryNotification $queryNotification)
    {
        $queryNotification = $queryNotification->object_to_array($queryNotification);

        return $queryNotification['notificationCode'];
    }

    /**
     * @param QueryNotification $directPreApproval
     * @return string
     */
    public static function getData(QueryNotification $directPreApproval)
    {
        $directPreApproval = $directPreApproval->object_to_array($directPreApproval);
        unset($directPreApproval['notificationCode']);

        return http_build_query($directPreApproval);
    }

    /**
     * @param Http $http
     * @return mixed
     */
    public static function success(Http $http)
    {
        $json = json_decode($http->getResponse());

        return $json;
    }

    /**
     * @param Http $http
     * @return mixed|\PagSeguro\Domains\Error
     */
    public static function error(Http $http)
    {
        return parent::error($http);
    }
}
