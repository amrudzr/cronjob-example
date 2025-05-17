<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('users:downgrade')->everyMinute();
