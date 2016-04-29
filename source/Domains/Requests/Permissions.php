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

namespace PagSeguro\Domains\Requests;

/**
 * Class Permissions
 * @package PagSeguro\Domains\Requests
 */
trait Permissions
{
    /**
     * @var null
     */
    private $permissions = null;

    /**
     * @param $permission
     * @return $this
     */
    public function addPermission($permission)
    {
        $this->increment($permission);
        return $this;
    }

    /**
     * @param array $permissions
     */
    public function setPermissions(array $permissions)
    {
        if (is_array($permissions)) {
            foreach ($permissions as $key => $permission) {
                $this->increment($permission);
            }
        }
    }

    /**
     * @return mixed
     */
    public function getPermissions()
    {
        return $this->permissions;
    }

    /**
     * @param $permission
     */
    private function increment($permission)
    {
        if (is_null($this->permissions)) {
            $this->permissions = $permission;
        } else {
            $this->permissions .= sprintf(",%s", $permission);
        }
    }
}
