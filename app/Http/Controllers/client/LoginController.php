<?php

namespace App\Http\Controllers\client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use App\Models\admin\MagikUser;

class LoginController extends Controller
{
    public function logout()
    {
        try {
            Session::forget(['google_id', 'givenName', 'points']);

            Auth::logout();

            return redirect()->route('home');
        } catch (\Throwable $th) {

            return redirect()->route('home');
        }
    }

    public function redirectToGmail()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGmailCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();
        // Your authentication logic here

        $googleId = $googleUser->getId();

        $existingUser = MagikUser::where('id', $googleId)->first();
        $newUser = null;

        if (!$existingUser) {
            $newUser = new MagikUser();
            $newUser->id = $googleUser->getId();
            $newUser->username = $googleUser->user['given_name'];
            $newUser->email = $googleUser->getEmail();
            $newUser->save();
        }

        $currentUser = $existingUser ?? $newUser;

        Auth::loginUsingId($googleId);

        Session::put('google_id', $googleId);
        Session::put('givenName', $googleUser->user['given_name']);
        Session::put('points', $currentUser->points);
        Session::put('avatar', $googleUser->user['picture']);

        Session::save();

        return redirect()->route('home');
    }
}
