Feature: Default checkout
  As a developer integrating PagSeguro-PHP-SDK
  I want to create a checkout request

  Scenario: Default checkout
    Given a valid application credential
    And a new checkout request
    When register the request
    Then must return a valid checkout url