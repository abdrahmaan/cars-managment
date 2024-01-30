<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CarsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UsersController;

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

Route::redirect('/','/dashboard');



Route::middleware(['user-auth'])->group(function () {
    
// Dashboard 

    Route::get('/dashboard', [DashboardController::class,"index"]);


// ***************************************************************************

// Cars

    // New Car 
    Route::get('/new-car', [CarsController::class,"create"]);

    // New Car - Store
    Route::post('/new-car', [CarsController::class,"store"]);

    // New Car Import File
    Route::get('/new-car-import', [CarsController::class,"import_page"]);

    // New Car Import File - Store
    Route::post('/new-car-import', [CarsController::class,"import_store"]);

    // Delete Car 
    Route::get('/delete-car/{id}', [CarsController::class,"destroy"]);

    // Cars View
    Route::get('/cars', [CarsController::class,"index"] );
    
    // Download Cars File
    Route::get('/download-file', function () {
        $path = public_path("Cars-Example.xlsx");
        $response = response()->download($path);
        // $response->headers->set('Refresh', '2;url=/cars');
        
        return $response;
         
    } );




// ***************************************************************************

// Users

    // New User 
    Route::get('/new-user', [UsersController::class,"create"]);

    // New Car - Store
    Route::post('/new-user', [UsersController::class,"store"]);

    // Delete Car 
    Route::get('/delete-user/{id}', [UsersController::class,"destroy"]);

    // Users View
    Route::get('/users', [UsersController::class,"index"] );

    // Change Password 
    Route::get('/change-password', [UsersController::class,"change_password_page"] );

    // Change Password - Logic
    Route::post('/change-password', [UsersController::class,"change_password_logic"] );
// ***************************************************************************

});

// Auth 

    // Login Page
    Route::get('/login', [UsersController::class,"login_page"]);

    // Login - submit
    Route::post('/login', [UsersController::class,"login_logic"]);

    // Logout 
    Route::get('/logout', [UsersController::class,"logout"]);


// ***************************************************************************





