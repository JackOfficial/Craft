<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use Auth;
use App\Models\User;

class SocialController extends Controller
{
    public function redirect()
{
    return Socialite::driver('google')->redirect();
}

public function callback()
{
    try {
            $user = Socialite::driver('google')->user();
            $user = User::where('google_id', $user->getId())->first();

            if($user){
                Auth::login($user);
                return redirect('/home');
            }else{

                $user = Socialite::driver('google')->user();
                
                if(session()->has('sharedLinkID')){
                 $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id'=> $user->getId(),
                    'password' => encrypt('123456dummy'),
                    'avatar' => $user->getAvatar(),
                    'linkOwner' => session()->get('sharedLinkID') 
                ]);   
                }
                else{
                   $newUser = User::create([
                    'name' => $user->getName(),
                    'email' => $user->getEmail(),
                    'google_id'=> $user->getId(),
                    'password' => encrypt('123456dummy'),
                    'avatar' => $user->getAvatar()
                ]); 
                }
                Auth::login($newUser);
                return redirect('/home');
                
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
   }


}
