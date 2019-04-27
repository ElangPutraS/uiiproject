<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Services\GoogleUserService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Validation\ValidationException;

class GoogleController extends Controller
{
    /**
     * Redirect to google authentication.
     *
     * @return \Illuminate\Routing\Redirector
     */
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    /**
     * Receive callback from google authentication.
     *
     * @return \Illuminate\Http\Response
     */
    public function callback(GoogleUserService $service)
    {
        $googleUser = Socialite::driver('google')->user();

        if ($user = $service->getUser($googleUser)) {
            Auth::login($user);

            return redirect()->intended();
        }

        throw ValidationException::withMessages([
            'email' => [trans('auth.failed')],
        ])->redirect('/login');
    }
}
