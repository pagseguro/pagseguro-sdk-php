Feature: Direct Pre Approval
  As a developer integrating PagSeguro-PHP-SDK
  I want to request and query pre approvals

  Background:
    Given a valid account credential

  Scenario Outline: Create a pre approval request
    Given a new pre approval request <redirect_url>, <charge>, <period>, <amountPerPayment>
    When register the pre approval request
    Then should see a code for pre approval request

    Examples:
      | redirect_url                         | charge | period  | amountPerPayment |
      | http://www.lojateste.com.br/redirect | AUTO   | MONTHLY | 250.00           |
      | http://www.lojateste.com.br/redirect | MANUAL | MONTHLY | 100.00           |

  Scenario: Manual payment
    Given a new pre approval payment request
    When register the pre approval payment request
    Then I should see date and transaction code

  Scenario Outline: Change pre approval status
    Given a valid pre approval code
    When I try to change status <status>
    And register the pre approval status change request
    Then I should see null response

    Examples:
      | status    |
      | ACTIVE    |
      | SUSPENDED |


  Scenario: Edit an existing pre approval
    Given a valid pre approval request code
    And a edit request
    When register the pre approval edit request
    Then should see a null response

  Scenario: Create a discount for next payment of pre approval
    Given a auto, valid and active pre approval request code
    And a discount request
    When register the preapproval edit request
    Then should see a null response

  @query
  Scenario: Search by date
    Given a valid account credential
    When I query for preapprovals by date
    When register the request
    Then should see a response for date search

  @query
  Scenario: Search notifications by date
    Given a valid account credential
    When I query for notifications by date
    When register the request
    Then should see a response for notifications date search

  @query
  Scenario: Search payment orders
    Given a valid account credential
    When I query for preapproval payment orders
    When register the request
    Then should see a response that contains payment orders
