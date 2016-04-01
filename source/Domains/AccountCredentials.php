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
 * Class AccountCredentials
 * @package PagSeguro\Domains
 */
class AccountCredentials implements Credentials
{

    /**
     * @var
     */
    private $email;
    /**
     * @var
     */
    private $token;

    /**
     * AccountCredentials constructor.
     * @param null|string $email
     * @param null|string $token
     */
    public function __construct($email = null, $token = null)
    {
        //Setting e-mail
        if (!is_null($email)) {
            $this->setEmail($email);
        }
        //Setting token
        if (!is_null($token)) {
            $this->setToken($token);
        }
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     * @return AccountCredentials
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     * @return AccountCredentials
     */
    public function setToken($token)
    {
        $this->token = $token;
        return $this;
    }

    /**
     * @return array
     */
    public function getAttributesMap()
    {
        return [
            'email' => $this->getEmail(),
            'token' => $this->getToken()
        ];
    }

    /**
     * @return string
     */
    public function toString()
    {
        return sprintf(
            "AccountCredentials[ Email : %s , Token: %s ]",
            $this->getEmail(),
            $this->getToken()
        );
    }
}
