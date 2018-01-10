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

/*Route::get('product/{id}', function($id){
  $product = App\Products::find($id);
  echo "the name is " . $product->name . " ";
});
Route::post('login',function(Request $request){
  $admin = DB::table('admins')->find($request->email);
  if($admin)
  {
    if($admin->email == $request->email && $admin->password == $request->password)
    {
      return redirect('home');
    }
    else {
      echo "No Admins With this Information";
    }
  }
} );
*/
Route::group(['middleware' => ['admin']], function() {
  Route::get('adminhome','AdminController@show');
  Route::post('adminhome/add','AdminController@add');
  Route::get('adminhome/{user}/delete','AdminController@delete');
  Route::post('adminhome/update','AdminController@update');
  Route::post('adminhome/search','AdminController@search');
});
Auth::routes();
//Route::get('home', 'HomeController@index')->name('home');
Route::group(['middleware' => ['user']], function() {
Route::get('home/products','UsersController@show');
Route::get('home/products/{product}/delete','UsersController@delete');
Route::post('home/products/add','UsersController@add');
Route::get('home/products/{product}/edit','UsersController@edit');
Route::post('home/products/{product}/update','UsersController@update');
//Route::get('home/products/search','UsersController@search');
Route::any('home/products/searchResult','UsersController@search');
});
