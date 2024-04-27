<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('send:notifications')
    ->purpose('Send notifications to users')
    ->everyMinute();
