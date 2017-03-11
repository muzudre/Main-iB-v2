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

    // $countpolicy = DB::table('agents')->orderBy('post_id')->count();
//    $countpolicy = DB::table('policy')
//        ->select(DB::raw('count(*) as user_id'))
//        ->where('user_id', '=', 'user_id')
//        ->groupBy('user_id')
//        ->count();
    //get the product
    $agents = \Illuminate\Support\Facades\DB::table('agents')->orderBy('post_id')->count();
    $policy = \Illuminate\Support\Facades\DB::table('policy')->orderBy('id')->count();
    $users = \Illuminate\Support\Facades\DB::table('users')->orderBy('id')->count();
    // show the view and pass the product to it
    return \View::make('welcome',compact('users','policy','agents'));

});
// Admin Interface Routes
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
  // Backpack\CRUD: Define the resources for the entities you want to CRUD.
    CRUD::resource('policy', 'Admin\PolicyCrudController');
    CRUD::resource('policytype', 'Admin\PolicytypeCrudController');
    CRUD::resource('agents', 'Admin\AgentsCrudController');
    CRUD::resource('company', 'Admin\CompanyCrudController');
    CRUD::resource('users', 'Admin\UsersCrudController');
  // [...] other routes

    /// add policy route
    Route::get('users/{user}/viewaddpolicy', 'Admin\UsersCrudController@viewaddpolicy');
    // delete policy from user link in button onliny in users infromation
    Route::get('users/{user}/deletepolicy', 'Admin\UsersCrudController@deletepolicy');
    // edit policy
    Route::get('users/{user}/editpolicy', 'Admin\UsersCrudController@editpolicy');
    // add policy for user
    Route::post('users/{user}/addpolicy', 'Admin\UsersCrudController@addpolicy');

    Route::post('users/{user}/addpolicy', 'Admin\UsersCrudController@addpolicy');





});

