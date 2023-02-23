<?php

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

    Route::get('/rationale', function (){
        return view('site.rationale');
    })->name('rationale');

    Route::get('/who-we-are', function (){
        return view('site.who-we-are');
    })->name('who-we-are');

    Route::get('/faq', function (){
        return view('site.faq');
    })->name('faq');

    Route::get('/work-ethics', function (){
        return view('site.work-ethics');
    })->name('work-ethics');

    Route::get('/constitution', function (){
        return view('site.constitution');
    })->name('constitution');

    Route::get('/founders', function (){
        return view('site.founders');
    })->name('founders');

    Route::get('/directors', function (){
        return view('site.directors');
    })->name('directors');

    Route::get('/team', function (){
        return view('site.team');
    })->name('team');

    Route::get('/projects', function (){
        return view('site.projects.project');
    })->name('projects');

    Route::get('/project-details', function (){
        return view('site.projects.project-details');
    })->name('project-details');


    Route::get('/news', function (){
        return view('site.news.new');
    })->name('news');

    Route::get('/new-details', function (){
        return view('site.news.new-details');
    })->name('new-details');


    Route::get('/advertisements', function (){
        return view('site.publications.advertisements');
    })->name('advertisements');

    Route::get('/advertisement-details', function (){
        return view('site.publications.advertisements-details');
    })->name('advertisement-details');


    Route::get('/reports', function (){
        return view('site.reports.report');
    })->name('reports');


    Route::get('/report-details', function (){
        return view('site.reports.report-details');
    })->name('report-details');


    Route::get('/our-photos', function (){
        return view('site.photos.our-photos');
    })->name('our-photos');


    Route::get('/photo-details', function (){
        return view('site.photos.photo-details');
    })->name('photo-details');

    Route::get('/videos', function (){
        return view('site.videos');
    })->name('videos');

    Route::get('/contact', function (){
        return view('site.contact');
    })->name('contact');


});

