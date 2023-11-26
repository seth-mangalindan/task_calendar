<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Calendar\Calendar;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CalendarTest extends TestCase
{
    
    /**
     * @test
     */
    public function give_me_date_today() 
    {
        $today = $this->calendar->today();            

        $this->assertEquals("2023-11-26", $today);
    }

    /**
     * @test
     */
    public function give_the_day_and_name_of_the_day()
    {
        $day = $this->calendar->thisDay();

        $this->assertEquals([
            "date_number" => "26",
            "date_name" => "Sun"]
        , $day);
    }


    // /**
    //  * @test
    //  */
    // public function give_dates_of_the_week()
    // {
    //     $expectedDates = [
    //         "Sun" => "26",
    //         "Mon" => "27",
    //         "Tue" => "28",
    //         "Wed" => "29",
    //         "Thu" => "30",
    //         "Fri" => "01",
    //         "Sat" => "02"
    //     ];

    //     $dates = $this->calendar->daysOfTheWeek();

    //     $this->assertEquals($expectedDates, $dates);
    // }
    
    /**
     * @test
     */
    public function give_date_of_tomorrow()
    {
        $tomorrow = $this->calendar->tomorrow();

        $this->assertEquals("2023-11-27", $tomorrow);
    }

    /**
     * @test
     */
    public function give_end_of_the_month()
    {
        $endDate = $this->calendar->endOfTheMonth();

        $this->assertEquals("2023-11-30", $endDate);
    }
}
