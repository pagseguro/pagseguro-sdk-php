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

namespace PagSeguro\Resources\Responsibility\Configuration;

use PagSeguro\Resources\Responsibility\Handler;

class Environment implements Handler
{
    private $successor;

    /**
     * @inheritDoc
     */
    public function successor($next)
    {
        $this->successor = $next;
        return $this;
    }

    /**
     * @inheritDoc
     */
    public function handler($action, $class)
    {
        if (getenv(\PagSeguro\Enum\Configuration\Environment::ENV) and
            getenv(\PagSeguro\Enum\Configuration\Environment::EMAIL)) {
            return array_merge(
                $this->environment(),
                $this->credentials(),
                $this->charset(),
                $this->log()
            );
        }
        return $this->successor->handler($action, $class);
    }

    private function environment()
    {
        return [
            'environment' => getenv(\PagSeguro\Enum\Configuration\Environment::ENV)
        ];
    }

    private function credentials()
    {
        return [
            'credentials' => [
                'email' => getenv(\PagSeguro\Enum\Configuration\Environment::EMAIL),
                'token' => [
                    'environment' => [
                        'production' => getenv(\PagSeguro\Enum\Configuration\Environment::TOKEN_PRODUCTION),
                        'sandbox' => getenv(\PagSeguro\Enum\Configuration\Environment::TOKEN_SANDBOX)
                    ]
                ],
                'appId' => [
                    'environment' => [
                        'production' => getenv(\PagSeguro\Enum\Configuration\Environment::APP_ID_PRODUCTION),
                        'sandbox' => getenv(\PagSeguro\Enum\Configuration\Environment::APP_ID_SANDBOX)
                    ]
                ],
                'appKey' => [
                    'environment' => [
                        'production' => getenv(\PagSeguro\Enum\Configuration\Environment::APP_KEY_PRODUCTION),
                        'sandbox' => getenv(\PagSeguro\Enum\Configuration\Environment::APP_KEY_SANDBOX)
                    ]
                ]
            ]
        ];
    }

    private function charset()
    {
        return [
            'charset' => getenv(\PagSeguro\Enum\Configuration\Environment::CHARSET)
        ];
    }

    private function log()
    {
        return [
            'log' => [
                'active' => getenv(\PagSeguro\Enum\Configuration\Environment::LOG_ACTIVE),
                'location' => getenv(\PagSeguro\Enum\Configuration\Environment::LOG_LOCATION)
            ]
        ];
    }
}
