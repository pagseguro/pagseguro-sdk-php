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

namespace PagSeguro\Parsers\Authorization\Search;

use PagSeguro\Domains\Account;
use PagSeguro\Domains\Permission;

/**
 * Class Response
 * @package PagSeguro\Parsers\Authorization\Search
 */
class Response
{
    /**
     * @var
     */
    private $code;
    /**
     * @var
     */
    private $creationDate;
    /**
     * @var
     */
    private $reference;
    /**
     * @var
     */
    private $account;
    /**
     * @var
     */
    private $permissions;

    /**
     * @return mixed
     */
    public function getAccount()
    {
        return $this->account;
    }

    /**
     * @param mixed $account
     * @return Response
     */
    public function setAccount($account)
    {
        $this->account = new Account();
        $this->account->setPublicKey($account);
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param mixed $code
     * @return Response
     */
    public function setCode($code)
    {
        $this->code = $code;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getCreationDate()
    {
        return $this->creationDate;
    }

    /**
     * @param mixed $creationDate
     * @return Response
     */
    public function setCreationDate($creationDate)
    {
        $this->creationDate = $creationDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param mixed $permissions
     * @return Response
     */
    public function setPermissions($permissions)
    {
        if ($permissions) {
            if (is_object($permissions)) {
                self::addPermission($permissions);
            } else {
                foreach ($permissions as $permission) {
                    $this->permissions[] = self::addPermission($permission);
                }
            }
        }
        return $this;
    }

    private function addPermission($parameter)
    {
        $permission = new Permission();
        $permission->setCode(current($parameter->code))
            ->setStatus(current($parameter->status))
            ->setLastUpdate(current($parameter->lastUpdate));
        return $permission;
    }

    /**
     * @return mixed
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param mixed $reference
     * @return Response
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
        return $this;
    }
}
