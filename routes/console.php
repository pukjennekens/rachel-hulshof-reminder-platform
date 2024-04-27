<?php

use Illuminate\Support\Facades\Schedule;

Schedule::command('send:notifications')
    ->everyMinute();
