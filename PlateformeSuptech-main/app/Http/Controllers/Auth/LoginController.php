<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    public function redirectTo()
    {
        $user = Auth::user();

        // Check the user's role and redirect accordingly
        switch ($user->role_id) {
            case 1:
                return '/homeadmin';
            case 2:
                return '/homeacceuil';
            case 3:
                return '/homeRH';
            case 4:
                return '/homeprof';
            case 5:
                return '/homescolarite';
            case 6:
                return '/homeetudiant';
            default:
                return '/';
        }
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
