<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;
    protected $fillable = [
        'name', 'email', 'password',
    ];
    protected $hidden = [
        'password', 'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function groups()
    {
        return $this->hasMany(Group::class, 'admin_id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class);
    }

    public function logs()
    {
        return $this->hasMany(Log::class);
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function requests()
    {
        return $this->hasMany(Request::class, 'sender_id');
    }

    public function taskdetail()
    {
        return $this->hasMany(TaskDetail::class);
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
