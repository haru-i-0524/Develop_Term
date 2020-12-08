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

Route::get('/', function () {
    return view('welcome');
});

// register
Route::get('auth/register', 'Auth\RegisterController@showRegistrationForm');
Route::post('auth/register','Auth\RegisterController@register');


//Login
Route::get('/auth/login', 'Auth\LoginController@showLoginForm');
Route::post('/auth/login', 'Auth\LoginController@login');


// Logout
Route::get('/auth/logout', 'Auth\LoginController@Logout');


// socialite
Route::get('/login/{provider}', 'Auth\LoginController@redirectToProvider')->where('social', 'google');
Route::get('/login/{provider}/callback', 'Auth\LoginController@handleProviderCallback')->where('social', 'google');



// Admin 管理者
Route::group(['prefix' => 'admin','middleware' => 'auth'], function() {
    
    
    // --Profile--
    // 1.add 
    Route::get('profile/create', 'Admin\ProfileController@add');
    // 2.create
    Route::post('profile/create', 'Admin\ProfileController@create');
    // 3.edit 
    Route::get('profile/edit', 'Admin\ProfileController@edit');
    // 4.update 
    Route::post('profile/edit', 'Admin\ProfileController@update');
    // 5.delete 
    Route::get('profile/delete', 'Admin\ProfileController@delete');
    // 6.index
    Route::get('profile', 'Admin\ProfileController@index');
    
    
    // --Report--
    // 1.add
    Route::get('report/create', 'Admin\ReportController@add');
    // 2.create
    Route::post('report/create', 'Admin\ReportController@create');
    // 3.edit
    Route::get('report/edit', 'Admin\ReportController@edit');
    // 4.update
    Route::post('report/edit', 'Admin\ReportController@update');
    // 5.delete
    Route::get('report/delete', 'Admin\ReportController@delete');
    // 6.index
    Route::get('report', 'Admin\ReportController@index');

    
    // --Mypage--
    // Mypege index
    Route::get('mypage', 'Admin\MypageController@index')->name('mypage');
    
});

 //ShopdateController 


// ゲスト　閲覧のみ
// Shoppage <- shopedate
// Route::get('/', '@index');
// Shoppage <- report
// Route::get('/', 'ReportController@index')

// userpage <- profile
// Route::get('/userpage', 'ProfileController@index');
// userpage <- report
// Route::get('/userpage', 'ReportController@index');


// Login
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');