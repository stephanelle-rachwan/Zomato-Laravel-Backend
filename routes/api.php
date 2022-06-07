<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ReviewController;

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
Route::get('/admin/users', [UserController::class, "adminGetUsers"]); // get all users

Route::get('/admin/restaurants', [RestaurantController::class, "adminGetRestaurants"]); // get all restaurants
Route::put('/admin/restaurant', [RestaurantController::class], "adminAddRestaurant"); // add a restaurant

Route::get('/admin/reviews', [ReviewController::class], "adminGetReviews"); // get all pending reviews
Route::patch('/admin/review/{id}', [ReviewController::class], "adminUpdateReview");  // update review status
//*********************\\


//******** USER *******\\
Route::get('/user/{id}', [UserController::class], "getUser"); // get one user
Route::patch('/user', [UserController::class], "updateUser"); // update a user

Route::get('/restaurants', [RestaurantController::class], "getRestaurants"); // get all restaurants

Route::get('/reviews', [ReviewController::class], "getReviews"); // get accepted restaurant reviews
Route::put('/review', [ReviewController::class], "addReview"); // add new review

Route::put('/user', [UserController::class], "addUser"); // sign up
Route::post('/user', [UserController::class], "loginUser"); // login
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
