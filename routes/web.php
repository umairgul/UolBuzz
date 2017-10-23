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


Route::get('/', 'NoticeController@index');

Auth::routes();

//Route::resource('dashboard', 'HomeController');

//faculty routes
Route::group(['prefix' => 'faculty'],function(){
    Route::get('/','FacultyController@index')->name('faculty.index');

    Route::get('/{id}','FacultyController@show')->name('faculty.show');

});

//files routes
// Route::group(['prefix' => 'facultyfiles'],function (){
//     Route::get('/','FileController@index')->name('files.index');
//     Route::get('{id}','FileController@show')->name('files.show');
//     Route::get('download/{id}','FileController@download')->name('files.download');
// });


//department routes
Route::group(['prefix' => 'departments'],function (){
    Route::get('/','DepartmentController@index')->name('departments.index');
    Route::get('{id}','DepartmentController@show')->name('departments.show');
});
//Route::resource('faculty', 'FacultyController');

//Route::resource('profile', 'ProfileController');

//Route::resource('departments', 'DepartmentController');

//Route::get('/home',function (){
//   return redirect()->route('dashboard.index');
//});


//dashboard routes
Route::group(['middleware' => 'auth', 'prefix' => 'dashboard'],function (){

    // get routes
    Route::get('/', 'DashboardController@index')->name('dashboard.index');
    Route::get('add', 'DashboardController@addNotice')->name('dashboard.add');
    Route::get('{id}/edit', 'DashboardController@editNotice')->name('dashboard.edit');
    Route::get('{id}', 'DashboardController@showNotice')->name('dashboard.show');

    // post routes
    Route::post('add', 'DashboardController@storeNotice')->name('dashboard.store');
//    Route::post('{id}','HomeController@updateNotice')->name('dashboard.update');
    Route::delete('{id}', 'DashboardController@deleteNotice')->name('dashboard.delete');
    Route::put('{id}','DashboardController@updateNotice')->name('dashboard.update');

//    Route::get('/profile/{id}','r@showProfileForm')->name('dashboard.profile');
//
//    Route::put('/profile/{id}','PasswordController@updateProfile')->name('dashboard.updateprofile');

    //file handling
    // Route::post('/uplodFile','DashboardController@uploadFile')->name('dashboard.uploadfile');
    // Route::get('{id}/myfiles','DashboardController@myFiles')->name('dashboard.myfiles');
    // Route::delete('{fileid}','DashboardController@deleteFile')->name('dashboard.deleteFile');
});

Route::group(['middleware' => 'auth',],function (){
  Route::get('change-password','Auth\ChangePasswordController@index')->name('changepass.index');

  Route::post('change-password','Auth\ChangePasswordController@updatePassword')->name('changepass.change');
});

// Route::get('/admin','AdminController@index');
//Route::get('dashboard/addnotice','HomeController@addNoticeFrom');

//Route::post('dashboard/addnotice','HomeController@addNotice')->middleware('auth');

//Route::get('/dashboard/postnotice','HomeController@showPostNoticeForm');
