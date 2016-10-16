<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context
{
    private $event;
    private $user;

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
        $this->event = new Event();
    }
    

    /**
     * @Given there is a :eventName event
     */
    public function thereIsAEvent($eventName)
    {
        $this->event->setName($eventName);
    }

    /**
     * @Given that the event period is in :startDatetime to :endDateTime
     */
    public function thatTheEventPeriodIsInTo($startDatetime, $endDatetime)
    {
        $this->event->setStartDatetime($startDatetime);
        $this->event->setEndDatetime($endDatetime);
    }

    /**
     * @Given that the event registration period is in :startDatetime to :endDatetime
     */
    public function thatTheEventRegistrationPeriodIsInTo($startDatetime, $endDatetime)
    {
        $this->event->setRegistrationStartDatetime(new DateTime($startDatetime, new DateTimeZone("Asia/Taipei")));
        $this->event->setRegistrationEndDatetime(new DateTime($endDatetime, new DateTimeZone("Asia/Taipei")));
    }

    /**
     * @Given that the event address is :address
     */
    public function thatTheEventAddressIs($address)
    {
        $this->event->setAddress($address);
    }

    /**
     * @Given that the maximum number of the attendees is :number
     */
    public function thatTheMaximumNumberOfTheAttendeesIs($number)
    {
        $this->event->setMaxAttendees($number);
    }

    /**
     * @Given that the current number of the attendees is :number
     */
    public function thatTheCurrentNumberOfTheAttendeesIs($number)
    {
        $faker = Faker\Factory::create();
        $fakeAttendees = [];

        for ($i = 1 ; $i <= intval($number) ; $i++) {
            $fakeAttendees[] = $faker->name;
        }

        $this->event->setAttendees($fakeAttendees);
    }

    /**
     * @When I register the event
     */
    public function iRegisterTheEvent()
    {
        $this->user = new User();
    }

    /**
     * @When I input my name :name
     */
    public function iInputMyName($name)
    {
        $this->user->setName($name);
        $this->event->register($this->user);
    }

    /**
     * @Then the current number of the attendees is :number
     */
    public function theCurrentNumberOfTheAttendeesIs($number)
    {
        PHPUnit_Framework_Assert::assertEquals(intval($number), $this->event->getAttendeesNumber());
    }

    /**
     * @Then the attendee list contains my name :name
     */
    public function theAttendeeListContainsMyName($name)
    {
        PHPUnit_Framework_Assert::assertContains($name, $this->event->getAttendees());
    }


    /**
     * @Then the attendee list does not contains my name :name
     */
    public function theAttendeeListDoesNotContainsMyName($name)
    {
        PHPUnit_Framework_Assert::assertNotContains($name, $this->event->getAttendees());
    }

    /**
     * @Given that the current time is :time
     */
    public function thatTheCurrentTimeIs($time)
    {
        $dateTime = new DateTime($time, new DateTimeZone("Asia/Taipei"));
        $this->event->setCurrentDateTime($dateTime);
    }
}
