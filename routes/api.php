<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\FoodadminController;
use App\Http\Controllers\PartfoodController;
use App\Http\Controllers\UpimageController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('Register',[AdminController::class,'Register']);
Route::post('Login',[AdminController::class,'login']);



Route::post('Registeruser',[UserController::class,'Register']);





Route::get('getfood/{id}',[UserController::class,'getpartfood']);

Route::get('getfoodcollection',[UserController::class,'getallfood']);



Route::middleware('admin:admin')->group(function(){
    

   






    Route::resource('food',FoodadminController::class);
   
    Route::resource('foodpart',PartfoodController::class);
        
    Route::resource('upimage',UpimageController::class);
    
    Route::post('updatefood',[FoodadminController::class,'updatefood']);

    Route::post('updatepart',[FoodadminController::class,'updatefood']);






    Route::get('userr',[FoodadminController::class,'indexxx']);

    Route::get('getfooduseryes',[FoodadminController::class,'useryes']);
   
    Route::get('getfooduserrnot',[FoodadminController::class,'userno']);


    Route::post('getimage',[UpimageController::class,'indexx']);

    Route::put('upuser/{id}',[FoodadminController::class,'updateuser']);

    Route::delete('deleteuser/{id}',[FoodadminController::class,'destroyuser']);

    Route::put('upimagefood/{id}',[FoodadminController::class,'updateimage']);
    
    Route::put('upimagepart/{id}',[PartfoodController::class,'updateimage']);
});





Route::middleware('auth:api')->group(function(){
    
    Route::resource('fooduser',UserController::class);
    
    
   


   
});










Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
