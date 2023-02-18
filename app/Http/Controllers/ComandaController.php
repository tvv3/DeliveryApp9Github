<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Comanda;
use App\Models\User;
use App\Models\UserRole;
class ComandaController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function store(Request $request)
    {
        $user=Auth::user();

        if (!isset($user))
         return view('/');

        if  (!isset($user->userRole))
        return view('/home',['role'=>'nedefinit'/*$user->userRole->role*/,'statusErr'=>'Comanda NU a fost creata!']);

        if ($user->userRole->role==='restaurant23')
        {
         $user_id=Auth::Id();
         Comanda::create([
            'descriere' => $request->descriere,
            'status' => 'Comanda noua',
            'restaurant_id' => $user_id,
            'sofer_id' => null,
        ]);
    
        /*
        $comenzi=$user1->comenziRestaurant;
        return view('/home',['role'=>'restaurant','comenzi'=>$comenzi,'status'=>'Comanda a fost creata!']);
         }
         elseif ($user->userRole->role==='sofer23')
         {
        return view('/home',['role'=>'sofer','status'=>'Comanda NU a fost creata!']);
         }
         elseif ($user->userRole->role==='admin23')
         {
        return view('/home',['role'=>'administrator','status'=>'Comanda NU a fost creata!']);
         }
         
        else {return view('/home',['role'=>'neautorizat','status'=>'Comanda NU a fost creata!']); }        
         */
        return back()->with(['status'=>'Comanda a fost creata!']);
        }
        return back()->with(['statusErr'=>'Comanda NU a fost creata!']);
    
    }

    public function preia_comanda(Request $request)
    {
        $user=Auth::user();
        $comanda=Comanda::find($request->comid);

        if (!isset($user))
         return view('/');

        if  (!isset($user->userRole))
        return view('/home',['role'=>'nedefinit','statusErr'=>'Comanda NU a fost preluata!']);

        if (($user->userRole->role==='sofer23')&&($comanda->sofer_id===null)&&
        ($comanda->status==='Comanda noua'))
        {
            $comandaPreluataDeja=$user->comandaInCursSoferAzi();
            if (isset($comandaPreluataDeja))
              { if ($comandaPreluataDeja->where('id','<>',$request->comid)->count()>0)
                  {return back()->with(['statusErr'=>'Comanda nu a fost preluata! Aveti deja alta comanda in curs de livrare si nefinalizata!']);}
              
                }
           $comanda->status='Comanda preluata';
           $comanda->sofer_id=$user->id;
           $comanda->save();
           return back()->with(['status'=>'Comanda a fost preluata cu succes !']);
        }
        return back()->with(['statusErr'=>'Comanda NU a fost preluata cu succes!']);       
    }    

    public function modifica_status_comanda(Request $request)
    {
        $user=Auth::user();
        $comanda=Comanda::find($request->comid);
       
        if (!isset($user))
         return view('/');

        if  (!isset($user->userRole))
        return view('/home',['role'=>'nedefinit','statusErr'=>'Statusul comenzii NU a fost modificat!']);

        if (($user->userRole->role==='sofer23')&&($comanda->sofer_id===$user->id)&&($comanda->status!=='Comanda noua'))
        {
            $comandaPreluataDeja=$user->comandaInCursSoferAzi();
            if (isset($comandaPreluataDeja))
              { if ($comandaPreluataDeja->where('id','<>',$request->comid)->count()>0)
                  {return back()->with(['statusErr'=>'Statusul comenzii NU a fost modificat! Aveti deja alta comanda in curs de livrare si nefinalizata!']);}
              
                }

           $comanda->status=$request->statusnou;
           $comanda->save();
           return back()->with(['status'=>'Statusul comenzii a fost modificat cu succes !']);
        }
        return back()->with(['statusErr'=>'Statusul comenzii NU a fost modificat!']);       
    }    

    public function destroy(Comanda $id)
    {
        $user=Auth::user();

        if (!isset($user))
         return view('/');

        if  (!isset($user->userRole))
        return view('/home',['role'=>'nedefinit'/*$user->userRole->role*/,'statusErr'=>'Comanda NU a fost stearsa!']);

        if ($user->userRole->role!=='restaurant23')
        {
            return view('/home',['role'=>'nedefinit'/*$user->userRole->role*/,'statusErr'=>'Comanda NU a fost stearsa! Nu sunteti logat ca restaurant!']);
   
        }
        if ($user->userRole->role==='restaurant23')
        {
         $user_id=Auth::Id();
         $comanda=$id;//Comanda::where('id',$id)->first(); 
         if (!(isset($comanda))) 
         {
         return back()->with(['statusErr'=>'Comanda NU a fost stearsa! Nu am identicat comanda !']);
         }
         
         if ($comanda->restaurant_id!==$user_id) 
         {
         return back()->with(['statusErr'=>'Comanda NU a fost stearsa! Nu sunteti restaurantul care a creat comanda!']);
         }

         if ($comanda->status!=='Comanda noua') 
         {
         return back()->with(['statusErr'=>'Comanda NU a fost stearsa! Comanda '.$comanda->id.' nu are statusul Comanda noua! Puteti lua legatura cu soferul pentru a finaliza comanda!']);
         }

         $comanda->delete();//stergerea efectiva

        return back()->with(['status'=>'Comanda '.$comanda->id.' a fost stearsa cu succes!']);
        }//if restaurant

        return back()->with(['statusErr'=>'Comanda NU a fost stearsa!']);
    
    }


}
