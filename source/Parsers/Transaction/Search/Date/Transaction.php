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

namespace PagSeguro\Parsers\Transaction\Search\Date;

use PagSeguro\Parsers\Transaction\Search\Transactions;

/**
 * Class Transaction
 * @package PagSeguro\Parsers\Transaction\Search\Date
 */
class Transaction extends Transactions
{
    use \PagSeguro\Parsers\Response\Currency;
    use \PagSeguro\Parsers\Response\PaymentMethod;

    /**
     * @var
     */
    private $status;
    /**
     * @var
     */
    private $lastEventDate;
    /**
     * @var
     */
    private $cancellationSource;

    /**
     * @return mixed
     */
    public function getCancellationSource()
    {
        return $this->cancellationSource;
    }

    /**
     * @param mixed $cancellationSource
     * @return Transaction
     */
    public function setCancellationSource($cancellationSource)
    {
        $this->cancellationSource = $cancellationSource;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastEventDate()
    {
        return $this->lastEventDate;
    }

    /**
     * @param mixed $lastEventDate
     * @return Transaction
     */
    public function setLastEventDate($lastEventDate)
    {
        $this->lastEventDate = $lastEventDate;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     * @return Transaction
     */
    public function setStatus($status)
    {
        $this->status = $status;
        return $this;
    }
}
