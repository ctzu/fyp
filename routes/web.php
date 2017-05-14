<?php

/**
 * Routing untuk root pages.
 */
Route::get('/', function () {
    return view('welcome');
});

/**
 * Routing untuk asas authentication dan pendaftaran.
 */
Auth::routes();

/**
 * Routing untuk Laman Utama.
 */
Route::get('home', 'HomeController@index');

/**
 * Routing untuk peranan pelajar.
 */
Route::group(['prefix' => 'pelajar', 'as' => 'pelajar.', 'namespace' => 'Student'], function () {
    // Urus Aktiviti
    Route::resource('aktiviti', 'ActivitiesController');
    //Urus Hebahan
    Route::resource('hebahan', 'AnnouncementsController');
    // Muat Turun Fail
    Route::get('fail/{id}/muat-turun', 'FilesController@download')->name('fail.download');
    // Delete Fail
    Route::delete('fail/{id}', 'FilesController@destroy')->name('fail.destroy');
});

/**
 * Routing untuk peranan pensyarah.
 */
Route::group(['prefix' => 'pensyarah', 'as' => 'pensyarah.', 'namespace' => 'Lecturer'], function () {
    // Urus Aktiviti
    Route::resource('aktiviti', 'ActivitiesController');
    //Urus Papar Merit
    Route::get('aktiviti/{aktiviti}/papar', 'ActivitiesController@papar')->name('papar');
    //Urus Hebahan
    Route::resource('hebahan', 'AnnouncementsController');
    // Muat Turun Fail
    Route::get('fail/{id}/muat-turun', 'FilesController@download')->name('fail.download');
});

/**
 * Routing untuk peranan pentadbir.
 */
Route::group(['prefix' => 'pentadbir', 'as' => 'pentadbir.', 'namespace' => 'Administrator'], function () {
    // Urus Pelajar
    Route::resource('pelajar', 'StudentsController');
    // Urus Pensyarah
    Route::resource('pensyarah', 'LecturersController');
    // Urus Pentadbir
    Route::resource('tadbir', 'AdministratorsController');
    // Urus Kelab
    Route::resource('kelab', 'ClubsController');
});
