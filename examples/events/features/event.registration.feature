Feature: Event registration
  In order to provide event management
  As a attendee
  I should register an event

  Scenario: Registering an event before registration deadline and the attendees number is under maximum number
    Given there is a "DrupalCamp Taipei 2016" event
    And that the event period is in "2016/11/12 09:00" to "2016/11/12 18:00"
    And that the event registration period is in "2016/06/30 21:20" to "2016/11/12 09:00"
    And that the event address is "台北市士林區基河路 130 號 6 樓 (銘傳大學基河校區 國際會議廳)"
    And that the maximum number of the attendees is "500"
    And that the current number of the attendees is "128"
    When I register the event
    And I input my name "阿銘"
    Then the current number of the attendees is "129"
    And the attendee list contains my name "阿銘"

  Scenario: Registering an event before registration deadline and the attendees number is over maximum number
    Given there is a "DrupalCamp Taipei 2016" event
    And that the event period is in "2016/11/12 09:00" to "2016/11/12 18:00"
    And that the event registration period is in "2016/06/30 21:20" to "2016/11/12 09:00"
    And that the event address is "台北市士林區基河路 130 號 6 樓 (銘傳大學基河校區 國際會議廳)"
    And that the maximum number of the attendees is "500"
    And that the current number of the attendees is "500"
    When I register the event
    And I input my name "阿銘"
    Then the current number of the attendees is "500"
    And the attendee list does not contains my name "阿銘"

   Scenario: Registering an event after registration deadline and the attendees number is under maximum number
     Given there is a "DrupalCamp Taipei 2016" event
     And that the current time is "2016/11/12 10:00"
     And that the event period is in "2016/11/12 09:00" to "2016/11/12 18:00"
     And that the event registration period is in "2016/06/30 21:20" to "2016/11/12 09:00"
     And that the event address is "台北市士林區基河路 130 號 6 樓 (銘傳大學基河校區 國際會議廳)"
     And that the maximum number of the attendees is "500"
     And that the current number of the attendees is "200"
     When I register the event
     And I input my name "阿銘"
     Then the current number of the attendees is "200"
     And the attendee list does not contains my name "阿銘"
