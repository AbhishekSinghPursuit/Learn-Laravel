<?php

use Illuminate\Support\Facades\Route;

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


// WITHOUT CONTROLLER 

// Route::get('/', function () {
//     // return view('welcome');
//     return view('home');
// });

// Route::get('/about', function () {
//     return view('about');
// });

// Route::get('/test/{name}/{id?}', function ($name, $id=null){ // here id is optional
//     // echo "Hello Engineers...";
//     // echo "Hello... ".$name." ".$id; // display parameters on the url /test/

//     $html_string = "<h1>HTML</h1>";
//     $data = compact('name', 'id', 'html_string'); // compact parameters in data
//     return view('test')->with($data);  // send data to test blade template
// });

// Route::post('/demo', function (){
//     echo "Testing the routes for post";
// });

// Route::any('/any', function(){
//     echo "Testing the route using any";
// });

// Route::put('user/{id}', function (){

// });



// WITH CONTROLLER

use App\Http\Controllers\DemoController;
use App\Http\Controllers\SingleActionController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\CustomerController;
use App\Models\Customer;

// route for calling index function of DemoController class on / url
Route::get('/', [DemoController::class, 'index']); // one way for calling specific function
Route::get('/about', 'App\Http\Controllers\DemoController@about');

// calling SingleActionController - it calls only particular function __invoke() by default
Route::get('/courses', SingleActionController::class);

// Resource controller provde some predefine function like index, edit, show, store, destroy
Route::resource('/photo', PhotoController::class);

// Registration controller
Route::get('/register', [RegistrationController::class, 'index']);
Route::post('/register', [RegistrationController::class, 'register']);

// customer model route (ORM)
// Route::get('/customer', function(){
//     $customers = Customer::all();
//     echo "<pre>";
//     print_r($customers);
// });

// Create customer form and add customer data using form
Route::get('/customer', [CustomerController::class, 'index'])->name('customer.create'); // named routing
Route::post('/customer', [CustomerController::class, 'store']);
Route::get('/customer/view', [CustomerController::class, 'view']);
Route::get('/customer/destroy/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');
Route::get('/customer/edit/{id}', [CustomerController::class, 'edit'])->name('customer.edit');
Route::post('/customer/update/{id}', [CustomerController::class, 'update'])->name('customer.update');
