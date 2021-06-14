<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WebAppItems extends Model
{
	protected $fillable = [
        'web_app_id','custom_fields_id','item_name','details_slug','custom_fields_values','release_date','expiry_date','enabled',
    ];
    public function webApp(){
    	return $this->belongsTo('App\WebApp','web_app_id');
    }
    public function custom_fields(){
    	return $this->belongsTo('App\CustomFields','custom_fields_id');
    }
}
