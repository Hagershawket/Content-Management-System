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

/*Route::get('/', function () {
    return view('welcome');
});*/

//Auth::routes();
Auth::routes(['verify' => true]);


Route::get('/', 'HomeController@index')->name('home');

route::group(['middleware' => 'auth'], function(){

    //route for Posts
    Route::get('/post/create', 'PostController@create')->name('postcreate');
    Route::get('/post/show', 'PostController@index')->name('showpost');
    Route::post('/post/store/{id}', 'PostController@store')->name('poststore');
    Route::get('/post/delete/{id}', 'PostController@destroy')->name('postdelete');
    Route::get('/post/trashed', 'PostController@trashed')->name('posttrashed');
    Route::get('/post/harddelete/{id}', 'PostController@harddelete')->name('postharddelete');
    Route::get('/post/restore/{id}', 'PostController@restore')->name('postrestore');
    Route::get('/post/edit/{id}', 'PostController@edit')->name('postedit');
    Route::post('/post/update/{id}', 'PostController@update')->name('postupdate');


    //route for Category
    Route::get('/Category/create', 'CategoryController@create')->name('categorycreate');
    Route::post('/Category/store', 'CategoryController@store')->name('categorystore');
    Route::get('/Category/show', 'CategoryController@index')->name('showcategory');
    Route::get('/Category/edit/{id}', 'CategoryController@edit')->name('categoryedit');
    Route::post('/Category/update/{id}', 'CategoryController@update')->name('categoryupdate');
    Route::get('/Category/delete/{id}', 'CategoryController@destroy')->name('categorydelete');

    //route for Tag
    Route::get('/tag/create', 'TagController@create')->name('tagcreate');
    Route::post('/tag/store', 'TagController@store')->name('tagstore');
    Route::get('/tag/show', 'TagController@index')->name('tagshow');
    Route::get('/tag/edit/{id}', 'TagController@edit')->name('tagedit');
    Route::post('/tag/update/{id}', 'TagController@update')->name('tagupdate');
    Route::get('/tag/delete/{id}', 'TagController@destroy')->name('tagdelete');

    //route for user
    Route::get('/user/create', 'UsersController@create')->name('usercreate');
    Route::post('/user/store', 'UsersController@store')->name('userstore');
    Route::get('/user/show', 'UsersController@index')->name('usershow');
    Route::get('/user/show/admin{id}', 'UsersController@admin')->name('useradmin');
    Route::get('/user/show/notadmin{id}', 'UsersController@notAdmin')->name('usernotAdmin');


    //route for setting
    Route::get('/user/setting', 'SettingController@index')->name('settings');
    Route::post('/user/setting/update', 'SettingController@update')->name('setting.update');

    //route for siteUIcontroller
    Route::get('/home', 'siteUIcontroller@index')->name('index');
    Route::get('/post/{slug}', 'siteUIcontroller@showPost')->name('post.show');
    Route::get('/category/{id}', 'siteUIcontroller@category')->name('category.show');
    Route::get('/tag/{id}', 'siteUIcontroller@tag')->name('tag.show');
    Route::get('/results', 'siteUIcontroller@search')->name('results.show');

    //route for admin dashboard
    Route::get('/dashboard', 'HomeController@dashboard')->name('dashboard');


});
/*Route::get('/hager', function (){
 return \App\Post::find(1)->category;
});*/

