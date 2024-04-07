<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $fillable=[
        'user_id',
        'transaction_code',
        'amount',
        'quantity',
        'food_id'
    ];
    public function foods(){
        return $this->belongsTo(Food::class,"food_id");
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
}
