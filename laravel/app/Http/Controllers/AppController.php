<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    //

    function usersPage() {
        return view('pages.users.users');
    }
    function bornActsPage() {
        return view('pages.acts.bornActs');
    }
    function mariageActsPage()
    {
        return view('pages.acts.mariageActs');
    }
    function deathActsPage()
    {
        return view('pages.acts.deathActs');
    }
    function DiversActsPage()
    {
        return view('pages.acts.diversActs');
    }
}
