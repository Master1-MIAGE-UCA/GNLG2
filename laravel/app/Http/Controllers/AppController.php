<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AppController extends Controller
{
    //

    function usersPage()
    {
        return view('pages.users.users');
    }


    function userForm($id)
    {
        $user = null;
        $statuts = ['W', 'A', 'N', 'B'];
        $levels = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
        if ($id > 0) {
            $user = User::find($id);
        }
        // var_dump($user);die();
        return view('pages.users.user-form', compact('user', 'levels', 'statuts'));
    }
}
