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

namespace PagSeguro\Resources\Responsibility\Http\Methods;

use PagSeguro\Enum\Http\Status;
use PagSeguro\Resources\Http;
use PagSeguro\Resources\Responsibility\Handler;

/**
 * Class Success
 * @package PagSeguro\Services\Connection\HttpMethods
 */
class Success implements Handler
{
    /**
     * @var
     */
    private $successor;

    /**
     * @param $successor
     * @return $this
     */
    public function successor($successor)
    {
        $this->successor = $successor;
        return $this;
    }

    /**
     * @param Http $http
     * @param $class
     * @return mixed
     */
    public function handler($http, $class)
    {
        if ($http->getStatus() == Status::OK) {
            return $class::success($http);
        }
        return $this->successor->handler($http, $class);
    }
}
