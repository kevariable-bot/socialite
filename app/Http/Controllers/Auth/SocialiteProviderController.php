<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\SocialiteProvider;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Laravel\Socialite\Two\InvalidStateException;

class SocialiteProviderController extends Controller
{
    public function redirectToProvider($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function handleProviderCallback($provider)
    {
        try {
            /**
             * user method will read the incoming request and retrieve 
             * the user's information from the provider.
             */
            $user = Socialite::driver($provider)->user();
        } catch (InvalidStateException $e) {
            /**
             * The stateless method may be used to 
             * disable session state verification
             */
            $user = Socialite::driver($provider)->stateless()->user();
        }

        if ($authUser = $this->findOrCreateUser($user, $provider))
            Auth::login($authUser, true);

        return redirect()->route('home');
    }

    private function findOrCreateUser($userProvider, $provider)
    {
        $socialAccount = SocialiteProvider::whereProviderId($userProvider->getId())
            ->whereProviderName($provider)
            ->first();

        // if user found
        if ($socialAccount)
            return $socialAccount->user;

        $user = User::create([
            'name' => $userProvider->getName(),
            'email' => $userProvider->getEmail()
        ]);

        $user->socialites()->create([
            'provider_id' => $userProvider->getId(),
            'provider_name' => $provider
        ]);

        return $user;
    }
}
