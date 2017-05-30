<?php

namespace App\Http\Controllers;

use App\User;
use App\UserProfile;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function callback()
    {
        return redirect()->to('/dashboard');
        $providerUser = \Socialite::driver('facebook')->user();
        $session = [
            'sess_vars'=>$providerUser
        ];
        session()->put('fb',$session);
        $user = new User();
        $user->save_fb_returns($providerUser);

        /*
         * $user_profile = new UserProfile();
        $profile = $user_profile->get_user_data_via_email($providerUser->email);
        */


    }


}
