<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Data extends Model
{
    protected $fillable = [
        'temperature', 'humidity', 'date', "time", 'city'
    ];
}