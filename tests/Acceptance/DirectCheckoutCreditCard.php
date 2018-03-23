<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Behat\Behat\Tester\Exception\PendingException;
use PHPUnit\Framework\TestCase;
use Tests\Bootstrap;
use Tests\Mock;

class DirectCheckoutCreditCard implements Context
{
    private $accountCredentials;

    private $response;

    /**
     * @var \PagSeguro\Domains\Requests\DirectPayment\CreditCard
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
     * @Given /^a new checkout boleto request (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*), (.*)$/
     *
     * @param $itemId
     * @param $itemName
     * @param $itemQty
     * @param $itemValue
     * @param $extraAmount
     * @param $installments
     * @param $installmentValue
     * @param $hash
     * @param $token
     */
    public function aNewCheckoutCreditCardRequest(
        $itemId,
        $itemName,
        $itemQty,
        $itemValue,
        $extraAmount,
        $installments,
        $installmentValue,
        $hash,
        $token
    ) {
        $this->request = Mock::DirectCheckoutCreditCard($itemId, $itemName, $itemQty, $itemValue, $extraAmount,
            $installments, $installmentValue, $hash, $token);
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
            TestCase::assertInstanceOf('\PagSeguro\Parsers\Transaction\CreditCard\Response', $this->response);
            TestCase::assertEquals(1, $this->response->getStatus());
            TestCase::assertEquals(1, $this->response->getType());
            TestCase::assertContains('Lib-Php-Examples', $this->response->getReference());
            TestCase::assertEquals(Bootstrap::getTestSelleerEmail(), $this->response->getSender()->getEmail());
        } else {
            TestCase::assertContains('errors', $this->response);
        }
    }
}