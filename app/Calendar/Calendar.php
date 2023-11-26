<?php
namespace App\Calendar;

use \DateTime;

class Calendar 
{
    protected string $day;
    
    protected string $month;

    protected string $year;

    protected int $numOfDaysInCalendar = 35;

    public function __construct(private DateTime $date){
        $this->day = $this->date->format('d');
        $this->month = $this->date->format('m');
        $this->year = $this->date->format('y');
    }

    public function today()
    {
        $today = $this->date->format('Y-m-d');

        return $today;
    }

    public function thisDay()
    {
        return [
            "date_number" => $this->date->format('d'),
            "date_name" => $this->date->format('D')
        ];
    }

    public function daysOfTheWeek()
    {
        $days = 0;
        $daysOfWeek = [];
        $endOfMonth = new DateTime();
        $nextMonth = $this->month == 12 ? 1 : (int)$this->month +1;

        $endOfMonth = $endOfMonth->setDate($this->year,$nextMonth, 0)->format('d');

        while($days < 7)
        {
            $today = (int)($this->date->format('d'));
            $tomorrow = $today+1;

            $daysOfWeek[$this->date->format('D')] = $this->date->format('d');

            if($today == $endOfMonth)
                {
                    $tomorrow = 1;
                    $this->date->setDate((int)$this->year,$nextMonth, $tomorrow);
                    $this->month = $this->date->format('m');
                }
                
            $this->date->setDate(2023,(int)$this->month, $tomorrow);
            $days++;
        }

        return $daysOfWeek;
    }

    public function daysOfCalendar()
    {
        $days = 0;
        $daysOfWeek = [];
        $endOfMonth = new DateTime();
        $nextMonth = $this->month == 12 ? 1 : (int)$this->month +1;

        $endOfMonth = $endOfMonth->setDate($this->year,$nextMonth, 0)->format('d');
        $this->date->setDate((int)$this->year,(int)$this->month, 1);
        while($days < $this->numOfDaysInCalendar)
        {
            $today = (int)($this->date->format('d'));
            $tomorrow = $today+1;
            $daysOfCalendar[] = $this->date->format('d');
            dump($daysOfWeek);
            if($today == $endOfMonth)
                {
                    $tomorrow = 1;
                    $this->date->setDate((int)$this->year,$nextMonth, $tomorrow);
                    $this->month = $this->date->format('m');
                }
                
            $this->date->setDate(2023,(int)$this->month, $tomorrow);
            $days++;
        }

        return $daysOfCalendar;
    }

    public function tomorrow()
    {
        $tomorrow = $this->date->setDate(2023, 11, (int)$this->day+1);

        return $tomorrow->format('Y-m-d');
    }

    public function endOfTheMonth()
    {
        $endDate = $this->date->setDate(2023,12,0)->format('Y-m-d');

        return $endDate;
    }
}