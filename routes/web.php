<?php

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

Route::get('/', function () {
    return view('index');
});
// Route::get('/login', function () {
//     return view('login');
// })->name('login');
Route::get('/faq', function () {
    return view('faq');
});
Route::get('/pricing', function () {
    return view('pricing');
});
Route::get('/privacy', function () {
    return view('privacy');
});
Route::get('/contact', function () {
    return view('contact');
});
Route::get('/careers', function () {
    return view('careers');
});
Route::get('/listings', function () {
    return view('listings');
});
Route::get('/listing', function () {
    return view('listing');
});


/** ADMIN GET **/
// Route::get('/admin', function () {
//     return view('admin.index');
// })->name('admin-index');
// Route::get('/admin/create/dealer', function () {
//     return view('admin.create-dealer');
// });
// Route::get('/admin/create/agent', function () {
//     return view('admin.create-agent');
// });
// Route::get('admin/create/admin', function () {
//     return view('admin.create-admin');
// });
// Route::get('/admin/create/listing', function () {
//     return view('admin.create-listing');
// });
// Route::get('/admin/create/brands', function () {
//     return view('admin.create-brands');
// });
// Route::get('/admin/create/categories', function () {
//     return view('admin.create-categories');
// });
// Route::get('/admin/create/billing', function () {
//     return view('admin.create-billing');
// });
// Route::get('/admin/agents', function () {
//     return view('admin.agents');
// });
// Route::get('/admin/dealers', function () {
//     return view('admin.dealers');
// });
// Route::get('/admin/listings', function () {
//     return view('admin.listings');
// });
// Route::get('/admin/brands', function () {
//     return view('admin.brands');
// });
// Route::get('/admin/categories', function () {
//     return view('admin.categories');
// });
// Route::get('/admin/billing', function () {
//     return view('admin.billing');
// });

// /** ADMIN POST */
// Route::post('post-login', 'UserController@login')->name('post-login');
// Route::post('create-admin', 'AdminController@store')->name('create-admin');
// Route::get('reset-password', 'UserController@resetPassword')->name('reset-password');
/*Route::post('create-agent', 'AuthController@postLogin');
Route::post('create-dealer', 'AuthController@postLogin');*/

