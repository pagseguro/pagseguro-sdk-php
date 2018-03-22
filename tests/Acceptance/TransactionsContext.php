<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use PHPUnit\Framework\TestCase;
use Tests\Bootstrap;

class TransactionsContext implements Context
{
    /**
     * @var $validAccountCredential \PagSeguro\Domains\AccountCredentials
     */
    private $validAccountCredential;

    /**
     * @var $validInitialDate string
     */
    private $validInitialDate;

    /**
     * @var $validTransactionCode string
     */
    private $validTransactionCode;

    /**
     * @var $validTransactionReference string
     */
    private $validTransactionReference;

    /**
     * @var
     */
    private $response;

    /**
     * @BeforeFeature
     */
    public static function init()
    {
        Bootstrap::init();
    }

    /**
     * @Given /^valid account credential$/
     */
    public function validAccountCredential()
    {
        $this->validAccountCredential = Bootstrap::getValidAccountCredentials();
    }

    /**
     * @Given /^I have a valid initial date$/
     *
     * @throws \Exception
     */
    public function iHaveAValidInitialDate()
    {
        /** @var  $response \PagSeguro\Parsers\Transaction\Search\Date\Response */
        $response = \PagSeguro\Services\Transactions\Search\Date::search(
            $this->validAccountCredential,
            ['initial_date' => (new \DateTime())->sub(\DateInterval::createFromDateString('180 days'))->format('Y-m-d\TH:i')]
        );
        $this->validInitialDate = $response->getTransactions()[0]->getDate();
    }

    /**
     * @Given /^I have a valid transaction code$/
     *
     * @throws \Exception
     */
    public function iHaveAValidTransactionCode()
    {
        /** @var  $response \PagSeguro\Parsers\Transaction\Search\Date\Response */
        $response = \PagSeguro\Services\Transactions\Search\Date::search(
            $this->validAccountCredential,
            ['initial_date' => (new \DateTime())->sub(\DateInterval::createFromDateString('180 days'))->format('Y-m-d\TH:i')]
        );
        $this->validTransactionCode = $response->getTransactions()[0]->getCode();
    }

    /**
     * @Given /^I have a valid transaction reference$/
     *
     * @throws \Exception
     */
    public function iHaveAValidTransactionReference()
    {
        /** @var  $response \PagSeguro\Parsers\Transaction\Search\Date\Response */
        $response = \PagSeguro\Services\Transactions\Search\Date::search(
            $this->validAccountCredential,
            ['initial_date' => (new \DateTime())->sub(\DateInterval::createFromDateString('180 days'))->format('Y-m-d\TH:i')]
        );

        $this->validTransactionReference = $response->getTransactions()[0]->getReference();
    }

    /**
     * @Given /^a valid initial date$/
     */
    public function aValidInitialDate()
    {
        TestCase::assertNotEmpty($this->validInitialDate);
    }

    /**
     * @When /^I query for transactions by initial date$/
     *
     * @throws \Exception
     */
    public function iQueryForTransactionsByInitialDate()
    {
        $this->response = \PagSeguro\Services\Transactions\Search\Date::search(
            $this->validAccountCredential,
            ['initial_date' => $this->validInitialDate]
        );
    }

    /**
     * @Then /^an set of transactions must be returned$/
     */
    public function anSetOfTransactionsMustBeReturned()
    {
        TestCase::assertNotEmpty($this->response);
    }

    /**
     * @When /^I query for transaction by code$/
     *
     * @throws \Exception
     */
    public function iQueryForTransactionByCode()
    {
        $this->response = \PagSeguro\Services\Transactions\Search\Code::search(
            $this->validAccountCredential,
            $this->validTransactionCode
        );
    }

    /**
     * @Then /^an transaction must be returned$/
     */
    public function anTransactionMustBeReturned()
    {
        TestCase::assertNotEmpty($this->response);
        TestCase::assertInstanceOf('PagSeguro\Parsers\Transaction\Search\Code\Response', $this->response);
    }

    /**
     * @When /^I query for transaction by reference and initial date$/
     *
     * @throws \Exception
     */
    public function iQueryForTransactionByReferenceAndInitialDate()
    {
        $this->response = \PagSeguro\Services\Transactions\Search\Reference::search(
            $this->validAccountCredential,
            $this->validTransactionCode,
            ['initial_date' => $this->validInitialDate]
        );
    }

    /**
     * @When /^I query for abandoned transaction$/
     *
     * @throws \Exception
     */
    public function iQueryForAbandonedTransaction()
    {
        $this->response = \PagSeguro\Services\Transactions\Search\Abandoned::search(
            $this->validAccountCredential,
            ['initial_date' => $this->validInitialDate]
        );
    }

    /**
     * @Then /^must be a instance of search by date$/
     */
    public function mustBeAInstanceOfSearchByDate()
    {
        TestCase::assertNotEmpty($this->response);
        TestCase::assertInstanceOf('PagSeguro\Parsers\Transaction\Search\Date\Response', $this->response);
    }

    /**
     * @Then /^must be a instance of search by code$/
     */
    public function mustBeAInstanceOfSearchByCode()
    {
        TestCase::assertNotEmpty($this->response);
        TestCase::assertInstanceOf('PagSeguro\Parsers\Transaction\Search\Code\Response', $this->response);
    }

    /**
     * @Then /^must be a instance of search by abandoned$/
     */
    public function mustBeAInstanceOfSearchByAbandoned()
    {
        TestCase::assertNotEmpty($this->response);
        TestCase::assertInstanceOf('PagSeguro\Parsers\Transaction\Search\Abandoned\Response', $this->response);
    }

    /**
     * @When /^I try to cancel$/
     *
     * @throws \Exception
     */
    public function iTryToCancel()
    {
        try {
            $this->response = \PagSeguro\Services\Transactions\Cancel::create(
                $this->validAccountCredential,
                $this->validTransactionCode
            );
        } catch (\Exception $e) {
            $this->response = $e;
        }
    }

    /**
     * @Then /^I should see a response$/
     */
    public function iShouldSeeAResponse()
    {
        TestCase::assertNotEmpty($this->response);
    }

    /**
     * @When /^I try to refund$/
     */
    public function iTryToRefund()
    {
        try {
            $this->response = \PagSeguro\Services\Transactions\Refund::create(
                $this->validAccountCredential,
                $this->validTransactionCode,
                null
            );
        } catch (\Exception $e) {
            $this->response = $e;
        }
    }
}