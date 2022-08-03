<?php

use App\Http\Controllers\Controller;
// use App\Http\Controllers\PassApi;
use App\Http\Controllers\PassApiController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
// use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Laravel\Sanctum\Sanctum;

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
                          ////////// Sanctum Api ////////////
        //    return test using api
// Route::get('/student',function(){
//  return "All Student Data";
// });
//                                 // public api 
// Route::get('/StudentAll',[StudentController::class,'index']);

// Route::get('/StudentAll/{id}',[StudentController::class,'show']);
// // // Route::post('/student',[StudentController::class,'store']);

// // Route::put('/update/student/{id}',[StudentController::class,'update']);

// // Route::delete('/delstudent/{id}',[StudentController::class,'destroy']);
// Route::post('/register',[UserController::class,'register']);
// Route::post('/login',[UserController::class,'login']);

// Route::middleware(['auth:sanctum'])->group(function(){
//         Route::post('/student',[StudentController::class,'store']);
        
//         Route::put('/update/student/{id}',[StudentController::class,'update']);
        
//         Route::delete('/delstudent/{id}',[StudentController::class,'destroy']);
//         Route::post('/logout',[UserController::class,'logout']);
// });
// ->get('/student', [StudentController::class,'store']);
        
                          ////////// Passport Api ////////////

 Route::get('/hh',function(){
         return "ok";
 });
Route::post('/register',[PassApiController::class,'Register']);                         
Route::post('passregister',[PassApiController::class,'passRegister']);

// Route::get('passlogin',[PassApiController::class,'PassLogin']);
Route::post('passlogin',[PassApiController::class,'PassLogin']);
Route::middleware('auth:api')->get('detail',[PassApiController::class,'GetAll']);
// Route::get('detail',[PassApiController::class,'GetAll'])->middleware('client');

