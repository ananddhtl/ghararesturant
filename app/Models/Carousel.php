<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Carousel extends Model
{
    use HasFactory;
    protected $fillable=['img','title','file_id'];
    public function files()
    {
        return $this->belongsTo(Files::class, "file_id");
    }
}
