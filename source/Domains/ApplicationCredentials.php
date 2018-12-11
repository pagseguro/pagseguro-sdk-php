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

namespace PagSeguro\Domains;

use PagSeguro\Domains\Account\Credentials;

/**
 * Class ApplicationCredentials
 * @package PagSeguro\Domains
 */
class ApplicationCredentials implements Credentials
{

    /**
     * @var
     */
    private $appId;
    /**
     * @var
     */
    private $appKey;
    /**
     * @var
     */
    private $authorizationCode;


    /**
     * ApplicationCredentials constructor.
     * @param null $appId
     * @param null $appKey
     */
    public function __construct($appId = null, $appKey = null)
    {
        //Setting app id
        if (!is_null($appId)) {
            $this->setAppId($appId);
        }
        //Setting app key
        if (!is_null($appKey)) {
            $this->setAppKey($appKey);
        }
    }

    /**
     * @return mixed
     */
    public function getAppId()
    {
        return $this->appId;
    }

    /**
     * @param $appId
     * @return $this
     */
    public function setAppId($appId)
    {
        $this->appId = $appId;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @param $appKey
     * @return $this
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuthorizationCode()
    {
        return $this->authorizationCode;
    }

    /**
     * @param mixed $authorizationCode
     * @return ApplicationCredentials
     */
    public function setAuthorizationCode($authorizationCode)
    {
        $this->authorizationCode = $authorizationCode;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributesMap()
    {
        return [
            'appId' => $this->getAppId(),
            'appKey' => $this->getAppKey(),
            'authorizationCode' => $this->getAuthorizationCode()
        ];
    }

    /**
     * @return string
     */
    public function toString()
    {
        return sprintf(
            "ApplicationCredentials[ Email : %s , Token: %s ]",
            $this->getAppId(),
            $this->getAppKey()
        );
    }
}
