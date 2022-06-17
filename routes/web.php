<?php

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

//'guest'
Route::group(['middleware' => ['guest']], function () {

//ログイン
    Route::get('/user/login/form', 'logout\LoginController@LoginForm')->name('login');
    Route::get('/user/login', 'logout\LoginController@Login');
    Route::post('/user/login', 'logout\LoginController@Login');

//ユーザー登録
    Route::get('/user/register/form', 'logout\RegisterController@RegisterForm');
    Route::get('/user/register', 'logout\RegisterController@Register');
    Route::post('/user/register', 'logout\RegisterController@Register');
    Route::get('/user/added', 'logout\RegisterController@added');

});

//'auth','can:isAdmin'
Route::group(['middleware' => ['auth','can:isAdmin']], function () {


    Route::get('/auth/home', 'login\auth\HomeController@AuthHome')->name('auth_home');
    Route::get('/auth/reserve/detail/{date}/{frame}', 'login\auth\RsvDetailController@RsvDetailView');
    Route::post('/auth/reserve/detail/attendance', 'login\auth\RsvDetailController@RsvAttendanceChange');
    Route::get('/auth/frame/register/view', 'login\auth\FrameRegisterController@FrameRegisterView');
    Route::post('/auth/frame/register', 'login\auth\FrameRegisterController@FrameRegister');

});

//'auth'
Route::group(['middleware' => ['auth']], function () {

    Route::get('/logout','Logout\LoginController@logout')->name('logout');
    Route::get('/guest/home', 'login\guest\HomeController@GuestHome')->name('guest_home');
    Route::get('/guest/rsv/cancel/{id}', 'login\guest\RsvGuestController@rsvCancel');
    Route::post('/guest/reservation', 'login\guest\RsvGuestController@reservation');

});
