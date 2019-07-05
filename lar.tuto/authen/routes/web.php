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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

/**
 * routes cho administrator
 */
route::prefix('admin')->group(function (){
    /*
     * gọi các nhóm route cho phần admim
     */
    /** url:authen.com/admin/
     * route mặc định của admin
     */
    route::get('/','admin controller@index')->name('admin.dashboard');


    /**
     * url:authen.com/admin/dashboard
     * route đăng nhaaph thành công
     */
    route::get('/dashboard','Admincontroller@index')->name('admin.dashboard');

    /**
     * url:authen.com/admin/register
     * route trả về view để đăng kí tài khoản
     */
    route::get('register','Admincontroller@create')->name('admin.register');


    /**
     * url:authen.com/admin/register
     * phương thức là post
     * route dùng để đăng kí 1 adm từ form post
     */
    route::post('register','Admincontroller@store')->name('admin.register.store');

    /**
     * URL:authen.com/admin/login
     * route trả về view đăng nhập admin
     */
    route::get('login','Auth\Admin\LoginController@login')->name('admin.auth.login');

    /**
     *
     * route xử lý quá trình đăng nhập admin
     */
    route::post('login','Auth\Admin\LoginController@loginAdmin')->name('admin.auth,loginAdmin');
    /**
     *url: authen.com/admin/logout
     * METHOD:POST
     * route dùng để đăng xuất
     */
    route::post('logout','Auth\Admin\LoginController@logout')->name('admin.auth.logout');
});
