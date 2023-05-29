<?php

namespace App\http\Controllers;

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\RoomtypeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContractController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [RoomController::class,'byfloor']);
Route::get('/home', [RoomController::class,'byfloor']);
Route::get('/room', [RoomController::class, 'index']);
Route::get('/room/{name}', [RoomController::class, 'show']);
Route::get('/roomtype/{name}', [RoomtypeController::class, 'show']);

Route::get('/order', [ContractController::class, 'newBlank']);
Route::post('/order', [ContractController::class, 'newFilled']);
Route::post('/order/send', [ContractController::class, 'send']);

Route::post('/login', [UserController::class,'authenticate']);
Route::get('/login', [UserController::class,'landing']);
Route::post('/logout', [UserController::class,'logout']);
Route::get('/user', [UserController::class,'landing']);
Route::get('/user/bill', [UserController::class,'bill']);
Route::get('/user/status', [UserController::class,'status']);
Route::post('/user/bill', [UserController::class,'extend']);
Route::get('/user/change-pw', [UserController::class,'changePw']);
Route::post('/user/change-pw', [UserController::class,'savePw']);

Route::get('/admin', [AdminController::class,'dable']);
Route::get('/admin/login', [AdminController::class,'dable']);

Route::post('/admin/login', [AdminController::class,'authenticate']);
Route::post('/admin/logout', [AdminController::class,'logout']);

Route::get('/admin/index', [AdminController::class,'index']);
Route::get('/admin/rooms', [AdminController::class,'rooms']);
Route::get('/admin/users', [AdminController::class,'users']);
Route::get('/admin/roomtypes', [AdminController::class,'roomtypes']);
Route::get('/admin/facilities', [AdminController::class,'facilities']);

Route::get('/admin/rooms/create', [RoomController::class,'create']);
Route::post('/admin/rooms/create', [RoomController::class,'store']);
Route::get('/admin/rooms/edit/{id}',[RoomController::class,'edit']);
Route::post('/admin/rooms/edit/{id}',[RoomController::class,'update']);
Route::get('/admin/rooms/maintain/{id}', [RoomController::class,'maintain']);
Route::get('/admin/rooms/finish/{id}', [RoomController::class,'finish']);
Route::get('/admin/rooms/image/{id}', [RoomController::class,'images']);
Route::post('/admin/rooms/image/{id}', [RoomController::class,'addImage']);
Route::get('/admin/rooms/image/delete/{id}', [RoomController::class,'deleteImage']);

Route::get('/admin/users/create', [UserController::class,'create']);
Route::post('/admin/users/create', [UserController::class,'store']);
Route::get('/admin/users/{id}/attach', [UserController::class,'room']);
Route::post('/admin/users/{id}/attach', [UserController::class,'attach']);
Route::get('/admin/users/{id}/detach', [UserController::class,'detach']);

Route::get('/admin/roomtypes/create', [RoomtypeController::class,'create']);
Route::post('/admin/roomtypes/create', [RoomtypeController::class,'store']);
Route::get('/admin/roomtypes/edit/{id}',[RoomtypeController::class,'edit']);
Route::post('/admin/roomtypes/edit/{id}',[RoomtypeController::class,'update']);
Route::get('/admin/roomtypes/edit/{id}',[RoomtypeController::class,'edit']);
Route::post('/admin/roomtypes/edit/{id}',[RoomtypeController::class,'update']);
Route::get('/admin/roomtypes/image/{id}',[RoomtypeController::class,'image']);
Route::post('/admin/roomtypes/image/{id}',[RoomtypeController::class,'upload']);

Route::get('/admin/facilities/create', [FacilityController::class,'create']);
Route::post('/admin/facilities/create', [FacilityController::class,'store']);
Route::get('/admin/facilities/delete/{id}', [FacilityController::class,'destroy']);

Route::get('/admin/requests',[ContractController::class,'index']);
Route::get('/admin/requests/accept/{id}',[ContractController::class,'acceptNew']);
Route::get('/admin/requests/extend/{id}',[ContractController::class,'extend']);
Route::get('/admin/requests/decline/{id}',[ContractController::class,'decline']);









