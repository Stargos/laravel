<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


Route::middleware('auth:sanctum')->group(function() {
    Route::get('/user', [UserController::class, 'show']);
    Route::post('/user/logout', function(Request $request) {
        $request->user()->tokens()->delete();
    });
});

/*
|--------------------------------------------------------------------------
|Create an account.
|--------------------------------------------------------------------------
|
*/
Route::post('/register', [UserController::class, 'store']);

/*
|--------------------------------------------------------------------------
|Log in.
|--------------------------------------------------------------------------
|
*/
Route::post('/login', function(Request $request) {
    $request->validate([
        'email' => 'required|email|max:50',
        'password' => 'required|string|min:8',
    ]);

    $user = User::where('email', $request->email)->first();
    if(!$user || !Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => 'The provided credentials are incorrect.'
        ]);
    }

    return $user->createToken('auth_token')->plainTextToken;
});