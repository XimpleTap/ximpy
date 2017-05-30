<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index');
    }

    public function process_login(Request $request){
        $data = $request->all();
        $user_data = array(
            'username'=>$data['username'],
            'password'=>$data['password']
        );

        $user = User::where('username','=',$data['username'])->get();
        $usertype = $user[0]['user_type_id'];
        if($usertype == env('CARDHOLDER_USERTYPE_ID')){
            if(Auth::attempt($user_data)){
                return redirect()->route('dashboard');
            } else{
                return redirect()->route('login');
            }
        } else{
            return redirect()->route('login');
        }
    }

    public function username()
    {
        return 'username';
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    }




}
