<?php

namespace Tests;

use PagSeguro\Configuration\Configure;
use PagSeguro\Domains\AccountCredentials;
use PagSeguro\Domains\ApplicationCredentials;
use PagSeguro\Library;

/**
 * Trait Bootstrap
 *
 * @package Tests
 */
trait Bootstrap
{

    /**
     * @return AccountCredentials
     */
    public static function getValidAccountCredentials()
    {
        return new AccountCredentials(self::getEmail(), getenv('PS_USER_TOKEN'));
    }

    public static function getEmail()
    {
        return getenv('PS_USER_EMAIL');
    }

    public static function getTestSelleerEmail()
    {
        return strtolower(Library::moduleVersion()->getName() . '@sandbox.pagseguro.com.br');
    }

    /**
     * @return ApplicationCredentials
     */
    public static function getValidApplicationCredentials()
    {
        return new ApplicationCredentials(getenv('PS_APPID'), getenv('PS_APPKEY'));
    }

    /**
     * @param string $environment
     * @param string $charset
     * @param bool   $log
     *
     * @return string
     */
    public static function init($environment = 'sandbox', $charset = 'UTF-8', $log = false)
    {
        try {
            Library::initialize();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        Library::cmsVersion()->setName('PHP')->setRelease(phpversion());
        Library::moduleVersion()->setName('Lib-Php-Examples')->setRelease('4.x.x');
        self::setEnvironment($environment);
        self::setCharset($charset);
        self::setLog($log);
    }

    /**
     * @param $environment
     */
    public static function setEnvironment($environment)
    {
        Configure::setEnvironment($environment);
    }

    /**
     * @param $charset
     */
    public static function setCharset($charset)
    {
        Configure::setCharset($charset);
    }

    /**
     * @param $active
     * @param $path
     */
    public static function setLog($active = false, $path = '/var/www/public/log')
    {
        Configure::setLog($active, $path);
    }
}