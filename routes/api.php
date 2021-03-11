<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodadminController;
use App\Http\Controllers\OpclController;
use App\Http\Controllers\PartfoodController;
use App\Http\Controllers\UpimageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UsernotyController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('Register',[AdminController::class,'Register']);
Route::post('Login',[AdminController::class,'login']);



Route::post('Registeruser',[UserController::class,'Register']);


Route::get('getopcl',[FoodadminController::class,'indexx']);



Route::get('getfood/{id}',[UserController::class,'getpartfood']);

Route::get('getfoodcollection',[UserController::class,'getallfood']);



Route::middleware('admin:admin')->group(function(){
    


    Route::resource('food',FoodadminController::class);
   
    Route::resource('foodpart',PartfoodController::class);
    Route::get('getpartfood/{id}',[PartfoodController::class,'indexx']);


   
    
    Route::post('updatefood',[FoodadminController::class,'updatefood']);

    Route::post('updatepart',[PartfoodController::class,'updatefood']);



    Route::get('getfooduseryes',[FoodadminController::class,'useryes']);
   
    Route::get('getfooduserrnot',[FoodadminController::class,'userno']);



    
    Route::put('upuser/{id}',[FoodadminController::class,'updateuser']);


    Route::get('getfu/{id}',[FoodadminController::class,'getfooduser']);



    Route::delete('deleteuser/{id}',[FoodadminController::class,'delete']);




    Route::get('getnoty',[FoodadminController::class,'usernoty']);


    Route::resource('usernoty',UsernotyController::class);


    Route::put('upnotyy/{id}',[FoodadminController::class,'updatenoty']);


    Route::resource('opcl',OpclController::class);


});





Route::middleware('auth:api')->group(function(){
    
    Route::resource('fooduser',UserController::class);
    
    
   
    Route::resource('usern',UsernotyController::class);

   
});










Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
