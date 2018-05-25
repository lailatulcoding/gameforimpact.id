<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gamepropose extends Model
{
    protected $fillable = [
        'name', 'description',
    ];


    public function type()
    {
        return $this->belongsToMany(Gametype::class);
    }

    public function proposer()
    {
        return $this->belongsToMany(Propose::class);
    }
}
