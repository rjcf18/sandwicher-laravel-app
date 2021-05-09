Feature: Meal Creation

  Scenario: Meal is created when no meal is currently open
    Given I login as admin
    And there are no open meals
    When I attempt to open a meal registration
    Then the meal registration is successful

  Scenario: Meal is not created when a meal is already currently open
    Given I login as admin
    But there is a meal already open
    When I attempt to open a meal registration
    Then the meal registration fails with message "Meal registration not possible. A meal is already open."
