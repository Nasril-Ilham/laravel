<?php

/*
php artisan commands (dari paling sering dipakai sampai jarang):

1. php artisan serve
   - Menjalankan development server lokal.
   - Shortcut: jalankan dari root proyek dengan ./artisan serve.

2. php artisan migrate
   - Menjalankan semua migrasi database.
   - Sering dipakai saat setup baru atau setelah membuat migrasi.

3. php artisan migrate:fresh
   - Menghapus semua tabel dan menjalankan ulang migrasi.
   - Biasanya dipakai saat ingin reset database cepat.

4. php artisan migrate:rollback
   - Mengembalikan migrasi terakhir.
   - Berguna saat terjadi kesalahan di migrasi terbaru.

5. php artisan db:seed
   - Menjalankan seeder untuk mengisi data dummy.
   - Biasanya dipakai setelah migrate.

6. php artisan make:model NamaModel
   - Membuat model baru.
   - Biasanya dipakai untuk membuat model kosong tanpa file lain.

7. php artisan make:controller NamaController
   - Membuat controller baru.
   - Biasanya dipakai untuk membuat controller kosong.

   Contoh cepat untuk route + view + controller:
   1) buat controller resource: php artisan make:controller PostController --resource
   2) buat route: Route::resource('posts', PostController::class);
   3) buat view blade di resources/views/posts/index.blade.php

8. php artisan make:migration nama_migrasi
   - Membuat file migrasi baru.

9. php artisan make:seeder NamaSeeder
   - Membuat seeder baru.

10. php artisan make:factory NamaFactory
    - Membuat factory baru.

11. php artisan make:request NamaRequest
    - Membuat form request validation.

12. php artisan route:list
    - Menampilkan daftar route yang terdaftar.

    Catatan: "cache" artinya data sementara yang disimpan agar aplikasi lebih cepat.
    Saat data lama bikin masalah atau tidak sesuai lagi, kita bersihkan cache.

13. php artisan cache:clear
    - Menghapus semua cache aplikasi yang tersimpan.
    - Contoh: kalau tampilan atau konfigurasi sepertinya tidak berubah, pakai ini.

14. php artisan config:clear
    - Menghapus cache konfigurasi (file .env dan config Laravel) yang disimpan.
    - Contoh: setelah mengubah file config atau .env, jalankan ini.

15. php artisan route:clear
    - Menghapus cache daftar route.
    - Contoh: setelah menambah/mengubah route, pakai ini jika route lama masih muncul.

16. php artisan view:clear
    - Menghapus cache file view yang sudah dikompilasi.
    - Contoh: saat blade view tidak update padahal sudah ubah file.

17. php artisan optimize
    - Menghapus dan membuat ulang cache konfigurasi serta mengoptimalkan autoload.
    - Contoh: dipakai setelah deploy atau sebelum live untuk mempercepat aplikasi.

18. php artisan key:generate
    - Meng-generate APP_KEY baru.
    - Penting saat setup proyek baru.

19. php artisan storage:link
    - Membuat symbolic link ke storage untuk public access.

20. php artisan vendor:publish
    - Mempublikasikan file konfigurasi package.

21. php artisan tinker
    - Masuk ke REPL interaktif Laravel.

22. php artisan test
    - Menjalankan test dengan PHPUnit / Pest.

23. php artisan migrate:status
    - Menampilkan status migrasi.

24. php artisan schedule:run
    - Menjalankan scheduler untuk cron.

25. php artisan queue:work
    - Menjalankan worker queue.

26. php artisan queue:listen
    - Mendengarkan job queue secara terus menerus.

27. php artisan list
    - Menampilkan semua perintah artisan.

28. php artisan help <perintah>
    - Menampilkan detail penggunaan perintah.

Catatan shortcut umum:
- ./artisan <perintah> sama dengan php artisan <perintah> jika di root proyek.
- make:model dapat kombinasi flags:
  - -m  buat migrasi
  - -f  buat factory
  - -c  buat controller
  - -r  buat resource controller
  - --migration sama dengan -m
  - --factory sama dengan -f
  - --controller sama dengan -c
  - --resource sama dengan -r

  Contoh shortcut make:model:
  - php artisan make:model Product -mcr
    => buat model + migrasi + controller resource
  - php artisan make:model Product -mf
    => buat model + factory
  - php artisan make:model Product -mc
    => buat model + controller
  - php artisan make:model Product -mr
    => buat model + migrasi + resource controller

  Contoh shortcut make:controller:
  - php artisan make:controller NamaController --resource
  - php artisan make:controller NamaController --model=NamaModel
  - php artisan make:controller NamaController --resource --model=NamaModel

*/
