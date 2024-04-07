<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'quantity', 'price_per_item', 'food_id', 'total_amount', 'esewa_status','food_status'];

    public function foods(){
        return $this->belongsTo(Food::class,"food_id");
    }
    public function user(){
        return $this->belongsTo(User::class,"user_id");
    }
}
