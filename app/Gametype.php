<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gametype extends Model
{
    protected $fillable = [
        'name', 'description',
    ];
}
