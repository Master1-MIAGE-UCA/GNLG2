<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    //

    function usersPage(){
        return view('pages.users.users');
    }
}
