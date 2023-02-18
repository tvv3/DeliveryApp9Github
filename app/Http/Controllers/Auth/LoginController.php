<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Models\User;

//adaugate de mine:
//use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
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

    use AuthenticatesUsers; // se pastreaza 
    
    public function username()
    {
        return 'name'; //ca sa imi ia numele nu emailul la login in formul de logare --- pot schimba cu email sau comenta functia username si modifica inapoi view-ul login.blade.php
    }
    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

   /* public function validate_login(Request $request) //creata de mine
    {
    $img[1]="LK62MN";
    //... pana la 15 

   
    $val=null;

    if (null!=session('cod_i')) 
     {  
     $i= strip_tags(session('cod_i'));
     if (($i>=1)&&($i<=15)&&($i==session('cod_i')))
         {
             $val=$img[$i];
          }
     }

     if ((strip_tags($request->code))!=$request->code)
        {return 'Eroare! In locul codului ati introdus simboluri nepermise!';}

     if (!isset($val)) {return 'Eroare la asocierea codului cu imaginea!';}

     if ($val==$request->code) {return true;}
     else {return 'Eroare! Ati introdus un cod gresit!';}
    }*/

    public function login(Request $request) //scrisa de mine, obligatoriu sa se numeasca asa
    {

        //$messg= $this->validate_login($request);

        if (/*$messg*/true===true)
        {//logare
        $credentials=['name'=>$request->name, 'password' =>$request->password];

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('home');
        }

        return back()->withErrors([
            'name' => 'The provided credentials do not match our records.',
        ]);
        }//logare
       /* else
        {
            return back()->withErrors([
                'code' => $messg,
            ]); 
        }*/
    }


    
}
