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
    private static $accountCredentials;
    private static $applicationCredentials;
    private static $charset;
    private static $environment;
    private static $log;

    /**
     * @return AccountCredentials
     */
    public static function getAccountCredentials()
    {
        if (! isset(self::$accountCredentials)) {
            $configuration = Responsibility::configuration();
            self::setAccountCredentials(
                $configuration['credentials']['email'],
                $configuration['credentials']['token']['environment'][$configuration['environment']]
            );
        }

        return self::$accountCredentials;
    }
    
    /**
     * @param string $email
     * @param string $token
     */
    public static function setAccountCredentials($email, $token)
    {
        self::$accountCredentials = new AccountCredentials;
        self::$accountCredentials->setEmail($email)
            ->setToken($token);
    }

    /**
     * @return ApplicationCredentials
     */
    public static function getApplicationCredentials()
    {
        if (! isset(self::$applicationCredentials)) {
            $configuration = Responsibility::configuration();
            self::setApplicationCredentials(
                $configuration['credentials']['appId']['environment'][$configuration['environment']], 
                $configuration['credentials']['appKey']['environment'][$configuration['environment']]
            );
        }

        return self::$applicationCredentials;
    }
    
    /**
     * @param string $appId
     * @param string $appKey
     */
    public static function setApplicationCredentials($appId, $appKey)
    {
        self::$applicationCredentials = new ApplicationCredentials;
        self::$applicationCredentials->setAppId($appId)
            ->setAppKey($appKey);
    }

    /**
     * @return Environment
     */
    public static function getEnvironment()
    {
        if (! isset(self::$environment)) {
            $configuration = Responsibility::configuration();
            self::setEnvironment($configuration['environment']);
        }
        return self::$environment;
    }
    
    /**
     * @param string $environment
     */
    public static function setEnvironment($environment)
    {
        self::$environment = new Environment;
        self::$environment->setEnvironment($environment);
    }

    /**
     * @return Charset
     */
    public static function getCharset()
    {
        if (! isset(self::$charset)) {
            $configuration = Responsibility::configuration();
            self::setCharset($configuration['charset']);
        }
        return self::$charset;
    }
    
    /**
     * @param string $charset
     */
    public static function setCharset($charset)
    {
        self::$charset = new Charset;
        self::$charset->setEncoding($charset);
    }

    /**
     * @return Log
     */
    public static function getLog()
    {
        if (! isset(self::$log)) {
            $configuration = Responsibility::configuration();
            self::setLog(
                $configuration['log']['active'] === "false" ? false : true,
                $configuration['log']['location']
            );
        }
        return self::$log;
    }
    
    /**
     * @param boolean $active
     * @param string $location
     */
    public static function setLog($active, $location)
    {
        self::$log = new Log;
        self::$log->setActive($active)
            ->setLocation($location);
    }
}
