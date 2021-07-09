<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'admin_id');
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
        return $this->hasMany(Request::class);
    }
}
