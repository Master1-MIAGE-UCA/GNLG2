<?php

use App\Http\Controllers\ApiController;
use App\Http\Controllers\AppController;
use App\Mail\WelcomeMail;
use FamilyTree365\LaravelGedcom\Utils\GedcomParser;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

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
    return view('pages.test');
});
Route::get('/email', function () {
    //$name = "Oussama";
    //Mail::to('recever@expoactes.fr')->send(new WelcomeMail($name));
    return new WelcomeMail("Oussama", "SAMIA", "OussaJr_", "MDP");
});

Route::get('/users', [AppController::class, 'usersPage']);


Route::prefix('api')->group(function () {
    Route::prefix('sdt')->group(function () {
        Route::post('/users', [ApiController::class, 'sdtUsers']);
        Route::post('/actes', [ApiController::class, 'sdtActes']);
    });

    Route::prefix('delete')->group(function () {
        Route::delete('/users', [ApiController::class, 'deleteUsers']);
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
