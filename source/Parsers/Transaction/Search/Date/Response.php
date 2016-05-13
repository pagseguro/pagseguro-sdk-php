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

/**
 * Class Response
 * @package PagSeguro\Parsers\Transaction\Search\Date
 */
class Response
{
    /**
     * @var
     */
    private $date;
    /**
     * @var
     */
    private $resultsInThisPage;
    /**
     * @var
     */
    private $transactions;
    /**
     * @var
     */
    private $currentPage;
    /**
     * @var
     */
    private $totalPages;

    /**
     * @return mixed
     */
    public function getCurrentPage()
    {
        return $this->currentPage;
    }

    /**
     * @param mixed $currentPage
     * @return Response
     */
    public function setCurrentPage($currentPage)
    {
        $this->currentPage = $currentPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     * @return Response
     */
    public function setDate($date)
    {
        $this->date = $date;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getResultsInThisPage()
    {
        return $this->resultsInThisPage;
    }

    /**
     * @param mixed $resultsInThisPage
     * @return Response
     */
    public function setResultsInThisPage($resultsInThisPage)
    {
        $this->resultsInThisPage = $resultsInThisPage;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTotalPages()
    {
        return $this->totalPages;
    }

    /**
     * @param mixed $totalPages
     * @return Response
     */
    public function setTotalPages($totalPages)
    {
        $this->totalPages = $totalPages;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTransactions()
    {
        return $this->transactions;
    }

    /**
     * @param mixed $transactions
     * @return Response
     */
    public function setTransactions($transactions)
    {
        if ($transactions) {
            if (is_object($transactions)) {
                self::addTransaction($transactions);
            } else {
                foreach ($transactions as $transaction) {
                    self::addTransaction($transaction);
                }
            }
        }
        return $this;
    }

    /**
     * @param $transaction
     */
    private function addTransaction($transaction)
    {
        $response = new Transaction();
        $response->setDate(current($transaction->date))
            ->setCode(current($transaction->code))
            ->setReference(current($transaction->reference))
            ->setType(current($transaction->type))
            ->setStatus(current($transaction->status))
            ->setLastEventDate(current($transaction->lastEventDate))
            ->setPaymentMethod($transaction->paymentMethod)
            ->setGrossAmount(current($transaction->grossAmount))
            ->setDiscountAmount(current($transaction->discountAmount))
            ->setNetAmount(current($transaction->netAmount))
            ->setExtraAmount(current($transaction->extraAmount))
            ->setCancellationSource(current($transaction->cancellationSource));
        $this->transactions[] = $response;
    }
}
