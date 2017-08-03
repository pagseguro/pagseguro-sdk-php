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

use PagSeguro\Domains\DirectPreApproval\PreApproval;
use PagSeguro\Domains\DirectPreApproval\Receiver;
use PagSeguro\Domains\DirectPreApproval\Traits\ParserTrait;

class PlanRequest
{
    use ParserTrait;
    public $redirectURL;
    public $reference;
    public $preApproval;
    public $reviewURL;
    public $maxUses;
    public $receiver;

    public function __construct()
    {
        $this->preApproval = new PreApproval();
        $this->receiver = new Receiver();
    }

    public function setRedirectURL($redirectURL)
    {
        $this->redirectURL = $redirectURL;
    }

    function setReference($reference)
    {
        $this->reference = $reference;
    }

    public function setPreApproval()
    {
        return $this->preApproval;
    }

    public function setReviewURL($reviewURL)
    {
        $this->reviewURL = $reviewURL;
    }

    public function setMaxUses($maxUsers)
    {
        $this->maxUses = $maxUsers;
    }

    public function setReceiver()
    {
        return $this->receiver;
    }
}
