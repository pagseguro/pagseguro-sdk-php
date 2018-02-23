<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use Exception;
use PagSeguro\Configuration\Configure;
use PagSeguro\Domains\AccountCredentials;
use PagSeguro\Library;
use PagSeguro\Parsers\Session\Response;
use PagSeguro\Services\Session;
use PHPUnit_Framework_TestCase;

class CreateSessionContext implements Context
{
    private $credential;
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
     * @param $user
     * @param $token
     *
     * @Given /^the credentials (.*), (.*)$/
     */
    public function theCredentials($user, $token)
    {
        $this->credential = new AccountCredentials($user, $token);
    }

    /**
     * @When /^I create the request$/
     *
     * @throws Exception
     */
    public function iCreateTheRequest()
    {
        $this->session = Session::create($this->credential);
    }

    /**
     * @Then /^a valid session must be returned$/
     *
     * @throws Exception
     */
    public function aValidSessionMustBeReturned()
    {
        PHPUnit_Framework_TestCase::assertInstanceOf(Response::class, $this->session);
    }
}