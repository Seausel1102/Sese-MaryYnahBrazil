<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

use App\Services\UserService;
use App\Services\ProductService;

use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController; // ✅ ADDED


Route::get('/', function () {
    return view('welcome', ['name'=> 'funtilon-app']);
});

Route::get('/show-users', [UserController::class, 'show']);


// Service Container
Route::get('/test-container', function (Request $request) {
    $input = $request->input('key');
    return $input;
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
    return "Post ID: " . $post . " - Comment: " . $comment;
});

Route::get('/post/{id}', function (string $id) {
    return $id;
})->where('id', '[0-9]+');

Route::get('/search/{search}', function (string $search) {
    return $search;
})->where('search', '.*');


// Named Route
Route::get('/test/route/sample', function () {
    return route('test-route');
})->name('test-route');


// Route -> Middleware Group
Route::middleware(['user-middleware'])->group(function () {
    Route::get('route-middleware-group/first', function () {
        echo 'first';
    });
    Route::get('route-middleware-group/second', function () {
        echo 'second';
    });
});


// Route -> Controller Group
Route::controller(UserController::class)->group(function () {
    Route::get('/users', 'index');
    Route::get('/users/first', 'first');
    Route::get('/users/{id}', 'get');
});


// CSRF
Route::get('/token', function () {
    return view('token');
});

Route::post('/token', function (Request $request) {
    return $request->all();
});


// Resource Controller (Products)
Route::resource('products', ProductController::class);


// View Data Example
Route::get('/products-list', function (ProductService $productService) {
    $data['products'] = $productService->listProducts();
    return view('products.list', $data);
});