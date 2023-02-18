<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UserRole;
use App\Models\User;
use App\Models\Comanda;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    
    public function __construct()
    {
       
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function test123() //scos din uz; am sters ruta
    {
        $soferi=User::all();
        $soferi2=[];
        foreach($soferi as $sofer)
        { 
        $val=$sofer->getUser123();
        if (isset($val))
           {$soferi2[]=$sofer;}
        }
        return $soferi2;//$soferi1 ---- nu merge altfel decat cu foreach 
        
    }
    public function index()
    {
        $user1=Auth::user();
        $role1=Auth::user()->userRole; 
        if (!isset($role1)) {return view('home', ['role'=>'nedefinit']);}
        else if ($role1->role==='admin23') {
            //$usersNoRole=User::without('column_From_users_table')->get();
            $usersNoRole=User::doesntHave('userRole')
                             ->select('id','name','email')
                             ->orderBy('id','desc')->get();
            $restaurante=User::whereHas('userRole', function($q){
                $q->where('role', 'restaurant23');
             })
            ->select('id','name')
            ->with('comenziNefinalizateRestaurantAzi2')->get();
             $soferi=User::whereHas('userRole', function($q){
                $q->where('role', 'sofer23');
             })
             ->select('id','name')
             ->with('comandaInCursSoferAzi2')
             ->withCount('comenziFinalizateSoferAzi2 as comenziFinalizateSoferAzi2Count')
             ->get();
            $allcomenzi=Comanda::whereRaw('date(created_at) <= date(now())')
            ->with(['restaurant:id,name','sofer:id,name']) //nou 14feb2022
            ->get()->sortByDesc('id');
            return view('home'/*'ajax'*/, ['role'=>'administrator','comenzi'=>$allcomenzi, 
                        'usersNoRole'=>$usersNoRole,
                         'restaurante'=>$restaurante, 'soferi'=>$soferi]);}
        else if ($role1->role==='restaurant23') {
             $comenzi=$user1->comenziRestaurantAzi;
            return view('home'/*'ajax'*/, ['role'=>'restaurant','comenzi'=>$comenzi]);}
        else if ($role1->role==='sofer23') {
            $comenziSofer=$user1->comandaInCursSoferAzi2;
            $comenziNoi=Comanda::whereRaw('date(created_at) = date(now())')->where('status','=','Comanda noua')->get();
            $com=$user1->comenziFinalizateSoferAzi2;
            if (!isset($com)) {$nrcomfinaliz=0;}
            else {$nrcomfinaliz=$user1->comenziFinalizateSoferAzi2->count();}

            return view('home'/*'ajax'*/,
             ['role'=>'sofer','comenzi'=>$comenziSofer, 
              'comenziNoi'=>$comenziNoi->sortByDesc('id'),
              'comenziFinalizateSofer'=>$user1->comenziFinalizateSoferAzi2,
              'nrcomfinaliz' =>$nrcomfinaliz]);}
        //else
        return view('home', ['role'=>'neautorizat','comenzi'=>null]);
        
    }

    public function test()//scos din uz; am sters ruta
    {
        $user1=Auth::user();
        $role1=Auth::user()->userRole; 
        if (!isset($role1)) {return 'rol nedefinit';}
        else 
        {//rol setat
           if (($role1->role==='admin23')||($role1->role==='sofer23')||($role1->role==='restaurant23'))

           {// rol permis
            //1
            if (session('timeLastData')==null) {$data1="You just refreshed! You last refreshed the page at:";
            //session(['timeLastData' => time()]);
                                 return $data1.' '.session('timeLastData');
                                 }
            //2
           if ($role1->role==='restaurant23')
            {
            $allcomenziCreatedUpdated=$user1->comenziRestaurant->whereRaw('date(created_at) <= date(now())')->whereRaw('UNIX_TIMESTAMP(updated_at) > UNIX_TIMESTAMP("'.gmdate('Y-m-d H:i:s', session('timeLastData')).'")')->count();
            }
           else 
           { if ($role1->role==='sofer23')
               {
                $allcomenziCreatedUpdated=Comanda::whereRaw('UNIX_TIMESTAMP(updated_at) > UNIX_TIMESTAMP("'.gmdate('Y-m-d H:i:s', session('timeLastData')).'")')->count();
                }
               else 
               {
                  $allcomenziCreatedUpdated=Comanda::whereRaw('UNIX_TIMESTAMP(updated_at) > UNIX_TIMESTAMP("'.gmdate('Y-m-d H:i:s', session('timeLastData')).'")')->count();
                }
           }
           //3
           if (isset($allcomenziCreatedUpdated))
           {
               if ($allcomenziCreatedUpdated>0)
               {
               $data1=$allcomenziCreatedUpdated; 
                }
               else {$data1="0";}
            }
           else {$data1="no";}
        
          //4
          $datetime1 = date_create(gmdate("Y-m-d H:i:s", session('timeLastData')));//start time
          $datetime2 = date_create(gmdate("Y-m-d H:i:s", time()));//end time
          $interval = date_diff($datetime1,$datetime2);
            return $data1.' comenzi actualizate. Ati dat refresh la pagina in urma cu : '.$interval->format('%a zile %H:%i:%s');
            ///gmdate("Y-m-d H:i:s", session('timeLastData')));

        }//rol permis admin||sofer||restaurant

        }//rol setat

         return 'rol neautorizat';
    }

    public function ajax2()//scos din uz; am sters ruta
    {
       
       // $_SESSION['timeLastData']=time();//la sfarsit
        $user1=Auth::user();
        $role1=Auth::user()->userRole; 
        if (!isset($role1)) {return view('ajax', ['role'=>'nedefinit']);}
        else if ($role1->role==='admin23') {
            //$usersNoRole=User::without('column_From_users_table')->get();
            $usersNoRole=User::all()->whereNull('userRole');
            $restaurante=User::whereHas('userRole', function($q){
                $q->where('role', 'restaurant23');
             })->get();
             $soferi=User::whereHas('userRole', function($q){
                $q->where('role', 'sofer23');
             })->get();
            $allcomenzi=Comanda::whereRaw('date(created_at) <= date(now())')->get()->sortByDesc('id');
            return view('ajax', ['role'=>'administrator','comenzi'=>$allcomenzi, 
                        'usersNoRole'=>$usersNoRole,
                         'restaurante'=>$restaurante, 'soferi'=>$soferi]);}
        else if ($role1->role==='restaurant23') {
             $comenzi=$user1->comenziRestaurantAzi;
            return view('ajax', ['role'=>'restaurant','comenzi'=>$comenzi]);}
        else if ($role1->role==='sofer23') {
            $comenziSofer=$user1->comandaInCursSoferAzi;
            $comenziNoi=Comanda::whereRaw('date(created_at) <= date(now())')->where('status','=','Comanda noua')->get();
         
            return  view('ajax',
             ['role'=>'sofer','comenzi'=>$comenziSofer, 
            'comenziNoi'=>$comenziNoi->sortByDesc('id'),
             'comenziFinalizateSofer'=>$user1->comenziFinalizateSoferAzi
            ]);
            
        }
        //else
        return view('ajax', ['role'=>'neautorizat','comenzi'=>null]);
       
        
    }
}
