Feature: Direct Pre Approval
  As a developer integrating PagSeguro-PHP-SDK
  I want to request and query pre approvals

  Background:
    Given a valid account credential
    And I have a valid pre approval code
    And I have a valid pre approval date
    And I have a valid pre approval date interval

  Scenario Outline: Create Pre Approval
    When create the pre approval request <charge>, <amount>, <maxAmountPerPeriod>, <period>, <maxTotalAmount>
    And register the request
    Then response must contain a valid url

    Examples:
      | charge | amount | maxAmountPerPeriod | period  | maxTotalAmount |
      | manual | 100.00 | 100.00             | MONTHLY | 100.00         |
      | auto   | 100.00 | 100.00             | MONTHLY | 100.00         |

  Scenario: Charge Pre Approval
    Given a valid pre approval code
    When I try to charge
    And register the charge request
    Then I should see a response

  Scenario: Cancel Pre Approval
    Given a valid pre approval code
    When I try to cancel
    Then I should see a response

  Scenario: Search Pre Approval by Code
    When I query by pre approval by code
    Then I should see a response
    And must be a instance of search by code

  Scenario: Search Pre Approval by Date
    When I query by pre approval by date
    Then I should see a response
    And must be a instance of search
    And must contain a set of pre approvals

  Scenario: Search Pre Approval by Interval
    When I query by pre approval by date interval
    Then I should see a response
    And must be a instance of search
    And must contain a set of pre approvals