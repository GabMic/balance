<?php

use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::group(['middleware' => 'language'], function () {

    Auth::routes();

    Route::get('/', 'HomeController')->name('home');

    Route::resource('tasks', 'TaskController');
    Route::resource('types', 'TypeController');
    Route::resource('budget', 'BudgetController');
    Route::resource('income', 'IncomeController');
    Route::resource('activities', 'ActivityController');
    Route::get('activity/today', 'ActivityController@today');
    Route::get('activity/this-month', 'ActivityController@thisMonth');
    Route::resource('information', 'InformationController');

    Route::view('/setup', 'setup')->middleware('auth');

    Route::get('/fetch-data-table', 'DataTableController@index');
    Route::get('/fetch-data-table-after-delete', 'DataTableController@fetchAfterDeletedType');

    Route::post('/language/{lang}', function (){DB::table('users')->where('id', Auth::id())->update(['locale' => request()->lang]);});

});

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index')->middleware('admin');
