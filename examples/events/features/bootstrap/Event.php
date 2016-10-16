<?php

/**
 * Created by PhpStorm.
 * User: aming
 * Date: 2016/10/16
 * Time: 下午4:28
 */
class Event
{
    private $name;
    private $startDatetime;
    private $endDatetime;

    private $registrationStartDatetime;
    private $registrationEndDatetime;

    private $currentDatetime;

    private $address;

    private $maxAttendees;

    private $attendees = [];


    public function __construct()
    {
       $this->currentDatetime = new DateTime("now", new DateTimeZone("Asia/Taipei"));
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @param mixed $startDatetime
     */
    public function setStartDatetime($startDatetime)
    {
        $this->startDatetime = $startDatetime;
    }

    /**
     * @param mixed $endDatetime
     */
    public function setEndDatetime($endDatetime)
    {
        $this->endDatetime = $endDatetime;
    }

    /**
     * @param mixed $registrationStartDatetime
     */
    public function setRegistrationStartDatetime($registrationStartDatetime)
    {
        $this->registrationStartDatetime = $registrationStartDatetime;
    }

    /**
     * @param mixed $registrationEndDatetime
     */
    public function setRegistrationEndDatetime($registrationEndDatetime)
    {
        $this->registrationEndDatetime = $registrationEndDatetime;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @param mixed $maxAttendees
     */
    public function setMaxAttendees($maxAttendees)
    {
        $this->maxAttendees = $maxAttendees;
    }

    /**
     * @param array $attendees
     */
    public function setAttendees($attendees)
    {
        $this->attendees = $attendees;
    }

    /**
     * @return array
     */
    public function getAttendees()
    {
        return $this->attendees;
    }

    public function register(User $user)
    {
        if ($this->getAttendeesNumber() >= $this->maxAttendees || !$this->isBetweenRegistrationPeriod()) {
            return false;
        }

        $this->attendees[] = $user->getName();

        return true;
    }

    public function getAttendeesNumber()
    {
        return count($this->attendees);
    }

    /**
     * @param mixed $currentDatetime
     */
    public function setCurrentDatetime(DateTime $currentDatetime)
    {
        $this->currentDatetime = $currentDatetime;
    }

    private function isBetweenRegistrationPeriod()
    {
        return $this->registrationStartDatetime < $this->currentDatetime  &&
            $this->currentDatetime < $this->registrationEndDatetime;
    }
}