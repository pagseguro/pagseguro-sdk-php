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
 * Class Sender
 * @package PagSeguro\Domains\Requests
 */
trait Holder
{

    /**
     * @var
     */
    private $holder;

    /**
     * @var
     */
    private $adapter;

    /**
     * @return Adapter\Sender
     */
    public function setHolder()
    {
        $this->instance();
        $this->holder = new \PagSeguro\Domains\Requests\Adapter\DirectPayment\Holder($this->holder);
        return $this->adapter;
    }

    /**
     * @return \PagSeguro\Domains\DirectPayment\CreditCard\Holder
     */
    public function getHolder()
    {
        return $this->holder;
    }

    /**
     * Instanciate a new sender
     */
    private function instance()
    {
        if (empty($this->holder) || !isset($this->holder) || is_null($this->holder)) {
            $this->holder = new \PagSeguro\Domains\DirectPayment\CreditCard\Holder();
        }
    }
}
