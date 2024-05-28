<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = ['user_id', 'build_id', 'body'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function build()
    {
        return $this->belongsTo(Build::class);
    }
}