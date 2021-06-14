<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WorkFlow;

class WorkFlowController extends Controller
{
    public function index(){

    	$workflow = WorkFlow::all();

    	return view('admin.workflow', compact('workflow'));
    }
    public function create( Request $request ){
    	
    	$workflow = new WorkFlow();
    	$workflow->name = $request->name;
    	$workflow->emails = $request->emails;
    	$workflow->save();
    	
    	return redirect()->back();
    }
    public function update( Request $request ){

    	$workflow = WorkFlow::find( $request->id );
    	if( $workflow ){
    		$workflow->name = $request->name;
    		$workflow->save();
    	}

    	return redirect()->back();
    }
}
