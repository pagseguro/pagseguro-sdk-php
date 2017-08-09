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

namespace PagSeguro\Domains\Requests\DirectPreApproval;

use PagSeguro\Domains\DirectPreApproval\Item;
use PagSeguro\Domains\DirectPreApproval\Traits\ParserTrait;

/**
 * Class PaymentRequest
 *
 * @package PagSeguro\Domains\Requests\DirectPreApproval
 */
class PaymentRequest
{
    use ParserTrait;
    private $preApprovalCode;
    private $reference;
    private $senderHash;
    private $senderIp;
    private $items;

    /**
     * PaymentRequest constructor.
     */
    public function __construct()
    {
        $this->items = [];
    }

    /**
     * @param $preApprovalCode
     */
    public function setPreApprovalCode($preApprovalCode)
    {
        $this->preApprovalCode = $preApprovalCode;
    }

    /**
     * @param $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    /**
     * @param $senderHash
     */
    public function setSenderHash($senderHash)
    {
        $this->senderHash = $senderHash;
    }

    /**
     * @param $senderIp
     */
    public function setSenderIp($senderIp)
    {
        $this->senderIp = $senderIp;
    }

    /**
     * @param Item $item
     *
     * @return array
     */
    public function addItems(Item $item)
    {
        $this->items[] = $item;

        return $this->items;
    }
}
