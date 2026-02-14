<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Response;

Route::get('/', function () {
    return view('welcome');
    #return "Hello World";
});

Route::get('/show-users', [UserController::class, 'show']);

//Service Container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
});

//Service Provider
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});

Route::get('/test-users', [UserController::class, 'index']);

//Facades
Route::get('/test-facade', function (UserService $userService) {
    return Response::json($userService->listUsers());
});

?>