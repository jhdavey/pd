<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModificationImage extends Model
{
    use HasFactory;

    protected $fillable = ['modification_id', 'image_path'];

    public function modification()
    {
        return $this->belongsTo(Modification::class);
    }
}
