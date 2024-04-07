<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reservation extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'name',
        'email',
        'table_id',
        'dateandtime',
        'noofpeople',
        'reseravtion_status',
        'specialrequest'
    ];
    public function user()
    {
        return $this->belongsTo(user::class, "user_id");
    }
    public function table()
    {
        return $this->belongsTo(Table::class, "table_id");
    }
}
