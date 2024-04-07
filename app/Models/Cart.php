<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    use HasFactory;
    protected $fillable=[
        'user_id',
        'quantity',
        'food_id'
    ];
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
    public function food(){
        return $this->belongsTo(Food::class,"food_id");
    }
}
