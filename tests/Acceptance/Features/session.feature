Feature: Session
  As a developer integrating PagSeguro-PHP-SDK
  I want to create a session

  Background:
    Given a valid account credentiala

  Scenario: Creating session
    When I try to create a session
    Then I should see a session id
