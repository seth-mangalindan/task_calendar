<?php

namespace Tests;

use App\Calendar\Calendar;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    protected $calendar;

    public function setUp(): void
    {
        parent::setUp();
        $this->calendar = $this->app->make(Calendar::class);
    }
}
