<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;



Route::group(['middleware' => 'language'], function () {

    Route::get('/', 'HomeController@index')->name('home');

    Route::resource('types', 'TypeController');

    Route::resource('activities', 'ActivityController');
    Route::resource('information', 'InformationController');
    Route::resource('budget', 'BudgetController');
    Route::resource('tasks', 'TaskController');

    Route::get('/test', 'ChartDataController@today');

    Auth::routes();

    Route::post('/language/{lang}', function (){
        DB::table('users')
            ->where('id', auth()->user()->id)
            ->update(['locale' => request()->lang]);

    });

});

Route::post('download/{photo}', function (){
    dd(request('photo'));
});
