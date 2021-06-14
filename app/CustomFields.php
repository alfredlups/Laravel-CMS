<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomFields extends Model
{
    public function webApp(){
    	return $this->belongsTo('App\WebApp','web_app_id');
    }
}
