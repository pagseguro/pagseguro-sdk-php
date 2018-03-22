<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use PHPUnit\Framework\TestCase;
use Tests\Bootstrap;
use Tests\Mock;

class PreApprovalContext implements Context
{
    private $accountCredentials;

    /**
     * @var
     */
    private $response;

    /**
     * @var \PagSeguro\Domains\Requests\PreApproval
     */
    private $preApprovalCreateRequest;

    private $preApprovalCode;

    private $preApprovalDate;

    private $preApprovalDateInterval;

    /**
     * @var \PagSeguro\Domains\Requests\PreApproval\Charge
     */
    private $preApprovalChargeRequest;

    private $preApprovalCancelRequest;

    /**
     * @BeforeFeature
     */
    public static function init()
    {
        Bootstrap::init();
    }

    /**
     * @Given /^a valid account credential$/
     */
    public function aValidAccountCredential()
    {
        $this->accountCredentials = Bootstrap::getValidAccountCredentials();
    }

    /**
     * @Given /^I have a valid pre approval code$/
     *
     * @throws \Exception
     */
    public function iHaveAValidPreApprovalCode()
    {
        /** @var $response \PagSeguro\Parsers\PreApproval\Search\Result */
        $response = \PagSeguro\Services\PreApproval\Search\Date::search(
            $this->accountCredentials,
            [
                'initial_date' => '2018-01-01T00:00',
                'final_date'   => '2018-03-21T00:00',
                'page'         => 1,
                'max_per_page' => 5,
            ]
        );
        $this->preApprovalCode = $response->getPreApprovals()[0]->getCode();
    }

    /**
     * @Given /^I have a valid pre approval date$/
     *
     * @throws \Exception
     */
    public function iHaveAValidPreApprovalDate()
    {
        /** @var $response \PagSeguro\Parsers\PreApproval\Search\Result */
        $response = \PagSeguro\Services\PreApproval\Search\Date::search(
            $this->accountCredentials,
            [
                'initial_date' => '2018-01-01T00:00',
                'final_date'   => '2018-03-21T00:00',
                'page'         => 1,
                'max_per_page' => 5,
            ]
        );
        $this->preApprovalDate = $response->getPreApprovals()[0]->getDate();
    }

    /**
     * @Given /^I have a valid pre approval date interval$/
     */
    public function iHaveAValidPreApprovalDateInterval()
    {
        $this->preApprovalDateInterval = 30;
    }

    /**
     * @When /^register the request$/
     *
     * @throws \Exception
     */
    public function registerTheRequest()
    {
        $this->response = $this->preApprovalCreateRequest->register(Bootstrap::getValidAccountCredentials());
    }

    /**
     * @Then /^I should see a response$/
     */
    public function iShouldSeeAResponse()
    {
        TestCase::assertNotEmpty($this->response);
    }

    /**
     * @When /^create the pre approval request (.*), (.*), (.*), (.*), (.*)$/
     *
     * @param $charge
     * @param $amount
     * @param $maxAmountPerPeriod
     * @param $period
     * @param $maxTotalAmount
     */
    public function createThePreApprovalRequest($charge, $amount, $maxAmountPerPeriod, $period, $maxTotalAmount)
    {
        $this->preApprovalCreateRequest = Mock::preApprovalRequest($charge, $amount, $maxAmountPerPeriod, $period,
            $maxTotalAmount);
    }

    /**
     * @Then /^response must contain a valid url$/
     */
    public function responseMustContainAValidUrl()
    {
        TestCase::assertNotEmpty($this->response);
        TestCase::assertTrue(filter_var($this->response, FILTER_VALIDATE_URL) !== false, 'We expect a valid URL');
    }

    /**
     * @When /^I try to charge$/
     */
    public function iTryToCharge()
    {
        $this->preApprovalChargeRequest = Mock::preApprovalChargeRequest($this->preApprovalCode);
    }

    /**
     * @Given /^register the charge request$/
     *
     * @throws \Exception
     */
    public function registerTheChargeRequest()
    {
        try {
            $this->response = $this->preApprovalChargeRequest->register(Bootstrap::getValidAccountCredentials());
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'xml')) {
                $this->response = 'error';
            } else {
                $this->response = null;
            }
        }
    }

    /**
     * @When /^I try to cancel/
     *
     * @throws \Exception
     */
    public function iTryToCancel()
    {
        try {
            $this->response = \PagSeguro\Services\PreApproval\Cancel::create(
                $this->accountCredentials,
                $this->preApprovalCode
            );
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'xml')) {
                $this->response = 'error';
            } else {
                $this->response = null;
            }
        }
    }

    /**
     * @When /^I query by pre approval by code$/
     *
     * @throws \Exception
     */
    public function iQueryByPreApprovalByCode()
    {
        $this->response = \PagSeguro\Services\PreApproval\Search\Code::search(
            $this->accountCredentials,
            $this->preApprovalCode
        );
    }

    /**
     * @Given /^must be a instance of search by code$/
     */
    public function mustBeAInstanceOfSearchByCode()
    {
        TestCase::assertInstanceOf('\PagSeguro\Parsers\PreApproval\Search\Code\Response', $this->response);
    }

    /**
     * @When /^I query by pre approval by date$/
     *
     * @throws \Exception
     */
    public function iQueryByPreApprovalByDate()
    {
        $this->response = \PagSeguro\Services\PreApproval\Search\Date::search(
            $this->accountCredentials,
            [
                'initial_date' => (new \DateTime())->sub(\DateInterval::createFromDateString('180 days'))->format('Y-m-d\TH:i'),
                'final_date'   => (new \DateTime())->format('Y-m-d\TH:i'),
                'page'         => 1,
                'max_per_page' => 5,
            ]
        );
    }

    /**
     * @Given /^must be a instance of search$/
     */
    public function mustBeAInstanceOfSearch()
    {
        TestCase::assertInstanceOf('\PagSeguro\Parsers\PreApproval\Search\Result', $this->response);
    }

    /**
     * @When /^I query by pre approval by date interval$/
     *
     * @throws \Exception
     */
    public function iQueryByPreApprovalByDateInterval()
    {
        $this->response = \PagSeguro\Services\PreApproval\Search\Interval::search(
            $this->accountCredentials,
            $this->preApprovalDateInterval
        );
    }

    /**
     * @Given /^must contain a set of pre approvals$/
     */
    public function mustContainASetOfPreApprovals()
    {
        TestCase::assertInternalType('array', $this->response->getPreApprovals());
    }

    /**
     * @When /^I query by pre approval notification by code$/
     *
     * @throws \Exception
     */
    public function iQueryByPreApprovalNotificationByCode()
    {
        $this->response = \PagSeguro\Services\PreApproval\Search\Notification::search(
            $this->accountCredentials,
            $this->preApprovalCode
        );
    }
}
