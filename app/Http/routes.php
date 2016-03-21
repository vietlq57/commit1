<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    Route::get('/', function(){
        return view('index');
    });

    Route::get('/showgroup', 'GroupController@index');

    Route::get('/foods/{id}', 'FoodsController@show');
    Route::get('/create', 'FoodsController@create');

    Route::post('foods/added', 'FoodsController@store');
    Route::get('/delete/{id}', 'FoodsController@destroy');

    Route::get('/edit/{id}', 'FoodsController@edit');
    Route::post('/update/{id}', 'FoodsController@update');

    /*Route::get('/foods/searchredirect', function(){

        $search = urlencode(\Illuminate\Support\Facades\Input::get('search'));
        $route = '/foods/search/$search';
        return redirect($route);

    });



    Route::get('/foods/search/{search}', 'FoodsController@search');*/

    //Route::resource('/foods', 'FoodsController');
    //Route::get('/foods/search/{id}', 'FoodsController@search');

    Route::get('/nutrient/{id}', 'NutrientController@show');
});
