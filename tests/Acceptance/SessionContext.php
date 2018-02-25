<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use PagSeguro\Configuration\Configure;
use PagSeguro\Domains\AccountCredentials;
use PagSeguro\Library;
use PagSeguro\Parsers\Session\Response;
use PagSeguro\Services\Session;
use PHPUnit_Framework_TestCase;

class SessionContext implements Context
{
    /** @var AccountCredentials */
    private $credential;
    /** @var Response | \Exception */
    private $session;

    /**
     * @BeforeFeature
     */
    public static function init()
    {
        try {
            Library::initialize();
        } catch (\Exception $e) {
        }
        Library::cmsVersion()->setName('PHP')->setRelease(phpversion());
        Library::moduleVersion()->setName('Lib-Php-Examples')->setRelease('4.x.x');
        Configure::setEnvironment('sandbox');
    }

    /**
     * @Given /^that I want to create a new session$/
     */
    public function thatIWantToCreateANewSession()
    {
        return true;
    }

    /**
     * @Given /^credentials of account are (.*), (.*)$/
     *
     * @param $email
     * @param $token
     */
    public function credentialsOfAccountAre($email, $token)
    {
        $this->credential = new AccountCredentials($email, $token);
    }

    /**
     * @Given /^I call create method$/
     *
     * @throws \Exception
     */
    public function iCallCreateMethod()
    {
        try {
            $this->session = Session::create($this->credential);
        } catch (\Exception $e) {
            $this->session = $e;
        }
    }

    /**
     * @Then /^a valid session must be returned$/
     */
    public function aValidSessionMustBeReturned()
    {
        PHPUnit_Framework_TestCase::assertInstanceOf(Response::class, $this->session);
        PHPUnit_Framework_TestCase::assertObjectHasAttribute('result', $this->session);
    }

    /**
     * @Then /^a invalid session must be returned$/
     */
    public function aInvalidSessionMustBeReturned()
    {
        PHPUnit_Framework_TestCase::assertInstanceOf(\Exception::class, $this->session);
        PHPUnit_Framework_TestCase::assertEquals($this->session->getMessage(), 'Unauthorized');
    }
}