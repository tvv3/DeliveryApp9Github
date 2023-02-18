<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //noi adaugate de mine

    public function userRole()
    {
        return $this->hasOne(UserRole::class, 'user_id');
    }

    public function comenziSofer()
    {
        return $this->hasMany(Comanda::class, 'sofer_id');
    }

    public function comenziRestaurant()
    {
        return $this->hasMany(Comanda::class, 'restaurant_id');
    }

    public function comenziSoferAzi()
    {
       // $timestamp_today= date_timestamp_get(date_create(date('y-m-d',time())));
       // return $this->comenziSofer()->where('created_at','>=',"$timestamp_today");
        return $this->comenziSofer()->whereRaw('date(created_at) = date(now())')
        ->with(['sofer:id,name','restaurant:id,name']) //nou 14feb2022
        ->orderByDesc('id');
    }

    public function comenziRestaurantAzi()
    {
        //$timestamp_today= date_timestamp_get(date_create(date('y-m-d',time())));
        //getdate() --- curent date and time
        //$timestamp_today= mktime(date_create(date('y-m-d',time())));
        return $this->comenziRestaurant()->whereRaw('date(created_at) = date(now())')
                    ->with(['sofer:id,name','restaurant:id,name']) //nou 14feb2022 //obligatoriu sa aduc id-ul
                    ->orderByDesc('id');
    }

    public function statusSoferAzi()
    {
        if (!isset($this->userRole)) return 'fara rol';
        if ($this->userRole->role!=="sofer23") return 'nu este sofer';
        $comanda_in_curs=$this->comenziSofer()->whereRaw('date(created_at) = date(now())')
                                              ->where('status','<>','Comanda finalizata')->get();

        if ($comanda_in_curs=='[]') {return 'liber';}
        //else
        return 'comanda in curs';
    }

    public function getUser123()
    {
      /*  if (!isset($this->userRole)) return null;
        if ($this->userRole->role!=="sofer23") return null;
        $comanda_in_curs=$this->comenziSofer()->whereRaw('date(created_at) <= date(now())')
                                              ->where('status','<>','Comanda finalizata')->get();

        if ($comanda_in_curs=='[]') {return $this;}
        //else
        return null;*/
        return ($this->statusSoferAzi() == 'liber')? $this : null;

    }

    public function comandaInCursSoferAzi()
    {
        $arr=[];
        if (!isset($this->userRole)) return null;
        if ($this->userRole->role!=="sofer23") return null;
        $comanda_in_curs=$this->comandaInCursSoferAzi2()->get();

        if ($comanda_in_curs=='[]') {return null;}
        //else
        return $comanda_in_curs;
    }

    public function comandaInCursSoferAzi2()
    {
        return $this->comenziSofer()->whereRaw('date(created_at) = date(now())')
                            ->where('status','<>','Comanda finalizata')
                            ->with(['sofer:id,name','restaurant:id,name']) //nou 14feb2022
                            ->orderByDesc('id');
    }

    public function comenziFinalizateSoferAzi()
    {
        $arr=[];
        if (!isset($this->userRole)) return null;
        if ($this->userRole->role!=="sofer23") return null;
        $comanda_in_curs=$this->comenziFinalizateSoferAzi2()->get();

        if ($comanda_in_curs=='[]') {return null;}
        //else
        return $comanda_in_curs;
    }

    public function comenziFinalizateSoferAzi2()
    {
        return $this->comenziSofer()->whereRaw('date(created_at) = date(now())')
                   ->where('status','=','Comanda finalizata')
                   ->with(['sofer:id,name','restaurant:id,name']) //nou 14feb2022
                   ->orderByDesc('id');

    }

    public function comenziNefinalizateRestaurantAzi()
    {
        $arr=[];
        if (!isset($this->userRole)) return null;
        if ($this->userRole->role!=="restaurant23") return null;
        $comanda_in_curs=$this->comenziNefinalizateRestaurantAzi2()->get();

        if ($comanda_in_curs=='[]') {return null;}
        //else
        return $comanda_in_curs;
    }

    public function comenziNefinalizateRestaurantAzi2()
    {
        return $this->comenziRestaurant()->whereRaw('date(created_at) = date(now())')
              ->where('status','<>','Comanda finalizata')
              ->with(['sofer:id,name','restaurant:id,name']) //nou 14feb2022
              ->orderByDesc('id');
    }

    public function isAdmin()
   {
    if (!isset($this->userRole)) return false;
    return $this->userRole->role == "admin23";
   }
}
