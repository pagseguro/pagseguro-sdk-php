Feature: Create Session
  As an API client
  I want to create a session
  In order to create transactions

  Scenario Outline: given valid credentials
    Given the credentials <user>, <token>
    When I create the request
    Then a valid session must be returned

    Examples:
      | user                     | token                            |
      | thiago.pixelab@gmail.com | 9D72B35DFD8A4FDC89F6D69BD75D8F6F |
