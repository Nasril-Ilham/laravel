<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RouteControllerView;
use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\WelcomeToBlog;
use Illuminate\Routing\Events\Routing;
use Illuminate\Support\Facades\Route;
use Monolog\Processor\PsrLogMessageProcessor;

// route view blade digunakan untuk menampilkan halaman view, contoh : menampilkan halaman home, about 
// berbeda dengan route biasa yang menggunakann retuen saja untuk menampilkan halaman view, kita menggunakan method view dan
// mengirimkan nama file view yang ingin ditampilkan, contoh : view('home') untuk menampilkan file home.blade.php yang ada di folder resources/views

Route::get('/', function () {
    return view('welcome');
    // welcome ini adalah nama file view yang ingin ditampilkan, jadi kita harus membuat file welcome.blade.php terlebih dahulu di folder resources/views sebelum menggunakan route ini, dll
});


// pembatas 


// METHOD HTTP ROUTING

// get digunakan untuk menampilkan data, contoh : menampilkan halaman home, about, contact, dll
Route::get('/hello', function () {
    return 'Hello, World!';
});

// post digunakan untuk menyimpan data, contoh : menyimpan data user, menyimpan data produk, dll
// ke dalam database, dll
Route::post('/testingword', function () {
    return 'Hello' ;
});

// put digunakan untuk mengupdate data, contoh : mengupdate data user, mengupdate data produk, dll
// ke dalam database, dll
Route::put('/testingword', function () {
    return 'Hello' ;
});

// delete digunakan untuk menghapus data, contoh : menghapus data user, menghapus data produk, dll
// ke dalam database, dll
Route::delete('/testingword', function () {
    return 'Hello' ;
});


// tugas ke bawah 

// ROUTE BASIC 

Route::get('/hello', function () {
    return 'Hello, World!';
});

Route::get('/word', function () {
    return 'Hello' ;
});

Route::get('/', function () {
    return 'selamat datang / welcome';
});

Route::GET('/about', function (){
    return 'NIM : 24552021016 <BR> Nama : Mohammad nasril ilham <BR> Kelas : TI 241A';
});

// ROUTE PARAMETER SINGLE PARAMETER

// route parameter digunakan untuk mengambil data dari url, contoh : menampilkan data user
// berdasarkan id, menampilkan data produk berdasarkan id, dll

Route::get('/user/{nama}', function ($nama) {
    return 'Hello, ' . $nama;
});

Route::get('/produk/{id}', function ($id) {
    return 'Produk dengan id ' . $id;
});

// ROUTE PARAMATER DENGAN BEBERAPA PARAMETER

Route::get('/user/{nama}/alamat/{alamat}', function ($nama, $alamat) {
    return 'Hello, ' . $nama . ' Alamat : ' . $alamat;
});

Route::get('/articel/{id}', function ($id) {
    return 'articel dengan id halaman ' . $id;
});

Route::get('/posts/{post}/comments/{comment}', function ($postId, $commentId) {
    return 'Post ID: ' . $postId . ' Comment ID: ' . $commentId;
});


// OPTIONAL PARAMETER

// no nilai atau null
Route::get('/userr/{nama?}', function ($name=null) {
    return 'nama saya ' . $name;
});

// default nilai
Route::get('/userr/{nama?}', function ($nama='nasril') {
    return 'nama saya adalah ' . $nama;
});


// ROUTE NAME
// route name digunakan untuk memberikan nama pada route, sehingga kita bisa memanggil route tersebut dengan nama yang sudah kita buat, 
//contoh : memanggil route home dengan nama home, memanggil route about dengan nama about, dll

// Route name biasanya digunakan untuk mempermudah kita dalam pemanggilan route saat
// membangun aplikasi. Kita cukup memanggil name dari route tersebut.

// Route::get('/userrr/profil', function(){
//     //
// })->name('profil');


// Route::get('/User/profile', [UserProfileController::class, 'show']
// )->name('user.profile');

// generating URL
// kita bisa menghasilkan URL dari route dengan nama yang sudah kita buat, 
// contoh : menghasilkan URL dari route dengan nama 'profil', menghasilkan URL dari route dengan nama 'user.profile', dll

// $url = route('profil'); 

// menghasilkan URL dari route dengan nama 'profil'
// hasilnya akan menjadi http://localhost:8000/userrr/profil

//generatg redirect
// kita bisa melakukan redirect ke route dengan nama yang sudah kita buat,
// fungsi redirect biasanya digunakan untuk mengalihkan pengguna ke halaman lain setelah melakukan suatu aksi,
// contoh : setelah menyimpan data user, kita akan mengalihkan pengguna ke halaman profil, dll

// return redirect()->route('profil');


// ROUTIN GROUPING 

// routing di bawah ini di gunakan untuk mengelompokkan beberapa route yang memiliki middleware yang sama, sehingga kita tidak perlu menuliskan middleware pada setiap route,
// cukup menuliskan middleware pada groupnya saja, contoh : kita memiliki beberapa route yang menggunakan middleware auth, maka kita bisa mengelompokkan route tersebut dalam satu 
// group dengan middleware auth, dll

// middleware adalah sebuah lapisan yang berada di antara request dan response, yang berfungsi untuk memproses request sebelum sampai ke controller, 
// atau memproses response sebelum dikirim ke client, contoh : middleware auth digunakan untuk memeriksa apakah pengguna sudah login atau belum, middleware guest digunakan untuk memeriksa apakah pengguna belum login atau sudah login, dll

Route::middleware(['first', 'second' ]) ->group(function(){
    Route::get('/', function(){
        // menggunakan middleware first dan second
    });

    Route::get('/user1/profile1', function(){
        // menggunakan middleware first dan second
    });
});

//
Route::domain('{account}.example.com')->group(function () {
    Route::get('user/{id}', function ($account, $id) {
        //
    });
});

// event route adalah sebuah fitur yang digunakan untuk menangani event yang terjadi pada aplikasi, contoh : event ketika user login, event ketika user logout, dll
// post route digunakan untuk menangani request yang dikirimkan oleh client, contoh : ketika user mengirimkan data melalui form, dll

// Route::middleware('auth')->group(function(){
//     Route::get('/user2', [UserController::class, 'index']);
//     Route::get('/post', [PostController::class, 'index']);
//     Route::get('/event', [EventController::class, 'index']);

// });

// ROUTE PREFIX
 
// Route::prefix('admin')->group(function(){
//     Route::get('/users', [UserController::class, 'index']);
//     Route::get('/posts', [PostController::class, 'index']);
//     Route::get('/events', [EventController::class, 'index']);
// });

// VIEW ROUTE
// view route digunakan untuk menampilkan halaman view, contoh : menampilkan halaman home, about, contact, dll
// view route biasanya digunakan untuk menampilkan halaman yang tidak membutuhkan logika yang rumit, seperti halaman home, about
// contact, dll, sehingga kita tidak perlu membuat controller untuk menampilkan halaman tersebut, dll

Route::view('/welcome', 'welcome');
Route::view('/welcome', 'welcome', ['nama' => 'Nasril']);



// DI LUAR MODULE ROUTE


// REDIRECT ROUTE
// redirect route digunakan untuk mengalihkan pengguna ke halaman lain, contoh : mengalihkan pengguna ke halaman home, mengalihkan pengguna ke halaman about, dll

Route::redirect('/here', '/there', 301);

// 301 adalah status code untuk permanent redirect, yang berarti bahwa halaman yang dituju sudah tidak ada lagi dan sudah digantikan dengan halaman yang baru, sehingga mesin pencari akan mengupdate URL yang dituju dengan URL yang baru, dll


// ROUTE NAME SPACE ??

// Route::namespace('Admin')->group(function(){
//     Route::get('/users', [UserController::class, 'index']);
//     Route::get('/posts', [PostController::class, 'index']);
//     Route::get('/events', [EventController::class, 'index']);
// });



// ROUTE RESOURCE
// route resource digunakan untuk membuat route yang berhubungan dengan resource, contoh
// : membuat route untuk menampilkan data user, membuat route untuk menyimpan data user, membuat route untuk mengupdate data user, dll  

// Route::resource('photos', PhotoController::class);

// route di atas akan membuat route untuk menampilkan data photo, menyimpan data photo, mengupdate data photo, dll sesuai dengan method yang ada di PhotoController.
// route yang dihasilkan oleh route resource di atas adalah sebagai berikut : 
// GET /photos -> index
// code di atas akan seperti berikut :
Route::get('/photos', [PhotoController::class, 'index']);
// GET /photos/create -> create
Route::get('/photos/create', [PhotoController::class, 'create']);
// POST /photos -> store
Route::post('/photos', [PhotoController::class, 'store']);
// GET /photos/{photo} -> show
Route::get('/photos/{photo}', [PhotoController::class, 'show']);
// GET /photos/{photo}/edit -> edit
Route::get('/photos/{photo}/edit', [PhotoController::class, 'edit']);
// PUT/PATCH /photos/{photo} -> update
Route::put('/photos/{photo}', [PhotoController::class, 'update']);
// DELETE /photos/{photo} -> destroy
Route::delete('/photos/{photo}', [PhotoController::class, 'destroy']);


// ROTE MODEL BINDING
// route model binding digunakan untuk mengikat model dengan route, sehingga kita bisa langsung menggunakan model pada
// controller tanpa harus mengambil data dari database terlebih dahulu, contoh : kita memiliki route untuk menampilkan data user berdasarkan id, maka kita bisa langsung menggunakan model User pada controller untuk menampilkan data user tersebut, dll

Route::get('/users/{user}', function (App\Models\User $user) {
    return $user->email;
});

// pada route di atas, kita menggunakan model User untuk mengambil data user berdasarkan id yang dikirimkan melalui url, sehingga kita tidak perlu mengambil data user dari database terlebih dahulu, dll
// contoh yang sering kita temui dalam alikasi seperti blog, kita memiliki route untuk menampilkan data post berdasarkan id, maka kita bisa langsung menggunakan model Post pada controller untuk menampilkan data post tersebut, dll


// kalau liat ke atas trs ada yang merah pada controlernya itu terjadi karna kita belum membuat controller tersebut, jadi kita harus membuat controller terlebih dahulu sebelum menggunakan controller tersebut pada route, 
// contoh : kita ingin menggunakan WelcomeController pada route, maka kita harus membuat WelcomeController terlebih dahulu dengan perintah php artisan make:controller WelcomeController, setelah itu baru kita bisa menggunakan WelcomeController pada route, dll

// ------------------------------------------------------------------------------------


// tugas controler dan route chanels

Route::get('/hello', [WelcomeController::class, 'hello']);


// singel pagecontoler
Route::get('/', [PageController::class, 'index']);

Route::get('/about', [PageController::class, 'about']);

Route::get('/articel/{id}', [PageController::class, 'articel']);


// multi page controller

Route::get('/home', [HomeController::class, 'index']);
Route::get('/about', [AboutController::class, 'about']);
Route::get('/articel/{id}', [ArticleController::class, 'articel']);



// --resource controller ini jika di gunakan semuanya 

Route::resource('photos', PhotoController::class);


// -- resource controller ini jika di gunakan sebagian saja

Route::resource('photos', PhotoController::class)->only([
    'index', 'show'
]);
// di atas hanya akan membuat route untuk menampilkan data photo dan menampilkan data photo berdasarkan id, sedangkan route untuk menyimpan data photo, mengupdate data photo, dll tidak akan dibuat, dll

Route::resource('photos', PhotoController::class)->except([
    'create', 'store', 'update', 'destroy'
]);
// di atas hanya akan membuat route untuk menampilkan data photo dan menampilkan data photo berdasarkan id

// ada dua cara agr kita bisa menggunakan resource controller sebagian saja, yaitu dengan menggunakan method only dan except, 
// dimana method only digunakan untuk menentukan route yang ingin kita buat, sedangkan method except digunakan untuk menentukan route yang tidak ingin kita buat, dll


// ---------------------------------------------------------------------------------

// route to view atau blade

// sebernanya route ke blade itu tidak terlalu di sarankan yang di sarankan itu adalah " route -> controller -> view " jadi kita membuat controller terlebih dahulu kemudian di dalam controller kita memanggil view yang ingin kita tampilkan, dll

// contoh langsung ke view atau blade

Route::get('/greeting', function () {
    return view('hallo', ['name' => 'Nasril']);
});

// return view('hallo', = hallo di sini ada nama file yang ingin kita tujukan untuk menampilkan halaman hallo.blade

// contoh menggunakan Route ke controller ke view atau blade

Route::get('/testingcontroller', [RouteControllerView::class, 'index']);

// yang di buka di website selalu /nama route nya, jadi kita harus menyesuaikan nama route dengan nama yang kita buat di controller, dll
// semuanya entah itu route biasa, route resource, route view, dll semuanya bisa kita gunakan untuk menampilkan halaman view atau blade, tergantung kebutuhan kita, dll


// jika view ada di daalam folder maka kita harus menuliskan nama foldernya juga, contoh : view('folder.hallo') untuk menampilkan file hallo.blade.php yang ada di dalam folder folder, dll

Route::get('/greetings', function () {
    return view('blog.hello-blog', ['name' => 'Nasril']);
    
});


// controler view dengan compact

Route::get('/hallo-blog', [WelcomeToBlog::class, 'index']);