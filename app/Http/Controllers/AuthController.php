<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\InputRequest;

class AuthController extends Controller
{
    
    
    public function login()
    {
        return view('include.login');
    }

    public function signup()
    {
        return view('include.signup');
    }

    public function loginSubmit(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

       if(Auth::attempt(['email' => $email, 'password' => $password, 'active'=> 1]))
       {
            return redirect()->route('home');
       }

       return redirect()->route('login')->with("login-error","error");

    }


    public function signupSubmit(InputRequest $request)
    {

        $password = Hash::make($request->password);
        $confirmcode = rand(100000, 999999);   
        $email = $request->email;   

        User::create([
            "name"=>$request->name,
            "surname"=>$request->surname,
            "email"=>$email,
            "password"=>$password,
            "code"=>$confirmcode,
        ]);

        Mail::send('include.mail',['usercode'=>$confirmcode], function($message)use ($email){
            $message->to($email)->subject('Consoldes confirmation code');
        });

        return view('include.userconfirm',["useremail"=>$request->email]);


    }
    

    public function userLogout()
    {
        auth()->logout();
        return redirect()->back();
    }

    
    public function userconfirm(Request $request)
    {
        if ($request->isMethod('post')) 
        {
            $code = $request->usercode;
            $email = $request->email;
            $user = User::where("email",$email)->get()->first();

            if($user->code == $code)
            {
                User::where('email', $email)->update(['active' => 1,]);
                Auth::loginUsingId($user->id);
                return view('include.userconfirmed');

            }else{

                $user = User::where("email",$email)->get()->first();
                $err_count = $user->code_err + 1;

                if($err_count < 6){
                    
                    User::where('email', $email)->update(['code_err' => $err_count,]);
                    return view('include.userconfirm',["useremail"=>$email,"confirmerror"=>"confirmerror"]);

                }else{
                    User::where('email', $email)->update(['active' => 2,]);
                    return redirect()->route('signup');
                }
            }
        }else{
            return redirect()->route('home');
        }

        
    }





    public function userconfirmed(Request $request)
    {
        if ($request->isMethod('post')) 
        {
           return view('include.userconfirmed');
        }else{
            return redirect()->route('home');
        }
    }



  


}
