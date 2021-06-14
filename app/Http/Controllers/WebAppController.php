<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\WebApp;
use App\CustomFields;

class WebAppController extends Controller
{
    public function index(){

    	return view('admin.webapp-create');

    }
     public function create(Request $request){

    	if( $request ){
    		
    		$fields = array('title',true);

    		WebApp::create([
    			'name' => $request->title,
    			'slug' => $request->slug,
    			'description' => $request->description,
    			'fields' => json_encode( $fields )
    		]);

    		$last_id = WebApp::all()->last()->id;

    		if( $last_id ){
    			$cf = new CustomFields();
    			$cf->web_app_id = $last_id;
    			$cf->fields = json_encode(json_decode($request->the_fields));
    			$cf->save();
    		}
    		session()->flash('success', 'WebApp has been created.');
    		return redirect()->back();

    	}

    }
    public function list(){

    	$apps = WebApp::all();
    	return view('admin.webapp-list', compact('apps'));

    }
}
