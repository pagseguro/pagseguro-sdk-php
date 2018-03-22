<?php

namespace Tests\Acceptance;

use Behat\Behat\Context\Context;
use PagSeguro\Domains\Requests\DirectPreApproval\Query;
use PagSeguro\Domains\Requests\DirectPreApproval\QueryNotification;
use PagSeguro\Domains\Requests\DirectPreApproval\QueryPaymentOrder;
use PHPUnit\Framework\TestCase;
use Tests\Bootstrap;
use Tests\Mock;

class DirectPreApprovalContext implements Context
{
    private $accountCredentials;

    /**
     * @var $query \PagSeguro\Domains\Requests\DirectPreApproval\Query
     */
    private $query;

    private $response;

    /**
     * @var $preApprovalRequest \PagSeguro\Domains\Requests\DirectPreApproval\Plan
     */
    private $preApprovalRequest;

    private $preApprovalCode;

    /**
     * @var $preApprovalPlanEdit \PagSeguro\Domains\Requests\DirectPreApproval\EditPlan
     */
    private $preApprovalPlanEdit;

    /**
     * @var $preApprovalDiscout \PagSeguro\Domains\Requests\DirectPreApproval\Discount
     */
    private $preApprovalDiscout;

    private $code;

    /**
     * @var $preApprovalPaymentRequest \PagSeguro\Domains\Requests\DirectPreApproval\Payment
     */
    private $preApprovalPaymentRequest;

    /**
     * @var $changeStatusRequest \PagSeguro\Domains\Requests\DirectPreApproval\Status
     */
    private $changeStatusRequest;

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
     * @When register the request
     */
    public function registerTheRequest()
    {
        $this->response = $this->query->register($this->accountCredentials);
    }

    /**
     * @When /^I query for preapprovals by date$/
     */
    public function iQueryForPreapprovalsByDate()
    {
        $this->query = new Query(
            null,
            null,
            (new \DateTime())->sub(\DateInterval::createFromDateString('120 days'))->format('Y-m-d'),
            (new \DateTime())->format('Y-m-d')
        );
        TestCase::assertInstanceOf('\PagSeguro\Domains\Requests\DirectPreApproval\Query', $this->query);
    }

    /**
     * @Then should see a response for date search
     */
    public function shouldSeeAResponseForDateSearch()
    {
        TestCase::assertInstanceOf('\PagSeguro\Domains\Requests\DirectPreApproval\Query', $this->query);
        TestCase::assertNotEmpty($this->response);
        TestCase::assertObjectHasAttribute('resultsInThisPage', $this->response);
        TestCase::assertObjectHasAttribute('currentPage', $this->response);
        TestCase::assertObjectHasAttribute('totalPages', $this->response);
        TestCase::assertObjectHasAttribute('preApprovalList', $this->response);
    }

    /**
     * @When /^I query for notifications by date$/
     */
    public function iQueryForNotificationsByDate()
    {
        $this->query = new QueryNotification(null, null, 20);
    }

    /**
     * @Then /^should see a response for notifications date search$/
     */
    public function shouldSeeAResponseForNotificationsDateSearch()
    {
        TestCase::assertInstanceOf('\PagSeguro\Domains\Requests\DirectPreApproval\QueryNotification', $this->query);
        TestCase::assertNotEmpty($this->response);
        TestCase::assertObjectHasAttribute('resultsInThisPage', $this->response);
        TestCase::assertObjectHasAttribute('currentPage', $this->response);
        TestCase::assertObjectHasAttribute('totalPages', $this->response);
        TestCase::assertObjectHasAttribute('preApprovalList', $this->response);
    }

    /**
     * @When /^I query for preapproval payment orders/
     */
    public function iQueryForPreapprovalPaymentOrders()
    {
        $this->query = new Query(
            null,
            null,
            (new \DateTime())->sub(\DateInterval::createFromDateString('120 days'))->format('Y-m-d'),
            (new \DateTime())->format('Y-m-d')
        );
        $response = $this->query->register($this->accountCredentials);
        $this->query = new QueryPaymentOrder($response->preApprovalList[0]->code, 1);
    }

    /**
     * @Then /^should see a response that contains payment orders$/
     */
    public function shouldSeeAResponseThatContainsPaymentOrders()
    {
        TestCase::assertInstanceOf('\PagSeguro\Domains\Requests\DirectPreApproval\QueryPaymentOrder', $this->query);
        TestCase::assertNotEmpty($this->response);
        TestCase::assertObjectHasAttribute('resultsInThisPage', $this->response);
        TestCase::assertObjectHasAttribute('currentPage', $this->response);
        TestCase::assertObjectHasAttribute('totalPages', $this->response);
        TestCase::assertObjectHasAttribute('paymentOrders', $this->response);
    }

    /**
     * @Given /^a new pre approval request (.*), (.*), (.*), (.*)$/
     *
     * @param $redirect_url
     * @param $charge
     * @param $period
     * @param $amountPerPayment
     */
    public function aNewPreApprovalRequest($redirect_url, $charge, $period, $amountPerPayment)
    {
        $this->preApprovalRequest = Mock::DirectPreApprovalPlanRequest($redirect_url, $charge, $period,
            $amountPerPayment);
    }

    /**
     * @When /^register the pre approval request$/
     */
    public function registerThePreApprovalRequest()
    {
        $this->response = $this->preApprovalRequest->register($this->accountCredentials);
    }

    /**
     * @Then /^should see a code for pre approval request$/
     */
    public function shouldSeeACodeForPreApprovalRequest()
    {
        TestCase::assertInstanceOf('stdClass', $this->response);
        TestCase::assertNotEmpty($this->response);
        TestCase::assertObjectHasAttribute('code', $this->response);
    }

    /**
     * @Given /^a valid pre approval request code$/
     */
    public function aValidPreApprovalRequestCode()
    {
        // TODO
        $this->preApprovalCode = 'DA8CC28B808094A774398FA2D7EF8377';
    }

    /**
     * @Given /^a edit request$/
     */
    public function aEditRequest()
    {
        $this->preApprovalPlanEdit = Mock::DirectPreApprovalPlanEditRequest($this->preApprovalCode);
    }

    /**
     * @When /^register the pre approval edit request$/
     */
    public function registerThePreApprovalEditRequest1()
    {
        $this->response = $this->preApprovalPlanEdit->register(Bootstrap::getValidAccountCredentials());
    }

    /**
     * @Then /^should see a null response$/
     */
    public function shouldSeeANullResponse()
    {
        TestCase::assertEmpty($this->response);
    }

    /**
     * @Given /^a auto, valid and active pre approval request code$/
     */
    public function aAutoValidAndActivePreApprovalRequestCode()
    {
        $this->code = 'F8C0DF4FDCDCD14DD422EFA6411F7E19';
    }

    /**
     * @Given /^a discount request$/
     */
    public function aDiscountRequest()
    {
        $this->preApprovalDiscout = Mock::DirectPreApprovalDiscountRequest($this->code);
    }

    /**
     * @When /^register the preapproval edit request$/
     */
    public function registerThePreapprovalEditRequest()
    {
        $this->response = $this->preApprovalDiscout->register(Bootstrap::getValidAccountCredentials());
    }

    /**
     * @Given /^a new pre approval payment request$/
     */
    public function aNewPreApprovalPaymentRequest()
    {
        $this->preApprovalPaymentRequest = Mock::DirectPreApprovalPaymentRequest('82CED467EDED95BCC4AADF895742764F');
    }

    /**
     * @When /^register the pre approval payment request$/
     */
    public function registerThePreApprovalPaymentRequest()
    {
        try {
            $this->response = $this->preApprovalPaymentRequest->register(Bootstrap::getValidAccountCredentials());
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'error')) {
                $this->response = 'error';
            } else {
                $this->response = false;
            }
        }
    }

    /**
     * @Then /^I should see date and transaction code$/
     */
    public function iShouldSeeDateAndTransactionCode()
    {
        TestCase::assertNotEmpty($this->response);
    }

    /**
     * @Given /^a valid pre approval code$/
     */
    public function aValidPreApprovalCode1()
    {
        $this->preApprovalCode = '82CED467EDED95BCC4AADF895742764F';
    }

    /**
     * @When /^I try to change status (.*)$/
     *
     * @param $status
     */
    public function iTryToChangeStatus($status)
    {
        $this->changeStatusRequest = Mock::DirectPreApprovalChangeStatusRequest($this->preApprovalCode, $status);
    }

    /**
     * @When /^register the pre approval status change request$/
     */
    public function registerThePreApprovalStatusChangeRequest()
    {
        try {
            $this->response = $this->changeStatusRequest->register(Bootstrap::getValidAccountCredentials());
        } catch (\Exception $e) {
            if (strpos($e->getMessage(), 'error')) {
                $this->response = null;
            } else {
                $this->response = false;
            }
        }
    }

    /**
     * @Then /^I should see null response$/
     */
    public function iShouldSeeNullResponse()
    {
        TestCase::assertEmpty($this->response);
    }
}