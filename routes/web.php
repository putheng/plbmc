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
Route::get('/test', function(){
    
});

Route::group(['middleware' => 'auth', 'prefix' => 'checking', 'namespace' => 'Checking', 'as' => 'checking.'], function(){
    Route::get('/', 'CheckController@index')->name('index');
    
    Route::group(['as' => 'show.', 'prefix' => 'show'], function(){
        Route::get('/', 'CheckController@show')->name('index');

        Route::get('/date', 'CheckController@date')->name('date');
        Route::get('/date/on', 'CheckController@dateon')->name('on');
        
        Route::get('/dates/{office}', 'CheckController@officedate')->name('officedate');
        Route::get('/date/{office}/{status}', 'CheckController@officeStatus')->name('officeStatus');
        Route::get('/date/{status}', 'CheckController@status')->name('status');

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

Route::group(['middleware' => 'auth', 'prefix' => 'part', 'namespace' => 'Part', 'as' => 'part.'], function(){
    
    Route::get('/create', 'PartController@show')->name('create');
    Route::post('/create', 'PartController@store');
    Route::get('/{part}', 'PartController@index')->name('index');
    
});

Route::group(['middleware' => 'auth', 'prefix' => 'group', 'namespace' => 'Group', 'as' => 'group.'], function(){
    
    Route::get('create', 'CreateGroupController@show')->name('create');
    Route::post('create', 'CreateGroupController@store');
    
});

Route::group(['middleware' => 'auth', 'prefix' => 'officer', 'namespace' => 'Officer', 'as' => 'officer.'], function(){
    
    Route::get('/', 'OfficerController@group')->name('index');
    
    Route::group(['prefix' => 'data', 'as' => 'data.'], function(){
       Route::get('/', 'DataController@index')->name('index');
       Route::get('/print', 'DataController@prints')->name('print');
    });
    
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
    
    Route::group(['prefix' => 'admin'], function(){
        
        Route::get('/show', 'InsertOfficersController@show')->name('officer.show');
        
        Route::get('/insert', 'InsertOfficersController@index')->name('insert.insert');
        Route::post('/insert', 'InsertOfficersController@actions');
    });
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
