<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function builds()
    {
        return $this->hasMany(Build::class);
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'follows', 'followed_id', 'follower_id');
    }

    public function follows()
    {
        return $this->belongsToMany(User::class, 'follows', 'follower_id', 'followed_id');
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }
}
