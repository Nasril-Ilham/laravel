<!-- API Routes -->
 <!-- digunakan untuk web service/API -->

 <!-- contoh route untuk API -->

 <?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); 


