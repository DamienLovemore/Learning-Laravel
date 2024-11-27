<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Schedule;

use Illuminate\Support\Facades\Mail;
use App\Mail\PostCountMail;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote')->hourly();

/*
//Can be put in the console also (but is better in bootstrap app, together with middleware for code abstraction and simplicity)
Schedule::call(function(){
    $mailInstance = new PostCountMail();

    $mailToSend = Mail::to("admin@gmail.com");

    $mailToSend->send($mailInstance);
})
->weekdays()
->timezone("America/Sao_Paulo")
->between("8:00", "17:00")
->unlessBetween("12:00", "13:00")
->everyOddHour();//Send the count of emails monday to friday, between 08 and 17, except break time(12 to 13), using the timezone of Brazil every minute.
*/
