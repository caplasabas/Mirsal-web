<?php

use Illuminate\Support\Facades\Route;
use App\Events\OnRegister;
use Illuminate\Http\Request;
use App\Model\VetRequest;

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

Auth::routes(['register' => false, 'reset' => false]);
Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('language/{locale}', 'HomeController@language')->name('language');

Route::resource('hyper-payment','HyperPayPaymentController');

Route::middleware(['auth','csrf'])->group(function () {
    
    Route::namespace('Dashboard\Admin')->prefix('admins')->name('admins.')->group(function()
    {
        Route::resource('vet-requests','VetRequestController');
        Route::resource('vet-offers','VetOfferController');
        Route::resource('driver-requests','DriverRequestController');
        Route::resource('driver-offers','DriverOfferController');
        Route::resource('time-slots','TimeSlotController');
        Route::resource('animals','AnimalController');
        Route::resource('sizes','SizeController');
        Route::resource('durations','DurationController');
        Route::resource('cars','CarController');
        Route::resource('invoices','InvoiceController');
        Route::resource('products','ProductController');
        Route::put('products/accept/{product}', 'ProductController@accept')->name('products.accept');

        Route::resource('client-offers','ClientOfferController');

        Route::resource('admin-settings','AdminSettingController');
        Route::resource('veterinarians','UserVeterinarianController');
        Route::put('veterinarians/accept/{veterinarian}', 'UserVeterinarianController@accept')->name('veterinarians.accept');

        Route::resource('drivers','UserDriverController');
        Route::resource('clients','UserClientController');
    });

});

// Route::get('test', function(){
//     $vetRequests = VetRequest::leftJoin('VetOffer', '.id', '=', 'posts.user_id')->get();
//     $
// });
// Route::get('test', function(){
//     // $user = \App\User::find(28);
//     // event(new OnRegister($user));
//     $data=array();
//     $response = \App\Helpers\HyperPayCopyAndPay::request("42.20");
//     $data['response'] = $response;
//     // var_dump($data); exit;
//     return view('pages.test')->with(compact('data'));
// });

// Route::get('returnUrl', function(Request $request){
//     // $user = \App\User::find(28);
//     // event(new OnRegister($user));
//     // echo $request->payment_reference;exit;
//     $response = \App\Helpers\HyperPayCopyAndPay::paymentStatus($request->resourcePath);
    
//     return view('pages.returnUrl')->with(compact('response'));
// });
