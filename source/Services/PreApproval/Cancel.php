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

namespace PagSeguro\Services\PreApproval;

use PagSeguro\Domains\Account\Credentials;
use PagSeguro\Parsers\Cancel\Request;
use PagSeguro\Parsers\Cancel\Response;
use PagSeguro\Resources\Connection;
use PagSeguro\Resources\Http;
use PagSeguro\Resources\Log\Logger;
use PagSeguro\Resources\Responsibility;

/**
 * Class Payment
 * @package PagSeguro\Services\Checkout
 */
class Cancel
{

    /**
     * @param Credentials $credentials
     * @param $code
     * @return Response
     * @throws \Exception
     */
    public static function create(Credentials $credentials, $code)
    {
        Logger::info("Begin", ['service' => 'PreApproval.Cancel']);
        try {
            $connection = new Connection\Data($credentials);
            $http = new Http();
            Logger::info(sprintf("GET: %s", self::request($connection, $code)), ['service' => 'PreApproval.Cancel']);
            Logger::info(
                sprintf("Params: %s", $code),
                ['service' => 'Cancel']
            );

            $http->get(self::request($connection, $code),
                20,
                \PagSeguro\Configuration\Configure::getCharset()->getEncoding());

            $response = Responsibility::http(
                $http,
                new Request
            );

            Logger::info(sprintf("Result: %s", current($response)), ['service' => 'PreApproval.Cancel']);
            return $response;
        } catch (\Exception $exception) {
            Logger::error($exception->getMessage(), ['service' => 'PreApproval.Cancel']);
            throw $exception;
        }
    }

    /**
     * @param Connection\Data $connection
     * @param $code
     * @return string
     */
    private static function request(Connection\Data $connection, $code)
    {
        return sprintf(
            "%s/%s/?%s",
            $connection->buildPreApprovalCancelUrl(),
            $code,
            $connection->buildCredentialsQuery()
        );
    }
}
