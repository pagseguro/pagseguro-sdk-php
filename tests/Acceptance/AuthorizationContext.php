<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use PagSeguro\Domains\AccountCredentials;
use PagSeguro\Domains\Authorization\Account;
use PagSeguro\Domains\Requests\Authorization;
use PagSeguro\Services\Application\Search\Code;
use PagSeguro\Services\Application\Search\Date;
use PagSeguro\Services\Application\Search\Reference;
use PHPUnit\Framework\TestCase;
use Tests\Bootstrap;
use Tests\Mock;

/**
 * Class AuthorizationContext
 *
 * @package Tests\Acceptance
 */
class AuthorizationContext implements Context
{
    use Bootstrap;

    /**
     * @var AccountCredentials
     */
    private $accountCredentials;

    /**
     * @var Authorization
     */
    private $authorization;

    /**
     * @var
     */
    private $response;

    /**
     * @var \PagSeguro\Parsers\Authorization\Search\Date\Response
     */
    private $queryByDate;

    /**
     * @var \PagSeguro\Parsers\Authorization\Search\Response
     */
    private $queryByCode;

    /**
     * @var \PagSeguro\Parsers\Authorization\Search\Response
     */
    private $queryByReference;

    private $code;

    private $reference;

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
     * @Given /^a new request$/
     */
    public function aNewRequest()
    {
        $this->authorization = new Authorization();
        $this->authorization->setRedirectUrl('http://www.lojamodelo.com.br');
        $this->authorization->setNotificationUrl('http://www.lojamodelo.com.br/nofitication');
    }

    /**
     * @Given /^set account as company$/
     */
    public function setAccountAsCompany()
    {
        $account = new Account(self::getTestSelleerEmail(), Mock::AuthorizationComany());
        $this->authorization->setAccount($account);
    }

    /**
     * @Given /^set account as seller$/
     */
    public function setAccountAsSeller()
    {
        $account = new Account(self::getTestSelleerEmail(), Mock::AuthorizationSeller());
        $this->authorization->setAccount($account);
    }

    /**
     * @Given /^I want authorization to \'([^\']*)\'$/
     *
     * @param $arg1
     */
    public function iWantAuthorizationTo($arg1)
    {
        $this->authorization->addPermission($arg1);
    }

    /**
     * @When /^register the request$/
     *
     * @throws \Exception
     */
    public function registerTheRequest()
    {
        try {
            $this->response = $this->authorization->register(Bootstrap::getValidApplicationCredentials());
        } catch (\Exception $e) {
            $this->authorization = $e;
        }
    }

    /**
     * @Then /^a valid url must be return$/
     */
    public function aValidUrlMustBeReturn()
    {
        TestCase::assertTrue(filter_var($this->response, FILTER_VALIDATE_URL) !== false, 'We expect a valid URL');
    }

    /**
     * @When /^I query for transactions by date$/
     *
     * @throws \Exception
     */
    public function iQueryForTransactionsByDate()
    {
        $this->queryByDate = Date::search(
            Bootstrap::getValidApplicationCredentials(),
            ['initial_date' => date('Y-m-d\Th:i:s', strtotime("-90 days"))]
        );
    }

    /**
     * @Then /^should see a response for date search$/
     */
    public function shouldSeeAResponseForDateSearch()
    {
        TestCase::assertInstanceOf('PagSeguro\Parsers\Authorization\Search\Date\Response', $this->queryByDate);
    }

    /**
     * @Given /^a valid code$/
     *
     * @throws \Exception
     */
    public function aValidCode()
    {
        // First we must to find a valid code
        $this->queryByDate = Date::search(
            Bootstrap::getValidApplicationCredentials(),
            ['initial_date' => date('Y-m-d\Th:i:s', strtotime('-90 days'))]
        );

        /**
         * @var $response \PagSeguro\Parsers\Authorization\Search\Response
         */
        $response = $this->queryByDate->getAuthorizations()[0];
        $this->code = $response->getCode();
    }

    /**
     * @When /^I query for transactions by code$/
     *
     * @throws \Exception
     */
    public function iQueryForTransactionsByCode()
    {
        $this->queryByCode = Code::search(
            Bootstrap::getValidApplicationCredentials(),
            $this->code
        );
    }

    /**
     * @Then /^should see a response for code search$/
     */
    public function shouldSeeAResponseForCodeSearch()
    {
        TestCase::assertInstanceOf('PagSeguro\Parsers\Authorization\Search\Response', $this->queryByCode);
    }

    /**
     * @Given /^a valid reference$/
     *
     * @throws \Exception
     */
    public function aValidReference()
    {
        // First we must to find a valid code
        $this->queryByDate = Date::search(
            Bootstrap::getValidApplicationCredentials(),
            ['initial_date' => date('Y-m-d\Th:i:s', strtotime('-90 days'))]
        );

        /**
         * @var $response \PagSeguro\Parsers\Authorization\Search\Response
         */
        $response = $this->queryByDate->getAuthorizations()[0];
        $this->reference = $response->getReference();
    }

    /**
     * @When /^I query for transactions by reference$/
     *
     * @throws \Exception
     */
    public function iQueryForTransactionsByReference()
    {
        $this->queryByReference = Reference::search(
            Bootstrap::getValidApplicationCredentials(),
            $this->reference,
            ['initial_date' => date('Y-m-d\Th:i:s', strtotime("-90 days"))]
        );
    }

    /**
     * @Then /^should see a response for reference search$/
     */
    public function shouldSeeAResponseForReferenceSearch()
    {
        TestCase::assertInstanceOf('PagSeguro\Parsers\Authorization\Search\Date\Response', $this->queryByReference);
    }
}