<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Modification extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function build()
    {
        return $this->belongsTo(Build::class);
    }

    public function images()
    {
        return $this->hasMany(ModificationImage::class);
    }
}
