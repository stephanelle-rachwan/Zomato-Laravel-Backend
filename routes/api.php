<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\test;

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

//******* ADMIN *******\\
Route::get('/admin/users', []); // get all users

Route::get('/admin/restaurants', []); // get all restaurants
Route::put('/admin/restaurant', []); // add a restaurant

Route::get('/admin/reviews', []); // get all pending reviews
Route::patch('/admin/review/{id}', []);  // update review status
//*********************\\


//******** USER *******\\
Route::get('/user/{id}', []); // get one user
Route::patch('/user', []); // update a user

Route::get('/restaurants', []); // get all restaurants

Route::get('/reviews', []); // get accepted restaurant reviews
Route::put('/review', []); // add new review

Route::put('/user', []); // sign up
Route::post('/user', []); // login
//*********************\\

/**
 * User:
 * - login (done)
 * - signup (done)
 * 
 * - get all restaurants (done)
 * 
 * - add new review (done)
 * - get restaurant reviews (accepted only) (done)
 * 
 * - get a user (done)
 * - update user (done)
 */

/**
 * Admin:
 * - get all restaurants (done)
 * - add restaurant (done)
 * 
 * - get all users (done)
 * 
 * - get all pending reviews (done)
 * - update review (done)
 */
