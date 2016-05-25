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

namespace PagSeguro\Domains\Requests\Split;

/**
 * Class Receiver
 * @package PagSeguro\Domains\Requests\Split
 */
trait Receiver
{
    /**
     * @var
     */
    private $receivers;

    /**
     * @return object
     */
    public function addReceiver()
    {
        $this->receivers = new \PagSeguro\Resources\Factory\Split\Receiver($this->split);
        return $this->receivers;
    }

    /**
     * @param $receivers
     */
    public function setReceivers($receivers)
    {
        if (is_array($receivers)) {
            $arr = array();
            foreach ($receivers as $key => $receiver) {
                if ($receiver instanceof \PagSeguro\Domains\Split\Receiver) {
                    $arr[$key] = $receiver;
                } else {
                    if (is_array($receiver)) {
                        $arr[$key] = new \PagSeguro\Domains\Split\Receiver($receiver);
                    }
                }
            }
            $this->receivers = $arr;
        }
    }

    /**
     * @return mixed
     */
    public function getReceivers()
    {
        return current($this->receivers);
    }

    /**
     * @return int
     */
    public function receiverLenght()
    {
        return count(current($this->receivers));
    }
}
