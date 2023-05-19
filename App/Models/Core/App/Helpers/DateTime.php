<?php

namespace Models\Core\App\Helpers;

use Exception;

class DateTime
{


    /**
     * Summary of instance
     * @var mixed
     */
    private static $instance = null;
    /**
     * Summary of date
     * @var array|string
     */
    private $date = null;

    /**
     * Summary of dateReference
     * @var string
     */
    private $dateReference = "";

    /**
     * Summary of day
     * @var string
     */
    private $day = "";

    /**
     * Summary of month
     * @var string
     */
    private $month = "";

    /**
     * Summary of year
     * @var string
     */
    private $year = "";

    /**
     * Summary of time
     * @var mixed
     */
    private $time = "";

    /**
     * Summary of status
     * @var bool
     */
    private $status = true;

    /**
     * Summary of message
     * @var array
     */
    private $message = "";

    /**
     * Summary of rules
     * @var array
     */
    private $rules = array();

    /**
     * Summary of run
     * @return DateTime
     */
    public static function run()
    {
        if (!isset(self::$instance)) {
            self::$instance = new DateTime;
        }
        return self::$instance;
    }

    /**
     * Summary of date
     * @return array|string
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Summary of date
     * @param array|string $date Summary of date
     * @return self
     */
    public function setDate(mixed $date): self
    {
        $this->date = $date;
        return $this;
    }


    /**
     * Summary of day
     * @return string
     */
    protected function getDay()
    {
        return $this->day;
    }

    /**
     * Summary of day
     * @param string $day Summary of day
     * @return self
     */
    protected function setDay($day): self
    {
        $this->day = $day;
        return $this;
    }

    /**
     * Summary of month
     * @return string
     */
    protected function getMonth()
    {
        return $this->month;
    }

    /**
     * Summary of month
     * @param string $month Summary of month
     * @return self
     */
    protected function setMonth(string $month): self
    {
        $this->month = $month;
        return $this;
    }

    /**
     * Summary of year
     * @return string
     */
    protected function getYear()
    {
        return $this->year;
    }

    /**
     * Summary of year
     * @param string $year Summary of year
     * @return self
     */
    protected function setYear(string $year): self
    {
        $this->year = $year;
        return $this;
    }

    /**
     * Summary of time
     * @return mixed
     */
    protected function getTime()
    {
        return $this->time;
    }

    /**
     * Summary of time
     * @param mixed $time Summary of time
     * @return self
     */
    protected function setTime(string $time): self
    {
        $this->time = $time;
        return $this;
    }



    /**
     * Summary of status
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Summary of status
     * @param bool $status Summary of status
     * @return self
     */
    public function setStatus($status): self
    {
        $this->status = $status;
        return $this;
    }

    /**
     * Summary of message
     * @return array
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * Summary of message
     * @param array $message Summary of message
     * @return self
     */
    public function setMessage(array $message): self
    {
        $this->message = $message;
        return $this;
    }

    /**
     * Summary of rules
     * @return array
     */
    protected function getRules()
    {
        return $this->rules;
    }

    /**
     * Summary of rules
     * @param array $rules Summary of rules
     * @return self
     */
    public function setRules(array $rules): self
    {
        $this->rules = $rules;
        return $this;
    }

    /**
     * Summary of setDateTimeAsArray
     * @return DateTime
     */
    private function setDateTimeAsArray()
    {
        $this->setDate([
            "day" => date("l"),
            "date" => date("d/m/Y"),
            "time" => date("g:iA")
        ]);
        return $this;
    }

    /**
     * Summary of setDateTimeAsJson
     * @return DateTime
     */
    private function setDateTimeAsJson()
    {
        $this->setDateTimeAsArray();
        $this->setDate(json_encode($this->getDate()));
        return $this;
    }

    /**
     * Summary of getDateTimeAsJson
     * @return string
     */
    public function getDateTimeAsJson()
    {
        $this->setDateTimeAsJson();
        return $this->getDate();
    }

    /**
     * Summary of setDatePrimitivies
     * @return DateTime
     */
    private function setDatePrimitivies()
    {
        $this->setDate(strtotime($this->getDate()));
        $this->setMonth(date("m", $this->getDate()));
        $this->setDay(date("d", $this->getDate()));
        $this->setYear(date("Y", $this->getDate()));
        return $this;
    }


    /**
     * Summary of validateYearFromLimits
     * @return DateTime|void
     */
    private function validateYearFromLimits()
    {
        if (Formatter::verifyArrayKey("year", $this->getRules())) {
            $year = $this->getRules()["year"];
            if (is_object($year)) {
                $year = Formatter::formatToArray($year);
            }
            if (Formatter::verifyArrayKey("start-year", $year)) {
                if ((int) $this->getYear() < (int) $year["start-year"]) {
                    $this->setStatus(false);
                    $this->setMessage(["errmsg" => "start-year"]);
                    return $this;
                }
            }
            if (Formatter::verifyArrayKey("end-year", $year)) {
                if ((int) $this->getYear() > (int) $year["end-year"]) {
                    $this->setStatus(false);
                    $this->setMessage(["errmsg" => "end-year"]);
                    return $this;
                }
            }
        }
        return $this;
    }

    /**
     * Validate month from limits
     * @return DateTime|void
     */
    private function validateMonthFromLimits()
    {
        if (Formatter::verifyArrayKey("month", $this->getRules())) {
            $month = $this->getRules()["month"];
            if (is_object($month)) {
                $month = Formatter::formatToArray($month);
            }
            if (Formatter::verifyArrayKey("start-month", $month)) {
                if ((int) $this->getMonth() < (int) $month["start-month"]) {
                    $this->setStatus(false);
                    $this->setMessage(["errmsg" => "start-month"]);
                    return $this;
                }
            }
            if (Formatter::verifyArrayKey("end-month", $month)) {
                if ((int) $this->getMonth() > (int) $month["end-month"]) {
                    $this->setStatus(false);
                    $this->setMessage(["errmsg" => "end-month"]);
                    return $this;
                }
            }
        }
        return $this;
    }

    /**
     * Validate month from limits
     * @return DateTime|void
     */
    private function validateDateFromReference()
    {
        if (Formatter::verifyArrayKey("date", $this->getRules())) {
            $date = $this->getRules()["date"];
            $dateRef = date("d", self::formatStringToTime($this->getDateReference()));
            if (is_object($date)) {
                $date = Formatter::formatToArray($date);
            }
            if (Formatter::verifyArrayKey("start-date", $date)) {
                if ((int) $this->getDay() < (int) $dateRef) {
                    $this->setStatus(false);
                    $this->setMessage(["errmsg" => "start-date"]);
                    return $this;
                }
            }
        }
        return $this;
    }
    /**
     * Summary of checkDate
     * @return DateTime
     */
    public function checkDate()
    {
        $this->setDatePrimitivies();
        $this->validateYearFromLimits();
        $this->validateMonthFromLimits();
        $this->validateDateFromReference();
        return $this;
    }

    /**
     * Summary of formatDate
     * @param string $date
     * @param string $format
     * @return string
     */
    public function formatDate(string $date, string $format)
    {
        $date = strtotime($date);
        $date = date($format, $date);
        return $date;
    }


    /**
     * Summary of date
     * @return array|string
     */
    public static function date()
    {
        self::run()->setDate(date("l, d/m/Y"));
        return self::run()->getDate();
    }

    /**
     * Summary of dateTime
     * @return array|string
     */
    public static function dateTime()
    {
        self::run()->setDate(date("l, d/m/Y g:iA"));
        return self::run()->getDate();
    }

    /**
     * Summary of formatStringToTime
     * @param string $timestamp
     * @return bool|int
     */
    public static function formatStringToTime(string $timestamp)
    {
        return strtotime($timestamp);
    }


    /**
     * Summary of dateReference
     * @return string
     */
    private function getDateReference()
    {
        return $this->dateReference;
    }

    /**
     * Summary of dateReference
     * @param string $dateReference Summary of dateReference
     * @return self
     */
    public function setDateReference(string $dateReference): self
    {
        $this->dateReference = $dateReference;
        return $this;
    }
}