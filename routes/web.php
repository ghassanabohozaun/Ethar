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

    Route::get('/', function (){
        return view('site.index');
    })->name('index');


    Route::get('/rationale', function (){
        return view('site.rationale');
    })->name('rationale');

    Route::get('/what-we-do', function (){
        return view('site.what-we-do');
    })->name('what-we-do');

    Route::get('/faq', function (){
        return view('site.faq');
    })->name('faq');

    Route::get('/mission', function (){
        return view('site.mission');
    })->name('mission');

    Route::get('/construction', function (){
        return view('site.construction');
    })->name('construction');

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

});

