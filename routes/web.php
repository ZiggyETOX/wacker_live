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
	return view('home/home');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
 
	// Route::get('/home', 'PlantController@index')->name('home');
	Route::resource('plants', 'PlantController');
	Route::resource('clients', 'ClientController');
	Route::resource('invoices', 'InvoiceController');
	Route::resource('transactions', 'TransactionController');
	// Route::get('plants/{$plant}/harvest', 'PlantController@harvestCreate');
	Route::get('/plants/{plant}/harvest', 'PlantController@harvestCreate');
	Route::put('/plants/{plant}/store', 'PlantController@harvestStore');
	// Route::post('/client/{clientName}', 'HomeController@date_change');
	Route::get('/clients/{client}/create-invoice', 'ClientController@create_invoice');
	Route::get('/invoices/{invoice}/add-transaction', 'InvoiceController@create_transaction');
	Route::get('/test', 'HomeController@test');
	Route::get('/subscribe', 'HomeController@subscribe');

	Route::get('/home', 'HomeController@index')->name('home');

});