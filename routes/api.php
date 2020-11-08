<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\VideoController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::prefix("v1")->group(function ()
{
    Route::apiResource("/video",VideoController::class)->middleware('auth:sanctum');
});
Route::prefix("v1/video")->group(function ()
{
    Route::apiResource("{video}/comment", CommentController::class)->middleware('auth:sanctum');
});

Route::post('/login',[AuthController::class, 'loginMAN']);
Route::post('/register',[AuthController::class, 'register']);
Route::get('/logout',[AuthController::class, 'logoutMAN']);

Route::fallback(function(){
    return response()->json([
        'message' => 'Page Not Found'], 404);
}); // For Incorrect route
