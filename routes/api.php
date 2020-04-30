<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Omochi\Shop\Application\Controller\ItemController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


$router->post('/item', ItemController::class . '@store')->name('item.store');
$router->get('/item/{id}', ItemController::class . '@get')->name('item.get');
$router->put('/item/{id}', ItemController::class . '@update')->name('item.update');
$router->delete('/item/{id}', ItemController::class . '@delete')->name('item.delete');
