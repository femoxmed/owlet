<?php

use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Guest only routes
Route::group(['middleware' => ['auth-opt:api']], function () {

    Route::post('register-dealer', 'Api\DealerController@registerDealer');

    Route::post('register-agent', 'Api\AgentController@registerAgent');

    Route::post('login', 'Api\LoginController@login');

    Route::post('password/email', 'Api\ForgotPasswordController@sendResetLinkEmail');

    // Route::post('password/reset', 'Api\ResetPasswordController@reset')->name('api.reset.password');
    Route::post('password/reset', 'Api\ResetPasswordController@reset')->name('password.reset');

    Route::get('email/resend', 'Api\VerificationController@resend')->name('verification.resend');

    Route::get('email/verify/{id}/{hash}', 'Api\VerificationController@verify')->name('verification.verify');

    Route::get('getm', 'Api\UserController@getMorphed');

    //dealers
    Route::get('dealers', 'Api\DealerController@index');

    Route::get('adverts', 'Api\AdvertController@index');
    
    Route::get('search-adverts', 'Api\AdvertController@searchAdverts');

    Route::get('adverts/{advert}', 'Api\AdvertController@show');

    Route::get('recent-adverts', 'Api\AdvertController@recentAdverts');

    //categories
    Route::get('categories', 'Api\CategoryController@index');
    //conditions
    Route::get('conditions', 'Api\ConditionController@index');
    //brand
    Route::get('brands', 'Api\BrandController@index');
    //brandmodel
    Route::get('brandmodels', 'Api\BrandModelController@index');

    Route::get('dealer-adverts', 'Api\AdvertController@adverts');

    //subscription
    Route::post('/create-plan', 'Api\SubscriptionTypeController@createPlan');
    Route::get('/subscriptions', 'Api\SubscriptionController@index');
    Route::get('/pending-subscribed-users', 'Api\AlumniController@getPendingSubscribedUsers');
    Route::get('/plans', 'Api\SubscriptionTypeController@listPlans');
 
   
});

// Authenticated users routes
Route::group(['middleware' => ['auth:api']], function () {
    Route::post('create-advert', 'Api\AdvertController@DealerUploadProduct');
    Route::put('adverts/{advert}', 'Api\AdvertController@update');
    Route::get('me', 'Api\LoginController@me');
    Route::post('rate-user', 'Api\RatingController@store');
    Route::post('update-dealer', 'Api\DealerController@updateDealer');
    
    //subscribe
    Route::get('/transactions', 'Api\TransactionController@index');
    Route::post('/subscribe', 'Api\SubscriptionController@process');
});


