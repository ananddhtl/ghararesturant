<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory;
    protected $fillable =['img','file_id','name','profession','description'];
    public function files()
    {
        return $this->belongsTo(Files::class, "file_id");
    }
}
