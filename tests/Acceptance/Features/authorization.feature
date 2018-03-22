Feature: Authorization
  As a developer integrating PagSeguro-PHP-SDK
  I want to request and query authorizations for my app

  Scenario: Create a authorization request
    Given a valid application credential
    And a new request
    And I want authorization to 'CREATE_CHECKOUTS'
    And I want authorization to 'SEARCH_TRANSACTIONS'
    And I want authorization to 'RECEIVE_TRANSACTION_NOTIFICATIONS'
    And I want authorization to 'MANAGE_PAYMENT_PRE_APPROVALS'
    And I want authorization to 'DIRECT_PAYMENT'
    When register the request
    Then a valid url must be return

  Scenario: Create a authorization request with the company registration suggestion
    Given a valid application credential
    And a new request
    And set account as company
    And I want authorization to 'CREATE_CHECKOUTS'
    And I want authorization to 'SEARCH_TRANSACTIONS'
    And I want authorization to 'RECEIVE_TRANSACTION_NOTIFICATIONS'
    And I want authorization to 'MANAGE_PAYMENT_PRE_APPROVALS'
    And I want authorization to 'DIRECT_PAYMENT'
    When register the request
    Then a valid url must be return

  Scenario: Create a authorization request with the seller registration suggestion
    Given a valid application credential
    And a new request
    And set account as seller
    And I want authorization to 'CREATE_CHECKOUTS'
    And I want authorization to 'SEARCH_TRANSACTIONS'
    And I want authorization to 'RECEIVE_TRANSACTION_NOTIFICATIONS'
    And I want authorization to 'MANAGE_PAYMENT_PRE_APPROVALS'
    And I want authorization to 'DIRECT_PAYMENT'
    When register the request
    Then a valid url must be return

  @query
  Scenario: Search Authorization by Date
    Given a valid application credential
    When I query for transactions by date
    Then should see a response for date search

  @query
  Scenario: Search Authorization by Code
    Given a valid application credential
    And a valid code
    When I query for transactions by code
    Then should see a response for code search

  @query
  Scenario: Search Authorization by Reference
    Given a valid application credential
    And a valid reference
    When I query for transactions by reference
    Then should see a response for reference search