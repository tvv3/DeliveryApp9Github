<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comanda;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class UserRoleController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create_role(Request $request)
    {
        $user=Auth::user();

        if (!isset($user))
         return view('/');

        if  (!isset($user->userRole))
        return view('/home',['role'=>'nedefinit','statusErr'=>'Nu aveti drepturi suficiente!']);

        if ($user->userRole->role==='admin23')
        {
         $user2=User::find($request->user_id)->whereNull('userRole');
         if ($user2==null) {
             return back()->with(['statusErr'=>'Utilizatorul nu a fost identificat sau are deja un rol!']);
         }
         
         if (($request->role!=='sofer23')&&($request->role!=='restaurant23'))
         {
            return back()->with(['statusErr'=>'Acest tip de rol este neautorizat!']);
        }
        UserRole::create([
            'user_id' => $request->user_id,
             'role'=> $request->role
        ]);

        return back()->with(['status'=>'Rolul a fost creat!']);
        }
        return back()->with(['statusErr'=>'Rolul NU a fost creat!']);
    
    }

    public function update_password(Request $request, User $id)
    {
        $user=Auth::user();

        if (!isset($user))
         return view('/');

        if  (!isset($user->userRole))
        return view('/home',['role'=>'nedefinit','statusErr'=>'Nu aveti drepturi suficiente!']);

        if ($user->userRole->role==='admin23')
        {
         $user2=$id;
         if (!isset($user2))
          {
             return back()->with(['statusErr'=>'Utilizatorul nu a fost identificat! Parola nu a fost schimbata!']);
           }
         if  (!isset($user->userRole))
         {
            return back()->with(['statusErr'=>'Utilizatorul nu are rol setat! Parola nu a fost schimbata!']);
          }
         if (($user2->userRole->role!=='sofer23')&&($user2->userRole->role!=='restaurant23'))
           {
            return back()->with(['statusErr'=>'Acestui tip de rol nu i se poate schimba parola! Parola nu a fost schimbata!']);
           }

        $validated=$request->validate([
            'parolaNoua' => ['required', 'string', Password::min(8)
            ->letters()
            ->mixedCase()
            ->numbers()
            ->symbols()
           /*->uncompromised() , 'confirmed'*/],
        ]);

        //$user este cel autentificat = admin-ul si user2 userul de updatat
        $user2->password=Hash::make($request->parolaNoua);
        $user2->save();

        return back()->with(['status'=>'Parola userului '.$user2->name.' a fost schimbata!']);
        /*}
        else
        {
          return back()->with(['statusErr'=>'Parola userului NU a fost schimbata! 
          Eroare validare parola noua!']); 
        }*/

        }//userul autentificat este administrator

        return back()->with(['statusErr'=>'Parola NU a fost schimbata!']);
    
    }

   
}
