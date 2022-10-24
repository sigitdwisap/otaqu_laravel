<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeesController;
use App\Http\Controllers\FallbackController;
use App\Http\Controllers\HomeController;

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

// // GET
// Route::get('/employee', [EmployeesController::class, 'index'])->name('employee.index');
// Route::get('/employee/{id}', [EmployeesController::class, 'show'])->name('employee.show');
// // Route::get('/employee/{id}', [EmployeesController::class, 'show'])->whereNumber('id');
// // Route::get('/employee/{name}', [EmployeesController::class, 'show'])->whereAlpha('name');
// // Route::get('/employee/{id}/{name}', [EmployeesController::class, 'show'])
// //     ->where([
// //         'id' => '[0-9]+',
// //         'name' => '[A-Za-z]+'
// //     ]);
// // Route::get('/employee/{id}/{name}', [EmployeesController::class, 'show'])
// //     ->whereNumber('id')
// //     ->whereAlpha('name');

// // POST
// Route::get('/employee/create', [EmployeesController::class, 'create'])->name('employee.create');
// Route::post('/employee', [EmployeesController::class, 'store'])->name('employee.store');

// // PUT or PATCH
// Route::get('/employee/edit/{id}', [EmployeesController::class, 'edit'])->name('employee.edit');
// Route::patch('/employee/{id}', [EmployeesController::class, 'update'])->name('employee.update');

// // DELETE
// Route::delete('/employee/{id}', [EmployeesController::class, 'destroy'])->name('employee.destroy');

Route::prefix('/employee')->group(function () {
    // GET
    Route::get('/', [EmployeesController::class, 'index'])->name('employee.index');
    Route::get('/{id}', [EmployeesController::class, 'show'])->name('employee.show');

    // POST
    Route::get('/create', [EmployeesController::class, 'create'])->name('employee.create');
    Route::post('/', [EmployeesController::class, 'store'])->name('employee.store');

    // PUT or PATCH
    Route::get('/edit/{id}', [EmployeesController::class, 'edit'])->name('employee.edit');
    // Route::patch('/{id}', [EmployeesController::class, 'update'])->name('employee.update');
    Route::post('/{id}', [EmployeesController::class, 'update'])->name('employee.update');

    // DELETE
    // Route::delete('/delete/{id}', [EmployeesController::class, 'destroy'])->name('employee.destroy');
    Route::get('/delete/{id}', [EmployeesController::class, 'destroy'])->name('employee.destroy');
    Route::post('/delete_checklist/{id}', [EmployeesController::class, 'destroy_checklist'])->name('employee.destroy_checklist');
});

Route::get('/employee_export', [EmployeesController::class, 'export'])->name('employee.export');

// Route::resource('employee', EmployeesController::class);

// Route for invoke method
Route::get('/', HomeController::class);

// Multiple HTTP verbs
// Route::match(['GET', 'POST'], '/employee', [EmployeesController::class, 'index']);
// Route::any('/employee', [EmployeesController::class, 'index']);

// Return view
// Route::view('/employee', 'employee.index', ['title' => 'Otaqu Project']);

// Fallback Route
Route::fallback(FallbackController::class);
