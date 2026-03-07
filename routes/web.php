<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Services\UserService;
use App\Services\ProductService;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome', ['name' => 'My-app']);
});

Route::get('/show-users', [UserController::class, 'show']);

// Service Container
Route::get('/test-container', function (Request $request) {
    return $request->input('key');
});

// Service Provider
Route::get('/test-provider', function (UserService $userService) {
    return $userService->listUsers();
});

Route::get('/test-users', [UserController::class, 'index']);

// Facades
Route::get('/test-facade', function (UserService $userService) {
    return Response::json($userService->listUsers());
});

// Routing -> Parameters
Route::get('/post/{post}/comment/{comment}', function (string $post, string $comment) {
    return "Post ID: {$post} - Comment: {$comment}";
});

Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');

// Name Route / Alias
Route::get('/test/route/sample', function () {
    return route('test-route');
})->name('test-route');

// Middleware Group
Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', fn () => 'first');
    Route::get('route-middleware-group/second', fn () => 'second');
});

// Controller Group
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'get');
});

// CSRF
Route::get('/token', fn () => view('token'));
Route::post('/token', fn (Request $request) => $request->all());

// Resource
Route::resource('products', ProductController::class);

// View with data
Route::get('/products-list', function (ProductService $productService) {
    return view('products.list', [
        'products' => $productService->listProducts(),
    ]);
});