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

namespace PagSeguro\Configuration;

use PagSeguro\Domains\AccountCredentials;
use PagSeguro\Domains\ApplicationCredentials;
use PagSeguro\Domains\Charset;
use PagSeguro\Domains\Environment;
use PagSeguro\Domains\Log;
use PagSeguro\Resources\Responsibility;

/**
 * Class Configure
 * @package PagSeguro\Configuration
 */
class Configure
{

    /**
     * @return AccountCredentials
     */
    public static function getAccountCredentials()
    {
        $configuration = Responsibility::configuration();

        $accountCredentials = new AccountCredentials;
        $accountCredentials->setEmail($configuration['credentials']['email'])
                           ->setToken(
                               $configuration['credentials']['token']['environment'][$configuration['environment']]);

        return $accountCredentials;
    }

    /**
     * @return ApplicationCredentials
     */
    public static function getApplicationCredentials()
    {
        $configuration = Responsibility::configuration();

        $appCredentials = new ApplicationCredentials;
        $appCredentials->setAppId(
            $configuration['credentials']['appId']['environment'][$configuration['environment']]
        );
        $appCredentials->setAppKey(
            $configuration['credentials']['appKey']['environment'][$configuration['environment']]
        );

        return $appCredentials;
    }

    /**
     * @return Environment
     */
    public static function getEnvironment()
    {
        $configuration = Responsibility::configuration();
        $environment = new Environment;
        $environment->setEnvironment($configuration['environment']);
        return $environment;
    }

    /**
     * @return Charset
     */
    public static function getCharset()
    {
        $configuration = Responsibility::configuration();
        $charset = new Charset;
        $charset->setEncoding($configuration['charset']);
        return $charset;
    }

    /**
     * @return Log
     */
    public static function getLog()
    {
        $configuration = Responsibility::configuration();
        $log = new Log;
        $log->setActive($configuration['log']['active'])
            ->setLocation($configuration['log']['location']);
        return $log;
    }
}
