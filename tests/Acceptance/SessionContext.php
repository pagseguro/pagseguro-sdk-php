<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use PagSeguro\Parsers\Session\Response;
use PagSeguro\Services\Session;
use PHPUnit_Framework_TestCase;
use Tests\Bootstrap;

class SessionContext implements Context
{
    use Bootstrap;
    /**
     * @var Response | \Exception
     */
    private $session;

    /**
     * @var \PagSeguro\Domains\AccountCredentials
     */
    private $accountCredential;

    /**
     * @BeforeFeature
     */
    public static function init()
    {
        Bootstrap::init();
    }

    /**
     * @Given /^a valid account credentiala$/
     */
    public function aValidAccountCredentiala()
    {
        $this->accountCredential = Bootstrap::getValidAccountCredentials();
    }

    /**
     * @When /^I try to create a session$/
     *
     * @throws \Exception
     */
    public function iTryToCreateASession()
    {
        $this->session = Session::create($this->accountCredential);
    }

    /**
     * @Then /^I should see a session id$/
     */
    public function iShouldSeeASessionId()
    {
        PHPUnit_Framework_TestCase::assertInstanceOf('\PagSeguro\Parsers\Session\Response', $this->session);
        PHPUnit_Framework_TestCase::assertObjectHasAttribute('result', $this->session);
    }
}