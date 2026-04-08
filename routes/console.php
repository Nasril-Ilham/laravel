<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->purpose('Display an inspiring quote');


// routes/console.php digunakan untuk command line
// untuk membuat command line baru, gunakan perintah php artisan make:command NamaCommand
// contoh command line baru : php artisan make:command HelloWorldCommand
// setelah itu, buka file app/Console/Commands/NamaCommand.php dan edit method handle untuk menambahkan logic command line yang diinginkan
