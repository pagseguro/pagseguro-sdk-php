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

use PagSeguro\Helpers\InitializeObject;

/**
 * Description of Parameter
 *
 */
trait Parameter
{
    private $parameter;
    
    public function addParameter()
    {
        $this->parameter = InitializeObject::Initialize(
            $this->parameter,
            new \PagSeguro\Resources\Factory\Request\Parameter()
        );
        
        return $this->parameter;
    }

    public function setParameter($parameter)
    {
        if (is_array($parameter)) {
            $arr = array();
            foreach ($parameter as $key => $parameterItem) {
                if ($parameterItem instanceof \PagSeguro\Domains\Parameter) {
                    $arr[$key] = $parameterItem;
                } else {
                    if (is_array($parameter)) {
                        $arr[$key] = new \PagSeguro\Domains\Parameter($parameterItem);
                    }
                }
            }
            $this->parameter = $arr;
        }
    }

    public function getParameter()
    {
        return current($this->parameter);
    }

    public function parameterLenght()
    {
        return (! is_null($this->parameter)) ? count(current($this->parameter)) : 0;
    }
}
