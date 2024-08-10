<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class File extends Model
{
    use HasFactory;

    protected $fillable = ['build_id', 'name', 'path', 'mime_type'];

    public function build()
    {
        return $this->belongsTo(Build::class);
    }
}
