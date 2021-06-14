<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebApp extends Model
{
    protected $fillable = [
        'name','slug','description','fields',
    ];
}
