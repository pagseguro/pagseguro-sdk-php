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

namespace PagSeguro\Services;

use PagSeguro\Domains\Account\Credentials;
use PagSeguro\Parsers\Session\Request;
use PagSeguro\Parsers\Session\Response;
use PagSeguro\Resources\Connection;
use PagSeguro\Resources\Http;
use PagSeguro\Resources\Responsibility;

/**
 * The Session Service class
 *
 */
class Session
{
    public static function create(Credentials $credentials)
    {
        try {
            $connection = new Connection\Data($credentials);
            $http = new Http();
            $http->post(self::request($connection));

            return Responsibility::http(
                $http,
                new Request()
            );
        } catch (Exception $exc) {
            echo $exc->getTraceAsString();
        }
    }
    
    private static function request(Connection\Data $connection)
    {
        return $connection->buildSessionRequestUrl() . "?" . $connection->buildCredentialsQuery();
    }
}
