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


/**************************************************************************

************************  Backend Routes  *********************************

***************************************************************************/

Route::group(['namespace' => 'Backend','prefix' => 'admin'], function() {


/*
************************  Slider Routes  *********************************
*/
 
Route::group(['prefix' => 'slider'], function () {

    /*

    * Slider Index

    */

    Route::get('/', [
        'as' => 'backend.slider.index',
        'uses' => 'SliderController@index'
    ]);

    /*

    * Short Slider 

    */

    Route::get('/update_sort', [
         'uses' => 'SliderController@update_sort',
         'as' => 'backend.slider.update_sort'
     ]);


    /*

    * Open Create New Slider Form  

    */

    Route::get('/create', [
         'uses' => 'SliderController@create',
         'as' => 'backend.slider.create'
     ]);


    /*

    * Add New Slider To Database

    */

     Route::post('/store', [
         'uses' => 'SliderController@store',
         'as' => 'backend.slider.store'
     ]);


    /*

    * Slider Open Edit Form

    */

    Route::get('/{slider_id}/edit', [
        'as' => 'backend.slider.edit',
        'uses' => 'SliderController@edit'
    ])->where('slider_id', '[0-9]+');


    /*

    * Update Slider In Database 

    */

    Route::put('/{slider_id}/update', [
               'uses' => 'SliderController@update',
               'as' => 'backend.slider.update'
    ])->where('slider_id', '[0-9]+');

    /*

    * Remove Slider From Database 

    */

    Route::get('/{slider_id}/delete', [
               'uses' => 'SliderController@destroy',
               'as' => 'backend.slider.destroy'
    ])->where('slider_id', '[0-9]+');


 	

    

});




/*
************************  Categorys Routes  *********************************
*/

 
Route::group(['prefix' => 'categorys'], function () {

    /*

    * Categorys Index

    */

    Route::get('/', [

        'uses' => 'CategorysController@index',
        'as' => 'backend.categorys.index'
        
    ]);


    /*

    * Sub Categorys Index

    */

    Route::get('/{categorys_id}/sub_category', [
               'uses' => 'CategorysController@sub_category',
               'as' => 'backend.categorys.sub_category'
     ])->where('categorys_id', '[0-9]+');


    /*

    * Update Categorys Order

    */

     Route::get('/update_sort', [
               'uses' => 'CategorysController@update_sort',
               'as' => 'backend.categorys.update_sort'
           ]);

 

    /*

    * Open Create New Categorys Form  

    */

    Route::get('/create', [
         'uses' => 'CategorysController@create',
         'as' => 'backend.categorys.create'
     ]);


    /*

    * Open Create New sub_Categorys Form  

    */

    Route::get('{categorys_id}/create', [
         'uses' => 'CategorysController@create_sub',
         'as' => 'backend.categorys.create_sub'
     ])->where('categorys_id', '[0-9]+');


    /*

    * Add New Categorys To Database

    */

     Route::post('/store', [
         'uses' => 'CategorysController@store',
         'as' => 'backend.categorys.store'
     ]);


    /*

    * Categorys Open Edit Form

    */

    Route::get('/{categorys_id}/edit', [

        'uses' => 'CategorysController@edit',
        'as' => 'backend.categorys.edit'
      
    ])->where('categorys_id', '[0-9]+');


    /*

    * Update Categorys In Database 

    */

    Route::put('/{categorys_id}/update', [
               'uses' => 'CategorysController@update',
               'as' => 'backend.categorys.update'
    ])->where('categorys_id', '[0-9]+');

    /*

    * Remove Categorys From Database 

    */

    Route::get('/{categorys_id}/delete', [
               'uses' => 'CategorysController@destroy',
               'as' => 'backend.categorys.destroy'
    ])->where('categorys_id', '[0-9]+');


    

    

});




/*
************************  Products Routes  *********************************
*/

 
Route::group(['prefix' => 'products'], function () {

    /*

    * Products Index

    */

    Route::get('/', [

        'uses' => 'ProductsController@index',
        'as' => 'backend.products.index'
        
    ]);


       /*

    * Open Create New Products Form  

    */

    Route::get('/create', [
         'uses' => 'ProductsController@create',
         'as' => 'backend.products.create'
     ]);


    /*

    * Add New Products To Database

    */

     Route::post('/store', [
         'uses' => 'ProductsController@store',
         'as' => 'backend.products.store'
     ]);


    /*

    * Products Open Edit Form

    */

    Route::get('/{products_id}/edit', [
        'uses' => 'ProductsController@edit',
        'as' => 'backend.products.edit',
    ])->where('products_id', '[0-9]+');


    /*

    * Update Products In Database 

    */

    Route::put('/{products_id}/update', [
               'uses' => 'ProductsController@update',
               'as' => 'backend.products.update'
    ])->where('products_id', '[0-9]+');

    /*

    * Remove Products From Database 

    */

    Route::get('/{products_id}/delete', [
               'uses' => 'ProductsController@destroy',
               'as' => 'backend.products.destroy'
    ])->where('products_id', '[0-9]+');



});






  
});