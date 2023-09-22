<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'title',
        'text',
        'date',
        'created_by',
    ];

    public function author()
    {
        return $this->hasOne('App\Models\User', 'id', 'created_by');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}
