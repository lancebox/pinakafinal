<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

// Display View - Admin
	//Dashboard
route::get('/dashboard', function() {
	return Redirect::to('/dashboard/daily');
});
Route::get('/dashboard/daily', 'DashboardController@daily')->before('auth');
Route::get('/dashboard/weekly', 'DashboardController@weekly')->before('auth');
Route::get('/dashboard/monthly', 'DashboardController@monthly')->before('auth');
Route::get('/dashboard/stocks', 'DashboardController@stocks')->before('auth');
Route::get('/dashboard/shelflife', 'DashboardController@shelfLife')->before('auth');
Route::get('/dashboard/sample', 'DashboardController@index')->before('auth');
	//Users
Route::get('/users', 'UsersController@index')->before('auth');
Route::get('/users/{id}/edit', 'UsersController@edit')->before('auth');
	//Products
Route::get('/np/create', 'NPController@create')->before('auth');
Route::get('/np/{id}/edit', 'NPController@edit')->before('auth');

Route::get('/p/create', 'PController@create')->before('auth');
Route::get('/p/{id}/edit','PController@edit')->before('auth');
	//Sales
Route::get('/sales', 'SalesController@index')->before('auth');
Route::get('/returns', 'ReturnsController@index')->before('auth');
	//Suppliers
Route::get('/suppliers/{id}/edit','SuppliersController@edit')->before('auth');


// Display View - Cashier
Route::get('/cashier', 'CashierController@index')->before('auth');
Route::get('/home', 'HomeController@index')->before('auth');



// Display View - Admin & Cashier
Route::get('/suppliers','SuppliersController@index')->before('auth');
Route::get('/np', 'NPController@index')->before('auth');
Route::get('/p','PController@index')->before('auth');


// Display View - Login / Account settings
route::get('/', function() {
	return Redirect::to('/login');
});
Route::get('/login', 'SessionsController@showLogin');
Route::get('/logout', 'SessionsController@doLogout');
Route::post('login', 'SessionsController@doLogin');
Route::get('/settings', 'AccountSettingsController@settings')->before('auth');
Route::put('editAccount', 'AccountSettingsController@updateAccount');
Route::put('changePassword', 'AccountSettingsController@changePassword');

//Forgot Password 
Route::get('/password', 'RemindersController@getRemind');
Route::get('/password/sent', 'RemindersController@getRemindSent');
Route::get('/password/reset/{token}', 'RemindersController@getReset');
Route::post('postRemind', 'RemindersController@postRemind');
Route::post('postReset', 'RemindersController@postReset');



// Add 
Route::post('createUser', 'UsersController@store');
Route::post('createSupplier', 'SuppliersController@store');
Route::post('addNP', 'NPController@store');
Route::post('addP', 'PController@store');


// Edit
Route::resource('editUsers', 'UsersController');
Route::resource('editSuppliers', 'SuppliersController');
Route::resource('editNP', 'NPController');
Route::resource('editP', 'PController');
Route::resource('addDeductProduct', 'addDeductProductsController');
Route::resource('changeSaleStatus', 'SalesController');



//Search - Cashier
Route::group(array('prefix'=>'api'), function()
{
	Route::resource('airplanes', 'SearchController', array('only' => 'show'));
});

// CART
Route::post('/AddtoCart','CashierController@ACart');
Route::post('/RemoveItem', 'CashierController@remove');
Route::post('/void', 'CashierController@void');
Route::post('/pay','CashierController@pay');
Route::post('/EditItem','CashierController@edit');



Route::get('/nelson', function()
{
   $html = '<html><body>'
            . '<p>Put your html here, or generate it with your favourite '
            . 'templating system.</p>'
            . '</body></html>';
    return PDF::load($html, 'A4', 'portrait')->download('my_pdf');
});