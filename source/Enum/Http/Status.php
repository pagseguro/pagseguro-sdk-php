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

namespace PagSeguro\Enum\Http;

use PagSeguro\Enum\Enum;

/**
 * Class Status
 * @package PagSeguro\Enum\Http
 */
class Status extends Enum
{
    /**
     * Http Method 200 - OK.
     */
    const OK = 200;
    /**
     * Http Method 400 - Bad request.
     */
    const BAD_REQUEST = 400;
    /**
     * Http Method 401 - Unauthorized.
     */
    const UNAUTHORIZED = 401;
    /**
     * Http Method 403 - Forbidden.
     */
    const FORBIDDEN = 403;
    /**
     * Http Method 404 - Not found.
     */
    const NOT_FOUND = 404;
    /**
     * Http Method 500 - Internal server error.
     */
    const INTERNAL_SERVER_ERROR = 500;
    /**
     * Http Method 502 - Bad gateway.
     */
    const BAD_GATEWAY = 502;
    /**
     * Http Method 204 - No Content.
     */
    const NO_CONTENT = 204;
}
