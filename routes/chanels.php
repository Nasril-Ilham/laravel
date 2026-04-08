<!-- Channels Routes -->
<!-- digunakan untuk menampilkan channel -->
<?php
use Illuminate\Support\Facades\Route;
Route::get('/chanels', function () {
    return 'ini adalah halaman chanels';
});

// chanels digunakan untuk menampilkan channel, contoh : youtube, instagram, facebook, dll
// untuk membuat channel baru, gunakan perintah php artisan make:channel NamaChannel
// contoh channel baru : php artisan make:channel YoutubeChannel
// setelah itu, buka file app/Channels/NamaChannel.php dan edit method broadcastOn untuk menambahkan logic channel yang diinginkan
