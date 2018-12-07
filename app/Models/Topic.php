<?php

namespace App\Models;

class Topic extends Model
{
    protected $fillable = ['title', 'body', 'excerpt', 'slug'];

    public function link($params = [])
    {
        return route('topics.show', array_merge([$this->id, $this->slug], $params));
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

}
