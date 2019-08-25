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

Route::get('/', function (){
    return redirect('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/project/index', 'ProjectController@index')->name('project.index');
Route::get('/project/index/ajax', 'ProjectController@ajax_index')->name('ajax.project.index');
Route::get('/project/add/index', 'ProjectController@addView')->name('project.addView');
Route::post('/project/add/new', 'ProjectController@addDO')->name('project.addDo');
Route::get('/project/follow/{pid}', 'ProjectController@follow')->name('project.follow');

Route::get('/notify/accepted/{fid}/{apt}', 'NotifyController@followAccepted')->name('project.follow.accepted');
Route::get('/notify/delete/{fid}', 'NotifyController@Delete')->name('notification.delete');

Route::get('/detail/index/{pid}', 'DetailController@index')->name('detail.index');

Route::get('/detail/remarks/add/{rid}/{pid}', 'RemarksController@addIndex')->name('detail.remarks.add');
Route::post('/detail/remarks/add/{rid}/{pid}', 'RemarksController@postAddIndex')->name('detail.remarks.add');
Route::get('/detail/remarks/edit/{id}', 'RemarksController@editIndex')->name('detail.remarks.edit');
Route::post('/detail/remarks/edit/{id}', 'RemarksController@postEditIndex')->name('detail.remarks.edit');
Route::get('/detail/remarks/delete/{id}', 'RemarksController@deleteIndex')->name('detail.remarks.delete');

Route::post('/detail/comment/{pid}', 'DetailController@comment')->name('detail.comment');

Route::post('/detail/recommend/{rid}', 'DetailController@recommend')->name('detail.recommend');

Route::get('/projectFollow/index', 'ProjectFollowController@index')->name('projectFollow.index');

Route::get('/notify/index', 'NotifyController@index')->name('notification');

Route::get('/profile/index', 'ProfileController@index')->name('profile.index');
Route::post('/profile/edit', 'ProfileController@edit')->name('profile.edit');
Route::get('/profile/member/{uid}', 'ProfileController@member')->name('profile.member');
Route::get('/profile/member/info/{id}', 'ProfileController@info')->name('member.info');
Route::get('/profile/member/project/following/{id}', 'ProfileController@projectFollowing')->name('member.project.following');

Route::post('/search/index', 'SearchController@index')->name('search.index');
Route::post('/search/top/fetch', 'SearchController@topFetch')->name('top.search.fetch');
Route::get('/search/result/project/{q}/{id}', 'SearchController@searchProject')->name('search.project');
Route::get('/search/index{q?}', 'SearchController@getIndex')->name('search.page');