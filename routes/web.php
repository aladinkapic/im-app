<?php

use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::group(['namespace' => 'SystemCore\Login', 'prefix' => '/login'], function(){
    Route::get ('/',                                'LoginController@login')->name('login');
    Route::post('/log-me-in',                       'LoginController@loginMeIn')->name('login.log-me-in');
    Route::get ('/logout',                          'LoginController@logout')->name('login.logout');
});

// ------------------------------------------------------------------------------------------------------------------ //

Route::group(['namespace' => 'PublicPart', 'prefix' => '/'], function(){
    Route::get ('/',                                'HomeController@home')->name('public.home');
    Route::get ('/contact-us',                      'HomeController@contactUs')->name('public.contact-us');
});


Route::group(['namespace' => 'SystemCore\App', 'prefix' => '/', 'middleware' => 'loggedUser'], function(){

    Route::group(['namespace' => 'Dashboard', 'prefix' => '/dashboard'], function() {
        Route::get('/', 'DashboardController@index')->name('system-core.app.dashboard');
    });

    // **************************************************** BLOG ******************************************************//

    Route::group(['namespace' => 'Blog', 'prefix' => '/blog/'], function(){
        Route::get ('/',                                      'BlogController@index')->name('system.blog.index');

        Route::get ('/create-post',                           'BlogController@createPost')->name('system.blog.create-post');
        Route::post('/save-blog-image',                       'BlogController@saveBlogImage')->name('system.blog.save-blog-image');

        Route::post ('/save-post',                            'BlogController@savePost')->name('system.blog.save-post');
        Route::get ('/preview-post/{id}',                     'BlogController@previewPost')->name('system.blog.preview-post');
        Route::get ('/edit-post/{id}',                        'BlogController@editPost')->name('system.blog.edit-post');
        Route::post('/update-post',                           'BlogController@updatePost')->name('system.blog.update-post');
        Route::get('/delete-post/{id}',                       'BlogController@deletePost')->name('system.blog.delete-post');


        // ** Delete content ** //
        Route::get('/delete-header/{id}',                     'BlogController@deleteHeader')->name('system.blog.delete-header');
        Route::get('/delete-paragraph/{id}',                  'BlogController@deleteParagraph')->name('system.blog.delete-paragraph');
        Route::get('/delete-doubleImages/{id}',               'BlogController@deleteDoubleImages')->name('system.blog.delete-doubleImages');
        Route::get('/delete-slider/{id}',                     'BlogController@deleteSlider')->name('system.blog.delete-slider');

        // ** Edit content ** //
        Route::get('/edit-header/{id}',                       'BlogController@editHeader')->name('system.blog.edit-header');
        Route::get('/edit-paragraph/{id}',                    'BlogController@editParagraph')->name('system.blog.edit-paragraph');
        Route::get('/edit-doubleImages/{id}',                 'BlogController@editDoubleImages')->name('system.blog.edit-doubleImages');

        // ** Post header ** //
        Route::group(['prefix' => '/header/'], function(){
            Route::get ('/create/{id}',                        'BlogController@createHeader')->name('system.blog.header.create');
            Route::post('/save-header',                        'BlogController@saveHeader')->name('system.blog.header.save-header');
            Route::post('/update-header',                       'BlogController@updateHeader')->name('system.blog.header.update-header');

        });

        // ** Post paragraph ** //
        Route::group(['prefix' => '/paragraph/'], function(){
            Route::get ('/create/{id}',                       'BlogController@createParagraph')->name('system.blog.paragraph.create');
            Route::post('/save-paragraph',                    'BlogController@saveParagraph')->name('system.blog.paragraph.save-paragraph');
            Route::post('/update-paragraph',                  'BlogController@updateParagraph')->name('system.blog.header.update-paragraph');
        });

        // ** Post double images ** //
        Route::group(['prefix' => '/double-images/'], function(){
            Route::get ('/create/{id}',                       'BlogController@createDoubleImages')->name('system.blog.doubleImages.create');
            Route::post('/save-image-left',                   'BlogController@saveImageLeft')->name('system.blog.doubleImages.save-image-left');
            Route::post('/save-image-right',                  'BlogController@saveImageRight')->name('system.blog.doubleImages.save-image-right');
            Route::post('/save-images',                       'BlogController@saveDoubleImages')->name('system.blog.doubleImages.save-doubleImages');
            Route::post('/update-doubleImages',               'BlogController@updateDoubleImages')->name('system.blog.doubleImages.update-doubleImages');
        });

        // ** Post slider ** //
        Route::group(['prefix' => '/slider/'], function(){
            Route::get ('/create/{id}',                                  'BlogController@createSlider')->name('system.blog.slider.create');
            Route::post('/save-image',                                   'BlogController@saveImage')->name('system.blog.slider.save-image');
            Route::get ('/edit/{content}',                               'BlogController@editSlider')->name('system.blog.slider.edit-slider');
            Route::post('/update-image/',                                'BlogController@updateImage')->name('system.blog.slider.update-image');

            Route::get ('/delete-image/{id}',                            'BlogController@deleteSliderImage')->name('system.blog.slider.delete-slider-image');
            Route::get ('/delete-slider/{content}',                      'BlogController@deleteSlider')->name('system.blog.slider.delete-slider');
        });

        /*
         * Blog categories -- cannot use anymore keywords, since it requires an image for category
         * According to that, new option with image upload has to be created
         */

        Route::group(['prefix' => '/blog-categories/'], function(){
            Route::get ('/',                                             'BlogCategoriesController@index')->name('system.blog.categories.index');
            Route::post('/save-image',                                   'BlogCategoriesController@saveImage')->name('system.blog.categories.save-image');

            Route::get ('/create/',                                      'BlogCategoriesController@create')->name('system.blog.categories.create');
            Route::post('/save',                                         'BlogCategoriesController@save')->name('system.blog.categories.save');
            Route::get ('/edit/{id}',                                    'BlogCategoriesController@edit')->name('system.blog.categories.edit');
            Route::post('/update',                                       'BlogCategoriesController@update')->name('system.blog.categories.update');
            Route::get('/delete/{id}',                                   'BlogCategoriesController@delete')->name('system.blog.categories.delete');
        });
    });
});
