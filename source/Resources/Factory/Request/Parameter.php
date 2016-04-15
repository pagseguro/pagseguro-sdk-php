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

namespace PagSeguro\Resources\Factory\Request;

use PagSeguro\Enum\Properties\Current;

/**
 * Description of Parameter
 *
 */
class Parameter
{
    private $parameter;

    public function __construct()
    {
        $this->parameter = [];
    }

    public function instance(\PagSeguro\Domains\Parameter $parameter)
    {
        return $parameter;
    }

    public function withArray($array)
    {
        $parameter = new \PagSeguro\Domains\Parameter();
        $parameter->setKey($array[0])
             ->setValue($array[1]);

        array_push($this->parameter, $parameter);
        
        if (!empty($array[2])) {
            return $this->index($array[2]);
        }
        
        return $this->parameter;
    }

    public function withParameters($key, $value)
    {
        $parameter = new \PagSeguro\Domains\Parameter();
        $parameter->setKey($key)
            ->setValue($value);
        array_push($this->parameter, $parameter);
        return $this;
    }
    
    public function index($index)
    {
        end($this->parameter)->setIndex($index);
        return $this->parameter;
    }
}
