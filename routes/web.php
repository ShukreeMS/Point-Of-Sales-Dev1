<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PurchaseDetailsController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SellingController;
use App\Http\Controllers\SellingDetailsController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\SpendingController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\UserController;

use App\Http\Controllers\Auth\RegisterController;

use App\Category;
use App\Mail\StockLowMail;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

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

//  Route::get('/', function () {
//      return view('welcome');
//  });

// Auth::routes();

Route::get('/', 'HomeController@index')->name('home');


// Authentication Routes...
Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('login', 'Auth\LoginController@login');
Route::post('logout', 'Auth\LoginController@logout')->name('logout');

// Registration Routes...
Route::get('register', 'Auth\RegisterController@showRegistrationForm')->name('register');
Route::post('register', 'Auth\RegisterController@register');

// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');

// Confirm Password (added in v6.2)
Route::get('password/confirm', 'Auth\ConfirmPasswordController@showConfirmForm')->name('password.confirm');
Route::post('password/confirm', 'Auth\ConfirmPasswordController@confirm');

// Email Verification Routes...
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('email/verify/{id}/{hash}', 'Auth\VerificationController@verify')->name('verification.verify'); // v6.x
/* Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify'); // v5.x */
Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');



/* Route::get('purchase/{id}/show', 'RegisterController@create');
Route::view('/register', 'register');
Route::get('/register', function () {
    return view('auth.register');
}); */


Route::group(['middleware' => ['web', 'usercheck:1']], function(){
	Route::get('category/data', 'CategoryController@listData')->name('category.data');
	Route::resource('category', 'CategoryController');

	Route::get('product/data', 'ProductController@listData')->name('product.data');
	Route::post('product/delete', 'ProductController@deleteSelected');
	Route::post('product/print', 'ProductController@printBarcode');
	Route::resource('product', 'ProductController');

	Route::get('supplier/data', 'SupplierController@listData')->name('supplier.data');
	Route::resource('supplier', 'SupplierController');

	Route::get('member/data', 'MemberController@listData')->name('member.data');
	Route::post('member/print', 'MemberController@printCard');
	Route::resource('member', 'MemberController');

	Route::get('spending/data', 'SpendingController@listData')->name('spending.data');
	Route::resource('spending', 'SpendingController');

	Route::get('user/data', 'UserController@listData')->name('user.data');
	Route::resource('user', 'UserController');

	Route::get('purchase/data', 'PurchaseController@listData')->name('purchase.data');
	Route::get('purchase/{id}/add', 'PurchaseController@create');
	Route::get('purchase/{id}/show', 'PurchaseController@show');
	Route::resource('purchase', 'PurchaseController');

	Route::get('purchase_details/{id}/data', 'PurchaseDetailsController@listData')->name('purchase_details.data');
	Route::get('purchase_details/loadform/{discount}/{total}', 'PurchaseDetailsController@loadForm');
	Route::resource('purchase_details', 'PurchaseDetailsController');


	Route::get('selling/data', 'SellingController@listData')->name('selling.data');
	Route::get('selling/{id}/show', 'SellingController@show');
	Route::resource('selling', 'SellingController');

	Route::get('report', 'ReportController@index')->name('report.index');
   Route::post('report', 'ReportController@refresh')->name('report.refresh');
   Route::get('report/data/{begin}/{end}', 'ReportController@listData')->name('report.data'); 
   Route::get('report/pdf/{begin}/{end}', 'ReportController@exportPDF');
   Route::resource('setting', 'SettingController');

	Route::view('/email', 'emails.lowstock');

	Route::get('product-report', 'ProductReportController@index')->name('productreport.index');
	Route::post('product-report', 'ProductReportController@filterdate')->name('productreport.data');
	Route::get('product-report/pdf/{begin}/{end}', 'ProductReportController@exportpdf');
	// Route::post('product-report/pdf/{search}', 'ProductReportController@exportpdf');


});

Route::group(['middleware' => 'web'], function(){
	Route::get('user/profile', 'UserController@show')->name('user.profile');
	Route::patch('user/{id}/change', 'UserController@changeProfile');

	Route::get('transaction/new', 'SellingDetailsController@newSession')->name('transaction.new');
   Route::get('transaction/{id}/data', 'SellingDetailsController@listData')->name('transaction.data');
   Route::get('transaction/printnote', 'SellingDetailsController@printNote')->name('transaction.print');
   Route::get('transaction/notepdf', 'SellingDetailsController@notePDF')->name('transaction.pdf');
   Route::post('transaction/save', 'SellingDetailsController@saveData');
   Route::get('transaction/loadform/{discount}/{total}/{received}', 'SellingDetailsController@loadForm');
   Route::resource('transaction', 'SellingDetailsController');
});