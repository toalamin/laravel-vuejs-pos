<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'api', 'namespace' => 'App\Http\Controllers', 'prefix' => 'auth'], function ($router) {
    Route::post('signup', 'AuthController@signup');
    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');
});


Route::apiResource('/employee', 'App\Http\Controllers\Api\EmployeeController');
Route::apiResource('/supplier', 'App\Http\Controllers\Api\SupplierController');
Route::apiResource('/customer', 'App\Http\Controllers\Api\CustomerController');
Route::get('/customerList', 'App\Http\Controllers\Api\CustomerController@customerList');
Route::get('/suplist', 'App\Http\Controllers\Api\SupplierController@suplist');
Route::apiResource('/category', 'App\Http\Controllers\Api\CategoryController');
Route::get('catlist', 'App\Http\Controllers\Api\CategoryController@catlist');
Route::apiResource('/product', 'App\Http\Controllers\Api\ProductController');
Route::get('/productList', 'App\Http\Controllers\Api\ProductController@productList');
Route::Post('/stockUpdate/{id}', 'App\Http\Controllers\Api\ProductController@stockUpdate');
Route::apiResource('/expense', 'App\Http\Controllers\Api\ExpenseController');

//salary

Route::Post('/salary/paid/{id}', 'App\Http\Controllers\Api\SalaryController@Paid');
Route::Get('/salary', 'App\Http\Controllers\Api\SalaryController@AllSalary');
Route::Get('/salary/view/{id}/allEmployee', 'App\Http\Controllers\Api\SalaryController@ViewSalary');
Route::Get('/edit/salary/{id}', 'App\Http\Controllers\Api\SalaryController@EditSalary');
Route::Post('/salary/update/{id}', 'App\Http\Controllers\Api\SalaryController@SalaryUpdate');
Route::Post('/stock/update/{id}', 'App\Http\Controllers\Api\SalaryController@StockUpdate');



//cart product


Route::get('/getting/product/{id}', 'App\Http\Controllers\Api\PosController@GetProduct');

Route::get('/addTocart/{id}', 'App\Http\Controllers\Api\CartController@AddToCart');
Route::get('/cart/product', 'App\Http\Controllers\Api\CartController@CartProduct');
Route::get('/remove/cart/{id}', 'App\Http\Controllers\Api\CartController@removeCart');
Route::get('/increment/{id}', 'App\Http\Controllers\Api\CartController@Increment');
Route::get('/decrement/{id}', 'App\Http\Controllers\Api\CartController@Decrement');
Route::get('/vats', 'App\Http\Controllers\Api\CartController@Vats');

Route::post('/orderdone', 'App\Http\Controllers\Api\PosController@OrderDone');

Route::get('/orders', 'App\Http\Controllers\Api\OrderController@TodayOrder');
Route::get('/order/details/{id}', 'App\Http\Controllers\Api\OrderController@OrderDetails');
Route::get('/order/orderdetails/{id}', 'App\Http\Controllers\Api\OrderController@OrderDetailsAll');
Route::post('/search/order/', 'App\Http\Controllers\Api\OrderController@SearchOrderDate');
Route::post('/search/month/', 'App\Http\Controllers\Api\OrderController@SearchMonth');