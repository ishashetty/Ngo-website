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
//     return view('in');
// });
 //Route::group(['prefix'=>'eshopper'], function() {
 Route::get('/','ShopController@returnitems' );//returning items for first page display
//  Route::get('/')
Route::get('/product-details/{id}', 'ProductDetails@show');//review and show
Route::get('/search','ShopController@search' );//search functionality

//  Route::get('/review/{id}','ProductDetails@add_review' );
 Route::post('/review/{id}','ReviewController@add_review');
 Route::post('/addToCart/{id}','ProductDetailsController@addToCart' );
 Route::get('/login','LoginController@index' );
 Route::get('/checkout','CheckoutController@index' );
 Route::get('/cart','CartController@index' );
 Route::get('/cart/destroy/{id}','CartController@destroy' );
 Route::get('/checkout','CheckoutController@index' );
 Route::post('/checkout/update','CheckoutController@update' );
 Route::get('/send','MailController@send' );
 Route::get('/contact-us','ContactUsController@add');
 Route::get('/contactus','ContactUsController@index');
Route::post('/contactus', [
    'as' => 'contactus.post',
    'uses' => 'ContactUsController@index'
     ]);
 Route::get('/orders','OrderController@orders' );
 Route::get('/orderdescription/{name}','OrderController@ordersdesc' );

 Route::get('/tp', function () {//trial page
    return view('index_productdisplay');
});
 Route::get('/shop/{name}','ShopController@return_category' );
 Route::get('/shop/{name}/{range}', 'ShopController@range');//review and show

 Route::get("/review", function()
{
   return View::make("review");
});
 Route::get('auth/google', 'Auth\LoginController@redirectToProvider');
 Route::get('auth/google/callback', 'LoginController1@handleProviderCallback');
 Route::get('/logout','SessionController@logout' );
