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

    });
});

Route::get('/show/user/{id}', [AppController::class, 'userShow']);
Route::get('/form/user/{id}', [AppController::class, 'userForm']);
Route::post('/form/user', [AppController::class, 'storeFormUser']);

Route::prefix('import')->group(function () {
    Route::get('gedcom', function () {

        $filename = asset('gedcom/JacquelineLapiere.ged');
        $parser = new GedcomParser();
        $parser->parse($filename, true, "1");
        echo "Success";
    });
});


Route::get('/email', function () {
    //$name = "Oussama";
    //Mail::to('recever@expoactes.fr')->send(new WelcomeMail($name));
    return new WelcomeMail("Oussama", "SAMIA", "OussaJr_", "MDP");
});

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
