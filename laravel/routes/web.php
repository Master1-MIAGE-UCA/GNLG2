<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AppController;
use App\Mail\WelcomeMail;
use FamilyTree365\LaravelGedcom\Utils\GedcomParser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;
use Maatwebsite\Excel\Facades\Excel;

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

Route::get('/', [AppController::class, 'dashboardPage'])->name('dashboard');





Route::get('/users',[AppController::class,'usersPage']);
Route::get('/logiciel_params',[AppController::class,'paramsPage']);
Route::get('/aide_Actes',[AppController::class,'aideActesPage']);
Route::get('/aide_GestBD',[AppController::class,'aideGestBdPage']);
Route::get('/aide-Supp',[AppController::class,'aideSuppPage']);
Route::get('/born-acts',[AppController::class,'bornActsPage']);
Route::get('/mariage-acts',[AppController::class,'mariageActsPage']);
Route::get('/death-acts',[AppController::class,'deathActsPage']);
Route::get('/divers-acts',[AppController::class,'DiversActsPage']);

Route::prefix('api')->group(function () {
    Route::prefix('sdt')->group(function () {
        Route::post('/users', [ApiController::class, 'sdtUsers']);
        Route::post('/born-acts', [ApiController::class, 'sdtBornActs']);
        Route::post('/mariage-acts', [ApiController::class, 'sdtMariageActs']);
        Route::post('/death-acts', [ApiController::class, 'sdtDeathActs']);
        Route::post('/divers-acts', [ApiController::class, 'sdtDiversActs']);
    });

    Route::prefix('delete')->group(function (){
        Route::delete('/users',[ApiController::class, 'deleteUsers']);
        Route::delete('/born_acts',[ApiController::class, 'deleteBornActs']);
        Route::delete('/mariage-acts',[ApiController::class, 'deleteMariageActs']);
        Route::delete('/death-acts',[ApiController::class, 'deleteDeathActs']);
        Route::delete('/divers-acts',[ApiController::class, 'deleteDiversActs']);
    });
});

Route::get('/show/user/{id}', [AppController::class, 'userShow']);
Route::get('/show/bornAct/{id}', [AppController::class, 'bornActShow']);
Route::get('/show/mariageAct/{id}', [AppController::class, 'mariageActShow']);
Route::get('/show/deathAct/{id}', [AppController::class, 'deathActShow']);
Route::get('/show/diversAct/{id}', [AppController::class, 'diversActShow']);

Route::get('/form/user/{id}', [AppController::class, 'userForm']);
Route::post('/form/user', [AppController::class, 'storeFormUser']);
Route::get('/form/bornAct/{id}', [AppController::class, 'bornActForm']);
Route::post('/form/bornAct', [AppController::class, 'storeFormBornAct']);
Route::get('/form/deathAct/{id}', [AppController::class, 'deathActForm']);
Route::post('/form/deathAct', [AppController::class, 'storeFormDeathAct']);
Route::get('/form/mariageAct/{id}', [AppController::class, 'mariageActForm']);
Route::post('/form/mariageAct', [AppController::class, 'storeFormMariageAct']);
Route::get('/form/diversAct/{id}', [AppController::class, 'diversActForm']);
Route::post('/form/diversAct', [AppController::class, 'storeFormDiversAct']);
Route::post('/form/param', [AppController::class, 'storeFormParam']);



Route::prefix('export')->group(function (){
    Route::prefix('users')->group(function (){
        Route::get('excel',[AppController::class,'exportUsersToExcel']);
        Route::get('csv',[AppController::class,'exportUsersToCSV']);
    });
});
Route::prefix('import')->group(function () {
        Route::get('users', [AppController::class, 'importUsersPage']);
        Route::post('users', [AppController::class, 'importUsers']);
});

Route::prefix('download')->group(function (){
    Route::prefix('example')->group(function (){
        Route::get('users',[AppController::class, 'downloadExampleUsers']);
    });
});

