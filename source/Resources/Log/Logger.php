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
namespace PagSeguro\Resources\Log;

use PagSeguro\Configuration\Configure;
use PagSeguro\Enum\Log\Level;

/**
 * It simply delegates all log-level-specific methods to the `log` method to
 * reduce boilerplate code that a simple Logger that does the same thing with
 * messages regardless of the error level has to implement.
 */
class Logger implements LoggerInterface
{

    const DEFAULT_FILE = "PagSeguro.Log";

    /**
     * System is unusable.
     *
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public static function emergency($message, array $context = array())
    {
        self::log(Level::EMERGENCY, $message, $context);
    }

    /**
     * Action must be taken immediately.
     *
     * Example: Entire website down, database unavailable, etc. This should
     * trigger the SMS alerts and wake you up.
     *
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public static function alert($message, array $context = array())
    {
        self::log(Level::ALERT, $message, $context);
    }

    /**
     * Critical conditions.
     *
     * Example: Application component unavailable, unexpected exception.
     *
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public static function critical($message, array $context = array())
    {
        self::log(Level::CRITICAL, $message, $context);
    }

    /**
     * Runtime errors that do not require immediate action but should typically
     * be logged and monitored.
     *
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public static function error($message, array $context = array())
    {
        self::log(Level::ERROR, $message, $context);
    }

    /**
     * Exceptional occurrences that are not errors.
     *
     * Example: Use of deprecated APIs, poor use of an API, undesirable things
     * that are not necessarily wrong.
     *
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public static function warning($message, array $context = array())
    {
        self::log(Level::WARNING, $message, $context);
    }

    /**
     * Normal but significant events.
     *
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public static function notice($message, array $context = array())
    {
        self::log(Level::NOTICE, $message, $context);
    }

    /**
     * Interesting events.
     *
     * Example: User logs in, SQL logs.
     *
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public static function info($message, array $context = array())
    {
        self::log(Level::INFO, $message, $context);
    }

    /**
     * Detailed debug information.
     *
     * @param string $message
     * @param array  $context
     *
     * @return null
     */
    public static function debug($message, array $context = array())
    {
        self::log(Level::DEBUG, $message, $context);
    }

    /**
     * @param mixed $level
     * @param string $message
     * @param array $context
     * @return bool
     * @throws \Exception
     */
    public static function log($level, $message, array $context = array())
    {

        if (!self::active()) {
            return false;
        }

        try {
            self::write(self::location(), self::message($level, $message, $context));
        } catch (\Exception $exception) {
            throw $exception;
        }
    }

    /**
     * Make a message
     * @param $level
     * @param $message
     * @param array $context
     * @return string
     */
    private static function message($level, $message, array $context = array())
    {

        $dateTime = new \DateTime('NOW');
        return sprintf(
            "\n%1s PagSeguro.%s[%1s]: %s", //"%1sPagSeguro.%2s[%3s]: %4s"
            $dateTime->format("d/m/Y H:i:s"),
            !array_key_exists("service", $context)? '' :sprintf("%1s", $context['service']),
            $level,
            $message
        );
    }

    /**
     * Write in file
     * @param $file
     * @param $message
     */
    private static function write($file, $message)
    {
        file_put_contents($file, $message, FILE_APPEND | LOCK_EX);
    }


    /**
     * Verify if the log option in configuration file is active
     * @return bool
     */
    private static function active()
    {
        return Configure::getLog()->getActive();
    }

    /**
     * Verify if has a location in configuration file
     * @return string
     */
    private static function location()
    {
        if (Configure::getLog()->getLocation()) {
            return Configure::getLog()->getLocation();
        } else {
            return sprintf("%1s/../%1s", PS_BASEPATH, self::DEFAULT_FILE);
        }
    }
}
