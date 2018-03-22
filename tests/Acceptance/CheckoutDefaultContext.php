<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use PHPUnit\Framework\TestCase;
use Tests\Bootstrap;
use Tests\Mock;

class CheckoutDefaultContext implements Context
{
    /**
     * @var $paymentRequest \PagSeguro\Domains\Requests\Payment
     */
    private $paymentRequest;

    private $accountCredentials;

    private $response;

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
     * @Given /^a new checkout request$/
     */
    public function aNewCheckoutRequest()
    {
        $this->paymentRequest = Mock::DefaultPaymentRequest();
        TestCase::assertInstanceOf('\PagSeguro\Domains\Requests\Payment', $this->paymentRequest);
    }

    /**
     * @When /^register the request$/
     *
     * @throws \Exception
     */
    public function registerTheRequest()
    {
        try {
            $this->response = $this->paymentRequest->register(Bootstrap::getValidAccountCredentials());
        } catch (\Exception $e) {
            $this->response = $e;
        }
    }

    /**
     * @Then /^must return a valid checkout url$/
     *
     * @throws \Exception
     */
    public function mustReturnAValidCheckoutUrl()
    {
        TestCase::assertNotEmpty($this->response);
        TestCase::assertTrue(filter_var($this->response, FILTER_VALIDATE_URL) !== false, 'We expect a valid URL');
    }
}