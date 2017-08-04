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

class PaymentRequest
{
    use ParserTrait;
    private $preApprovalCode;
    private $reference;
    private $senderHash;
    private $senderIp;
    private $items;

    public function __construct()
    {
        $this->items = [];
    }

    public function setPreApprovalCode($preApprovalCode)
    {
        $this->preApprovalCode = $preApprovalCode;
    }

    public function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setSenderHash($senderHash)
    {
        $this->senderHash = $senderHash;
    }

    public function setSenderIp($senderIp)
    {
        $this->senderIp = $senderIp;
    }


    public function addItems(Item $item)
    {
        $this->items[] = $item;

        return $this->items;
    }
}
