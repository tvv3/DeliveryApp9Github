<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comanda extends Model
{
    use HasFactory;

    protected $table = 'comenzi';

    protected $fillable = [
        'descriere',
        'status',
        'sofer_id',
        'restaurant_id'
    ];

    public function sofer()
    {
        return $this->belongsTo(User::class);
    }

    public function restaurant()
    {
        return $this->belongsTo(User::class);
    }
}
