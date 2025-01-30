<?php

use App\Mail\EjemploMail;
use App\Models\Auto;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Schedule;

Schedule::call(function () {
    $auto = Auto::find(1);
    Mail::to('dennis.flores@mibanco.com.sv')->send(new EjemploMail($auto));
})->dailyAt('14:55');
