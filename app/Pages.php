<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pages extends Model
{
    public function template() {
		return $this->belongsTo('App\Template','template_id');
	}
}
