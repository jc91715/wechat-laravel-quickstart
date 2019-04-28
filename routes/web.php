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
\Auth::login(\App\User::find(1));
//Auth::routes();

Route::get('wechat/redirect','WechatController@redirect')->name('wechat.redirect');
Route::get('wechat/callback','WechatController@callback')->name('wechat.callback');

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['middleware'=>'auth'],function(){
    Route::middleware([])->get('/api/user', function () {
        return ['name'=>'ddd','introduction'=>'','avatar'=>'https://wpimg.wallstcn.com/f778738c-e4f8-4870-b634-56703b4acafe.gif','roles'=>['admin'],'csrfToken'=>csrf_token()];
    });
    Route::any('/{all?}','Controller@front')->where(['all'=>'.*']);
});

