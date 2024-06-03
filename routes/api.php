<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\FactureController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StripePaymentController;

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

// Route::resource('products', ProductController::class);

// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/add', [ClientController::class, 'add']);
Route::post('/addf', [FactureController::class, 'add']);
Route::post('/addc', [ContractController::class, 'add']);
Route::post('/addp', [ProduitController::class, 'add']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/log', [ClientController::class, 'login']);

Route::get('/sanctum/csrf-cookie', [ClientController::class, 'getCSRFCookie']);

Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);
Route::get('/products/search/{name}', [ProductController::class, 'search']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);
    Route::get('/factures/{clientId}', [FactureController::class, 'monf']);
    Route::get('/produit/{clientId}', [ProduitController::class, 'adds']);
    Route::get('/contract/{clientId}', [ContractController::class, 'monc']);
    Route::post('/logout', [ClientController::class, 'logout']);
    Route::post('/update_profile/{id}', [ClientController::class, 'update']);
    Route::get('/currentuser', [ClientController::class, 'getCurrentUser']);
    Route::post('/create-payment-intent', [StripePaymentController::class, 'createPaymentIntent']);


});



Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});