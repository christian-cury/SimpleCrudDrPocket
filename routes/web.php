<?php


Auth::routes();

Route::get('/', 'SiteController@home')->name('home');

Route::resource('/dvd', 'DVDResource')->names([
    'index' => 'dvd.index',
    'create' => 'dvd.create',
    'store' => 'dvd.store'
]);