<?php

use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\UserController;
use App\Models\Expense;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return response()->json(['Es definitivamente un javascript Object Notation']);
});

Route::get('/users', [UserController::class, 'index']);
Route::post('/register', [UserController::class, 'register']); // Ruta para registro de usuarios
Route::post('/login', [UserController::class, 'login']);
Route::get('/users/{user}', [UserController::class, 'show']);
Route::put('/users/{user}', [UserController::class, 'update']);
Route::delete('/users/{user}', [UserController::class, 'destroy']);

// Rutas para gastos
Route::get('/expenses', [ExpenseController::class, 'index']);
Route::post('/expenses', [ExpenseController::class, 'store']);
Route::get('/expenses/{expense}', [ExpenseController::class, 'show']);
Route::put('/expenses/{expense}', [ExpenseController::class, 'update']);
Route::delete('/expenses/{expense}', [ExpenseController::class, 'destroy']);

// Rutas para ingresos
Route::get('/incomes', [IncomeController::class, 'index']);
Route::post('/incomes', [IncomeController::class, 'store']);
Route::get('/incomes/{income}', [IncomeController::class, 'show']);
Route::put('/incomes/{income}', [IncomeController::class, 'update']);
Route::delete('/incomes/{income}', [IncomeController::class, 'destroy']);
