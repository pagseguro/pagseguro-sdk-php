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

use PagSeguro\Configuration\Configure;

/**
 * Class Builder
 * @package PagSeguro\Resources
 */
class Builder
{

    /**
     * @return string
     */
    public static function getBaseUrl()
    {
        return self::getUrl('base');
    }

    /**
     * @return string
     */
    public static function getStaticUrl()
    {
        return self::getUrl('static');
    }

    /**
     * @return string
     */
    public static function getWebserviceUrl()
    {
        return self::getUrl('webservice');
    }

    /**
     * @return string
     */
    protected static function getResourcesFile()
    {
        $resources = __DIR__ . '/../Configuration/Properties/Resources.xml';

        if (defined('PS_RESOURCES')) {
            $resources = PS_RESOURCES;
        }

        return $resources;
    }

    /**
     * @param $resource
     * @param null $protocol
     * @return string
     */
    protected static function getUrl($resource, $protocol = null)
    {
        $xml = simplexml_load_file(self::getResourcesFile());

        if (is_null($protocol)) {
            $protocol = $xml->path->protocol;
        }
        $environment = Configure::getEnvironment()->getEnvironment();
        return sprintf(
            "%s://%s",
            $protocol,
            current($xml->path->{$resource}->environment->{$environment})
        );
    }

    /**
     * @param $url
     * @param $service
     * @return string
     */
    protected static function getRequest($url, $service)
    {
        return self::getService($url, $service, 'request');
    }

    /**
     * @param $url
     * @param $service
     * @return string
     */
    protected static function getResponse($url, $service)
    {
        return self::getService($url, $service, 'response');
    }

    /**
     * @param $url
     * @param $service
     * @param $http
     * @return string
     */
    protected static function getService($url, $service, $http)
    {
        $xml = simplexml_load_file(self::getResourcesFile());

        return sprintf(
            "%s/%s",
            $url,
            current(self::getProperties($xml, $service, $http))
        );
    }

    /**
     * @param $xml
     * @param $service
     * @param $http
     * @return mixed
     */
    private static function getProperties($xml, $service, $http)
    {
        $services = explode("/", $service);
        if (isset($services[1])) {
            return $xml->services->{$services[0]}->{$services[1]}->{$http};
        } else {
            return $xml->services->{$service}->{$http};
        }
    }
}
