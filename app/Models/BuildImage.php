<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildImage extends Model
{
    use HasFactory;

    protected $fillable = ['build_id', 'path'];

    public function build()
    {
        return $this->belongsTo(Build::class);
    }
}
