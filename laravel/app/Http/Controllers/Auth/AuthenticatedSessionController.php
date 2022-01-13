<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */


    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param \App\Http\Requests\Auth\LoginRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        //$request->authenticate();


        $loginRequest = new LoginRequest;

        $user = User::where('email', '=', $request->email, 'and')->where('hashpass', '=', $request->password)->first();
        /* if ($user) {



             $request->session()->regenerate();
             $request->session()->save();

             return redirect()->intended(RouteServiceProvider::HOME);
         }*/

        if ($user) {
            Auth::login($user);
            return redirect()->intended(RouteServiceProvider::HOME);
        }

        RateLimiter::hit($loginRequest->throttleKey());

        throw ValidationException::withMessages([
            'email' => 'Email ou mot de passe est incorrecte',
        ]);


        /*      if (Auth::attempt(['email' => $request->email, 'hashpass' => $request->password])) {
                  $request->session()->regenerate();
                  return redirect()->intended(RouteServiceProvider::HOME);
              }
      */

    }

    public function throttleKey()
    {
        $loginRequest = new LoginRequest;
        return Str::lower($loginRequest->input('email')) . '|' . $loginRequest->ip();
    }


    /**
     * Destroy an authenticated session.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        // var_dump('yes');die();
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
