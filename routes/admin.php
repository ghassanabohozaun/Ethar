<?php


use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
////////////////////////////////////////////////////////////////////////
/// auth  => that mean : must be admin and login
///

Route::group([
    'namespace' => 'Admin',
    'middleware' => ['auth:admin', 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath']
], function () {

    //////////////////////////////////////////////////////////////////
    /// not found page
    Route::get('/notFound', 'DashboardController@notFound')->name('admin.not.found');

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// dashboard
    Route::get('/', 'DashboardController@index')->name('admin.dashboard')->middleware('can:dashboard');
    Route::get('/dashboard', 'DashboardController@index')->name('admin.dashboard')->middleware('can:dashboard');


    /////////////////////////////////////////////////////////////////////////////////////////////
    /// settings
    Route::get('settings', 'DashboardController@getSettings')
        ->name('get.admin.settings')->middleware('can:settings');
    Route::post('settings', 'DashboardController@storeSettings')
        ->name('store.admin.settings')->middleware('can:settings');
    Route::post('switch-en-lang', 'DashboardController@switchEnglishLang')
        ->name('switch.english.lang');
    Route::post('switch-frontend-lang', 'DashboardController@switchFrontendLang')
        ->name('switch.frontend.lang');

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Notifications Routes
//    Route::group(['prefix' => 'notifications', 'middleware' => 'can:notifications'], function () {
//        Route::get('/', 'NotificationsController@index')->name('admin.notifications');
//        Route::get('/get-notifications', 'NotificationsController@getNotificationsResource')
//            ->name('get.admin.notifications.resource');
//
//        Route::get('/get/admin/notifications', 'NotificationsController@getNotifications')
//            ->name('admin.get.notifications');
//        Route::get('/get/one/admin/notification', 'NotificationsController@getOneNotification')
//            ->name('admin.get.one.notification');
//        Route::post('/admin/notification/make/read', 'NotificationsController@makeRead')
//            ->name('admin.notification.make.read');
//    });
    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Revenues Routes
    Route::group(['prefix' => 'Revenues', 'middleware' => 'can:revenues'], function () {
        Route::get('/', 'RevenuesController@index')->name('admin.revenues');
        Route::get('/get-revenues', 'RevenuesController@getRevenues')->name('admin.get.revenues');
    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Landing Page Routes
    Route::group(['prefix' => 'landing-page', 'middleware' => 'can:landing-page'], function () {

        /////////////////////////////////////////////////////////////////////////////////////////////
        /// Sliders routes
        Route::group(['prefix' => 'sliders'], function () {
            Route::get('/', 'SlidersController@index')->name('admin.sliders');
            Route::get('/get-sliders', 'SlidersController@getSliders')->name('get.admin.sliders');
            Route::get('/create', 'SlidersController@create')->name('admin.sliders.create');
            Route::post('/store', 'SlidersController@store')->name('admin.slider.store');
            Route::post('/destroy', 'SlidersController@destroy')->name('admin.slider.destroy');
            Route::get('/edit/{id?}', 'SlidersController@edit')->name('admin.slider.edit');
            Route::post('/update', 'SlidersController@update')->name('admin.slider.update');
            Route::post('/change-status', 'SlidersController@changeStatus')->name('admin.slider.change.status');

        });

//
//        Route::get('/about-mawhob', 'LandingPageController@aboutMawob')->name('admin.about.mawhob');
//        Route::post('/about-mawhob', 'LandingPageController@storeAboutMawob')->name('admin.about.mawhob');
//
//        Route::get('/index-page', 'LandingPageController@indexPage')->name('admin.index.page');
//        Route::post('/index-page', 'LandingPageController@storeIndexPage')->name('admin.index.page');
//
//        Route::get('/why-choose-us', 'LandingPageController@whyChooseUs')->name('admin.why.choose.us');
//        Route::post('/why-choose-us', 'LandingPageController@storeWhyChooseUs')->name('admin.why.choose.us');
//
//
//        Route::get('/static-strings', 'LandingPageController@staticStrings')->name('admin.static.strings');
//        Route::post('/static-strings', 'LandingPageController@storeStaticStrings')->name('admin.static.strings');

//
//        Route::group(['prefix' => 'team'], function () {
//            Route::get('/', 'LandingPageController@team')->name('admin.team');
//            Route::get('/get-team', 'LandingPageController@getTeam')->name('get.admin.team');
//            Route::post('store', 'LandingPageController@storeTeam')->name('admin.store.team');
//            Route::post('destroy', 'LandingPageController@destroyTeam')->name('admin.destroy.team');
//        });


    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// admin routes
    Route::get('/admin', 'AdminsController@index')->name('get.admin')->middleware('can:admins');
    Route::get('/get-admin-by-id', 'AdminsController@getAdminById')->name('get.admin.by.id');
    Route::post('/admin-update', 'AdminsController@adminUpdate')->name('admin.update');

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Support Center Route
    Route::group(['prefix' => 'support-center', 'middleware' => 'can:support-center'], function () {
        Route::get('/', 'SupportCenterController@index')
            ->name('admin.support.center');
        Route::get('/get-support-center', 'SupportCenterController@getSupportCenter')
            ->name('get.admin.support.center');
        Route::get('/create', 'SupportCenterController@create')
            ->name('admin.support.center.create');
        Route::post('/send', 'SupportCenterController@send')
            ->name('admin.support.center.send');

        Route::post('/destroy', 'SupportCenterController@destroy')
            ->name('admin.support.center.message.destroy');

        Route::post('/change-status', 'SupportCenterController@changeStatus')
            ->name('admin.support.center.change.status');

        Route::get('/get-one-message', 'SupportCenterController@getOneMessage')
            ->name('admin.support.center.get.one.message');

    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// users Routes
    Route::group(['prefix' => 'users', 'middleware' => 'can:users'], function () {
        Route::get('/', 'UserController@index')->name('users');
        Route::get('/get-users', 'UserController@getUsers')->name('get.users');
        Route::post('/destroy', 'UserController@destroy')->name('user.destroy');
        Route::post('/change-status', 'UserController@changeStatus')->name('user.change.status');
        Route::get('/create', 'UserController@create')->name('user.create');
        Route::post('store', 'UserController@store')->name('user.store');
        Route::get('/edit/{id?}', 'UserController@edit')->name('user.edit');
        Route::post('update', 'UserController@update')->name('user.update');
        Route::get('/trashed-user', 'UserController@trashedUser')->name('users.trashed');
        Route::get('/get-trashed-users', 'UserController@getTrashedUsers')->name('get.trashed.users');
        Route::post('/force-delete', 'UserController@forceDelete')->name('user.force.delete');
        Route::post('/restore', 'UserController@restore')->name('user.restore');
    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Roles Routes
    Route::group(['prefix' => 'roles', 'middleware' => 'can:roles'], function () {
        Route::get('/', 'RolesController@index')->name('admin.roles');
        Route::get('/get-roles', 'RolesController@getRoles')->name('get.admin.roles');
        Route::get('/create', 'RolesController@create')->name('admin.role.create');
        Route::post('/store', 'RolesController@store')->name('admin.role.store');
        Route::post('/destroy', 'RolesController@destroy')->name('admin.role.destroy');
        Route::get('/edit/{id?}', 'RolesController@edit')->name('admin.role.edit');
        Route::post('/update', 'RolesController@update')->name('admin.role.update');
    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Articles  Routes
    Route::group(['prefix' => 'articles', 'middleware' => 'can:articles'], function () {
        Route::get('/', 'ArticlesController@index')->name('admin.articles');
        Route::get('/get-articles', 'ArticlesController@getArticles')->name('admin.get.articles');
        Route::post('/destroy', 'ArticlesController@destroy')->name('admin.articles.destroy');
        Route::post('/change-status', 'ArticlesController@changeStatus')->name('admin.articles.change.status');
        Route::get('/create', 'ArticlesController@create')->name('admin.articles.create');
        Route::post('/store', 'ArticlesController@store')->name('admin.articles.store');
        Route::get('/edit/{id?}', 'ArticlesController@edit')->name('admin.articles.edit');
        Route::post('/update', 'ArticlesController@update')->name('admin.articles.update');
        Route::get('/trashed-articles', 'ArticlesController@trashedArticles')->name('admin.articles.trashed');
        Route::post('/force-delete', 'ArticlesController@forceDelete')->name('admin.articles.force.delete');
        Route::post('/restore', 'ArticlesController@restore')->name('admin.articles.restore');
    });

    /////////////////////////////////////////////////////////////////////////////////////////////
    /// Projects Routes
    Route::group(['prefix' => 'projects', 'middleware' => 'can:projects'], function () {
        Route::get('/', 'ProjectsController@index')->name('admin.projects');
        Route::get('/get-projects', 'ProjectsController@getArticles')->name('admin.get.projects');
        Route::post('/destroy', 'ProjectsController@destroy')->name('admin.projects.destroy');
        Route::post('/change-status', 'ProjectsController@changeStatus')->name('admin.projects.change.status');
        Route::get('/create', 'ProjectsController@create')->name('admin.projects.create');
        Route::post('/store', 'ProjectsController@store')->name('admin.projects.store');
        Route::get('/edit/{id?}', 'ProjectsController@edit')->name('admin.projects.edit');
        Route::post('/update', 'ProjectsController@update')->name('admin.projects.update');
        Route::get('/trashed-projects', 'ProjectsController@trashedArticles')->name('admin.projects.trashed');
        Route::post('/force-delete', 'ProjectsController@forceDelete')->name('admin.projects.force.delete');
        Route::post('/restore', 'ProjectsController@restore')->name('admin.projects.restore');
    });

    //Route::resource('project', ProjectsController::class );

});

/////////////////////////////////////////////////////////////////////////////////////////////
/// Guest => that mean:must not be admin => because any one must be able to access login page
Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin'], function () {
    Route::get('login', 'LoginController@getLogin')->name('get.admin.login');
    Route::post('login', 'LoginController@doLogin')->name('admin.login');
    Route::get('/login2', function () {
        return view('admin.auth.login2');
    });
});
/////////////////////////////////////////////////////////////////////////////////////////////
/// Logout
Route::get('logout', 'Admin\LoginController@logout')->name('admin.logout');



