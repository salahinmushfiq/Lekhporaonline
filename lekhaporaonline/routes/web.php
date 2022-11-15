<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\UserAuthController;
use App\User;
use Illuminate\Support\Facades\DB;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', function () {
    return view('welcome');
})->middleware('alreadyLoggedIn');
Route::get('/about', function () {
    return view('about_us');
});
Route::get('/terms', function () {
    return view('terms');
});

Route::get('/admin', function () {
    return view('admin_dashboard');
})->middleware('isLogged');
Route::get('/admin/add_playlist', function () {
    return view('admin_dashboard_add_playlist');
})->middleware('isLogged');
Route::get('/admin/edit_playlist', function () {
    return view('admin_dashboard_add_playlist');
})->middleware('isLogged');
Route::get('/admin/add_ads', function () {
    return view('admin_dashboard_add_ads');
})->middleware('isLogged');
Route::get('/admin/add_banner', function () {
    return view('admin_dashboard_add_ads');
})->middleware('isLogged');
Route::get('/admin/remove_banner', function () {
    return view('admin_dashboard_add_ads');
})->middleware('isLogged');
Route::get('/admin/add_ads', function () {
    return view('admin_dashboard_add_ads');
})->middleware('isLogged');
Route::get('/admin/remove_ads', function () {
    return view('admin_dashboard_add_ads');
})->middleware('isLogged');
Route::get('/admin/verify_admins', function () {
$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'http://lekhaporaonline.com/api/users');


//echo "Status Code: ";
//echo $response->getStatusCode(); // 200
////echo $response->getHeaderLine('content-type'); // 'application/json; charset=utf8'
//echo $response->getBody(); // '{"id": 1420053, "name": "guzzle", ...}'


$data=  $response->getBody();  
$users=json_decode($data);    
    // $users = DB::select('select * from users'); //without api call
    return view('admin_dashboard_verify_admin',compact('users'));
})->middleware('isLogged');


// Route::put('/admin/verifyAdmins', function () {
// $client = new \GuzzleHttp\Client();
// $response = $client->request('PUT', 'http://lekhaporaonline.com/api/users');

// })->middleware('isLogged');


//Route::get('login', [RegisterController::class, 'login'])->name('login');
//Route::get('logout', [RegisterController::class, 'logout']);
//
//Route::get('register', [RegisterController::class, 'register']);
Route::post('/admin/verify', 'Auth\RegisterController@verifyAdmin')->middleware('isLogged');
Route::post('/admin/remove', 'Auth\RegisterController@removeAdmin')->middleware('isLogged');
Route::post('/register', 'Auth\UserAuthController@create');
Route::post('/login', 'Auth\UserAuthController@check');
Route::get('d',function () {
    return view('welcome');
});
Route::post('/admin/add/ad', 'AdController@storeAd')->middleware('isLogged');
Route::get('logout', 'Auth\UserAuthController@logout');
Route::get('/admin/ads/show','AdController@index')->middleware('isLogged');
Route::get('/test','AdController@index2');
//Route::post('register', [RegisterController::class, 'create'])->name('auth.create');

//Route::post('create', [RegisterController::class, 'create'])->name('auth.create');
Route::post('check', [RegisterController::class, 'check'])->name('auth.check');
//Route::post('create', [RegisterController::class, 'create'])->name('auth.create');
//Route::post('check', [RegisterController::class, 'check'])->name('auth.check');