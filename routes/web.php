<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MemberController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // return redirect("about");
});
// Route::view("about", "about");
// Route::view("contact", "contact");

// Route::get('/', function (Request $request) {
//     return "hello request";
// });
// Route::get('/user/{id}', function (Request $request, $id) {
//     return 'User ' . $id . " Hello";
// });

Route::fallback(function () {
    return "executing fallback";
});

// Route::get("users", [UserController::class, "viewload"]);

Route::get('artists', [UserController::class, 'index']);

Route::get("member", [MemberController::class, "index"]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get("student", [MemberController::class, 'show']);
