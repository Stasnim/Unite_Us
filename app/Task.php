<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $guarded = [];

    public function group()
    {
        return $this->belongsTo(Group::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function attachments()
    {
        return $this->hasMany(Attachment::class);
    }

    public function taskdetail()
    {
        return $this->hasOne(TaskDetail::class);
    }
}
