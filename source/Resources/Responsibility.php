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

namespace PagSeguro\Resources;

use PagSeguro\Resources\Responsibility\Http\Methods\Generic;
use PagSeguro\Resources\Responsibility\Http\Methods\Request;
use PagSeguro\Resources\Responsibility\Http\Methods\Success;
use PagSeguro\Resources\Responsibility\Http\Methods\Unauthorized;
use PagSeguro\Resources\Responsibility\Configuration\Environment;
use PagSeguro\Resources\Responsibility\Configuration\Extensible;
use PagSeguro\Resources\Responsibility\Configuration\File;
use PagSeguro\Resources\Responsibility\Configuration\Wrapper;
use PagSeguro\Resources\Responsibility\Notifications\Application;
use PagSeguro\Resources\Responsibility\Notifications\PreApproval;
use PagSeguro\Resources\Responsibility\Notifications\Transaction;

/**
 * class Handler
 * @package PagSeguro\Services\Connection\Responsibility
 */
class Responsibility
{
    public static function http($http, $class)
    {
        $success = new Success();
        $request = new Request();
        $unauthorized = new Unauthorized();
        $generic = new Generic();

        $success->successor(
            $request->successor(
                $unauthorized->successor(
                    $generic
                )
            )
        );
        return $success->handler($http, $class);
    }

    public static function configuration()
    {
        $environment = new Environment;
        $extensible = new Extensible;
        $file = new File;
        $wrapper = new Wrapper;

        $wrapper->successor(
            $environment->successor(
                $file->successor(
                    $extensible
                )
            )
        );
        return $wrapper->handler(null, null);
    }

    public static function notifications()
    {
        $transaction = new Transaction();
        $preApproval = new PreApproval();
        $application = new Application();

        $transaction->successor(
            $preApproval->successor(
                $application
            )
        );

        return $transaction->handler();
    }
}
