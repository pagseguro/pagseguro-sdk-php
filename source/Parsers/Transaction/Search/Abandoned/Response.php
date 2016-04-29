<?php
/**
 * Created by PhpStorm.
 * User: esilva
 * Date: 25/04/16
 * Time: 11:18
 */

namespace PagSeguro\Parsers\Transaction\Search\Abandoned;

use PagSeguro\Parsers\Transaction\Search\Abandoned\Transaction;

/**
 * Class Response
 * @package PagSeguro\Parsers\Transaction\Search\Abandoned
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
            ->setGrossAmount(current($transaction->grossAmount))
            ->setRecoveryCode(current($transaction->recoveryCode));
        $this->transactions[] = $response;
    }
}
