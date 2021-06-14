<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MenuItem extends Model
{
    public function menu() {
		return $this->belongsTo('App\Menu','menu_id');
	}
	public function page() {
		return $this->belongsTo('App\Pages','page_id');
	}
}
