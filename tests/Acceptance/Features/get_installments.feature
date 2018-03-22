Feature: Get Installments
  As a developer integrating PagSeguro-PHP-SDK
  I want to create a session

  Scenario: Creating session with valid credentials
    Given that I want to create a new session
    And credentials of account are <email>, <token>
    And I call create method
    Then a valid session must be returned
