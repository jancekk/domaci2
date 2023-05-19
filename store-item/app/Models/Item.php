<?php

namespace App\Models;
use App\Models\Buyer;
use App\Models\User;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $guarded = [

    ];

    public function buyers(){
        return $this->hasMany(Buyer::class);
    }

    public function users(){
        return $this->belongsTo(User::class);
    }

    
}
