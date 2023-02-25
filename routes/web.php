<?php

use App\Http\Controllers\Site\ProjectController;
use App\Http\Controllers\Site\PublicationController;
use App\Http\Controllers\Site\SiteController;
use Illuminate\Support\Facades\Route;


Route::group(
    [
        'namespace' => 'Site',
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
    ], function () {


    ////////////////////////////////////////////////////////////
    /// any
    Route::get('', function () {
        return view('site.index');
    })->where(['any' => '.*']);

    Route::get('/', 'SiteController@index')->name('index');

    Route::get('About/{name}', [SiteController::class, 'about'])->name('about');


    Route::get('/faq', [SiteController::class, 'qa'])->name('faq');


    Route::get('/founders', function () {
        return view('site.founders');
    })->name('founders');

    Route::get('/directors', function () {
        return view('site.directors');
    })->name('directors');

    Route::get('/team', function () {
        return view('site.team');
    })->name('team');

    Route::get('/projects/{type}', [ProjectController::class, 'getProjects'])->name('projects');

    Route::get('/project-details/{title}', [ProjectController::class, 'detailProject'])->name('project-details');


    Route::get('/news', function () {
        return view('site.news.new');
    })->name('news');

    Route::get('/new-details', function () {
        return view('site.news.new-details');
    })->name('new-details');


<<<<<<< HEAD
    Route::get('/publications/{type}',[PublicationController::class , 'getPublications'])->name('advertisements');
    Route::get('/publication-details/{title}', [PublicationController::class , 'detailPublication'])->name('advertisement-details');
=======
    Route::get('/advertisements', function () {
        return view('site.publications.advertisements');
    })->name('advertisements');

    Route::get('/advertisement-details', function () {
        return view('site.publications.advertisements-details');
    })->name('advertisement-details');
>>>>>>> 0f42064573e273c9ad39c0b0326304b1645b9665


    // reports
    Route::get('/reports', 'ReportsController@index')->name('reports');
    Route::get('/report-details/{year?}', 'ReportsController@details')->name('report-details');





    Route::get('/our-photos', function () {
        return view('site.photos.our-photos');
    })->name('our-photos');


    Route::get('/photo-details', function () {
        return view('site.photos.photo-details');
    })->name('photo-details');

    Route::get('/videos', function () {
        return view('site.videos');
    })->name('videos');

    Route::get('/contact', function () {
        return view('site.contact');
    })->name('contact');


});

