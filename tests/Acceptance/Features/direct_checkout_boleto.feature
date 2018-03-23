Feature: Direct checkout
  As a developer integrating PagSeguro-PHP-SDK
  I want to create a checkout request

  Scenario Outline: Using boleto
    Given a valid application credential
    And a new checkout boleto request <itemId>, <itemName>, <itemQty>, <itemValue>, <extraAmount>, <hash>
    When register the request
    Then I should see a response that contain a transaction or a error

    Examples:
      | itemId | itemName  | itemQty | itemValue | extraAmount | hash                                                             |
      | 1      | Produto 1 | 1       | 98.90     | 5.00        | a696b70235450972f994c83f46f88478d1d1d7dc6dcc0b0a32d8a0652cfdce92 |
      | 2      | Produto 2 | 1       | 199.90    | 5.00        | 1                                                                |
