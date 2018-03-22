Feature: Transactins
  As a developer integrating PagSeguro-PHP-SDK
  I want to handle transactions

  Background:
    Given valid account credential
    And I have a valid initial date
    And I have a valid transaction code
    And I have a valid transaction reference

  Scenario: Cancel a valid transaction
    When I try to cancel
    Then I should see a response

  Scenario: Refund a valid transaction
    When I try to refund
    Then I should see a response

  @query
  Scenario: Search by date
    Given a valid initial date
    When I query for transactions by initial date
    Then an set of transactions must be returned
    And must be a instance of search by date

  @query
  Scenario: Search by code
    When I query for transaction by code
    Then an transaction must be returned
    And must be a instance of search by code

  @query
  Scenario: Search by reference
    When I query for transaction by reference and initial date
    Then an set of transactions must be returned
    And must be a instance of search by date

  @query
  Scenario: Search abandoned transactions
    When I query for abandoned transaction
    Then an set of transactions must be returned
    And must be a instance of search by abandoned