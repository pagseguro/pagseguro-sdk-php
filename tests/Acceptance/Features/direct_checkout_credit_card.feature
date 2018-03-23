Feature: Direct checkout
  As a developer integrating PagSeguro-PHP-SDK
  I want to create a checkout request

  Scenario Outline: Using boleto
    Given a valid application credential
    And a new checkout boleto request <itemId>, <itemName>, <itemQty>, <itemValue>, <extraAmount>, <installment>, <intallmentValue>, <hash>, <token>
    When register the request
    Then I should see a response that contain a transaction or a error

    Examples:
      | itemId | itemName  | itemQty | itemValue | extraAmount | installment | intallmentValue | hash                                                             | token                            |
      | 1      | Produto 1 | 1       | 100.00    | 0.00        | 1           | 100.00          | a696b70235450972f994c83f46f88478d1d1d7dc6dcc0b0a32d8a0652cfdce92 | 4ebd54ba5b4a40f4b24ef08f5b6b8fcd |
      | 2      | Produto 2 | 1       | 150.00    | 0.00        | 3           | 50.00           | 1                                                                | 1                                |
