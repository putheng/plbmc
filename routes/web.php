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

Route::group(['middleware' => 'auth', 'prefix' => 'checking', 'namespace' => 'Checking', 'as' => 'checking.'], function(){
    Route::get('/', 'CheckController@index')->name('index');
    
    Route::group(['as' => 'show.', 'prefix' => 'show'], function(){
        Route::get('/', 'CheckController@show')->name('index');
        
        Route::get('/group/{group}', 'CheckController@showGroup')->name('group');
        
        Route::get('/office/{office}', 'CheckController@showOffice')->name('office');
    });
    
    Route::get('/group/{group}', 'CheckController@group')->name('group');
    
    Route::get('/office/{office}', 'CheckController@offices')->name('offices');

    Route::post('/office/{office}', 'CheckController@store');
});

Route::group(['middleware' => 'auth', 'prefix' => 'offices', 'namespace' => 'Offices', 'as' => 'office.'], function(){
    
    Route::get('/create', 'CreateOfficeController@show')->name('create');
    Route::post('/create', 'CreateOfficeController@store');
    
});

Route::group(['middleware' => 'auth', 'prefix' => 'group', 'namespace' => 'Group', 'as' => 'group.'], function(){
    
    Route::get('create', 'CreateGroupController@show')->name('create');
    Route::post('create', 'CreateGroupController@store');
    
});

Route::group(['middleware' => 'auth', 'prefix' => 'officer', 'namespace' => 'Officer', 'as' => 'officer.'], function(){
    
    Route::get('/', 'OfficerController@group')->name('index');
    
    Route::get('/group/{group}', 'OfficerController@index')->name('group');
    
    Route::get('/officer/{officer}', 'OfficerController@show')->name('show');
    
    Route::get('/officer/{officer}/edit', 'OfficerController@edit')->name('edit');
    Route::post('/officer/{officer}/edit', 'OfficerController@store');
    
    Route::get('/officer/{officer}/level', 'OfficerController@level')->name('level');
    Route::post('/officer/{officer}/level', 'EditOfficerController@level');
    
    Route::get('/officer/{officer}/position', 'OfficerController@position')->name('position');
    Route::post('/officer/{officer}/position', 'EditOfficerController@position');
    
    
    Route::get('/office/{office}', 'OfficerController@office')->name('office');
    
    Route::get('/offices/{office}', 'CreateOfficerController@show')->name('create');
    Route::post('/offices/{office}', 'CreateOfficerController@store');
    
    Route::get('/offices', 'CreateOfficerController@offices')->name('offices');
    
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
