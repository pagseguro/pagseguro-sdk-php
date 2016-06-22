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

namespace PagSeguro\Parsers;

use PagSeguro\Domains\Requests\Requests;

/**
 * Description of Parameter
 *
 */
trait Parameter
{

    /**
     * @param Requests $request
     * @return array
     */
    public static function getData(Requests $request)
    {
        $data = [];
        
        if ($request->parameterLenght() > 0) {
            $parameter = $request->getParameter();
            foreach ($parameter as $key => $value) {
                if (!is_null($parameter[$key]->getKey())) {
                    if (!is_null($parameter[$key]->getIndex())) {
                        $data[sprintf("%s%s", $parameter[$key]->getKey(), $parameter[$key]->getIndex())] =
                            $parameter[$key]->getValue();
                    } else {
                        $data[$parameter[$key]->getKey()] = $parameter[$key]->getValue();
                    }
                }
            }
        }
        return $data;
    }
}
