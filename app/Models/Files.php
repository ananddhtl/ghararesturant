<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Files extends Model
{
    use HasFactory;
    protected $fillable=['img','title'];
    
    public function about()
    {
        return $this->hasMany(About::class, "file_id");
    }

    public function carousels()
    {
        return $this->hasMany(Carousel::class, "file_id");
    }

    public function foods()
    {
        return $this->hasMany(Food::class, "file_id");
    }

    public function teams()
    {
        return $this->hasMany(Team::class, "file_id");
    }
}
