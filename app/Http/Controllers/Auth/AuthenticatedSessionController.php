<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

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
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    public function facebook()
    {
        return Socialite::driver('facebook')->redirect();
    }
    public function authFacebook()
    {
        $user = Socialite::driver('facebook')->user();

        $userExists = User::where('facebook_id', $user->id)->where('type_auth', 'facebook')->first();
        if ($userExists) {
            Auth::login($userExists);
        } else {
            $userNew = User::created([
                'name' => $user->name,
                'email' => $user->email,
                'type_auth' => 'facebook',
                'facebook_id' => $user->id,
                'type' => 'free',
            ]);
            Auth::login($userNew);
        }
    }
    public function google()
    {
        return Socialite::driver('google')->redirect();
    }
    public function authGoogle()
    {
        $user = Socialite::driver('google')->user();

        $userExists = User::where('google_id', $user->id)->where('type_auth', 'google')->first();
        if ($userExists) {
            Auth::login($userExists);
        } else {
            $userNew = User::created([
                'name' => $user->name,
                'email' => $user->email,
                'type_auth' => 'google',
                'google_id' => $user->id,
                'type' => 'free',
            ]);
            Auth::login($userNew);
        }
    }
}
