<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use PHPUnit\Framework\TestCase;
use Tests\Bootstrap;
use Tests\Mock;

class DirectCheckoutOnlineDebit implements Context
{
    private $accountCredentials;

    private $response;

    /**
     * @var \PagSeguro\Domains\Requests\DirectPayment\OnlineDebit
     */
    private $request;

    /**
     * @BeforeFeature
     */
    public static function init()
    {
        Bootstrap::init();
    }

    /**
     * @Given /^a valid application credential$/
     */
    public function aValidApplicationCredential()
    {
        $this->accountCredentials = Bootstrap::getValidAccountCredentials();
    }

    /**
     * @Given /^a new checkout online debit request (.*), (.*), (.*), (.*), (.*), (.*), (.*)$/
     *
     * @param $bank
     * @param $itemId
     * @param $itemName
     * @param $itemQty
     * @param $itemValue
     * @param $extraAmount
     * @param $hash
     */
    public function aNewCheckoutOnlineDebitRequest($bank, $itemId, $itemName, $itemQty, $itemValue, $extraAmount, $hash)
    {
        $this->request = Mock::DirectCheckoutOnlineDebit($bank, $itemId, $itemName, $itemQty, $itemValue, $extraAmount, $hash);
    }

    /**
     * @When /^register the request$/
     *
     * @throws \Exception
     */
    public function registerTheRequest()
    {
        try {
            $this->response = $this->request->register(Bootstrap::getValidAccountCredentials());
        } catch (\Exception $e) {
            $this->response = $e->getMessage();
        }
    }

    /**
     * @Then /^I should see a response that contain a transaction or a error$/
     */
    public function iShouldSeeAResponseThatContainATransactionOrAError()
    {
        TestCase::assertNotEmpty($this->response);
        if (is_object($this->response)) {
            TestCase::assertInstanceOf('\PagSeguro\Parsers\Transaction\OnlineDebit\Response', $this->response);
            TestCase::assertEquals(1, $this->response->getStatus());
            TestCase::assertEquals(1, $this->response->getType());
            TestCase::assertContains('Lib-Php-Examples', $this->response->getReference());
            TestCase::assertEquals(Bootstrap::getTestSelleerEmail(), $this->response->getSender()->getEmail());
            TestCase::assertTrue(filter_var($this->response->getPaymentLink(), FILTER_VALIDATE_URL) !== false, 'We expect a valid URL');
        } else {
            TestCase::assertContains('errors', $this->response);
        }
    }
}