Feature: Session
  As a developer integrating PagSeguro-PHP-SDK
  I want to create a session

  Scenario Outline: Creating session with valid credentials
    Given that I want to create a new session
    And credentials of account are <email>, <token>
    And I call create method
    Then a valid session must be returned

    Examples:
      | email                    | token                            |
      | thiago.pixelab@gmail.com | 9D72B35DFD8A4FDC89F6D69BD75D8F6F |

  Scenario Outline: Creating session with invalid credentials
    Given that I want to create a new session
    And credentials of account are <email>, <token>
    And I call create method
    Then a invalid session must be returned

    Examples:
      | email                    | token          |
      | thiago.pixelab@gmail.com | myInvalidToken |
