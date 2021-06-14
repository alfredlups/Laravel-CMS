<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    public function page() {
		return $this->belongsTo('App\Pages','confirm_page');
	}
}
