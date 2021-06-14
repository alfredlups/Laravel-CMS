<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

use App\Snippets;
use Auth;

class SnippetsController extends Controller
{
    public function index(){
    	return view('admin.snippets-new');
    }
    public function create( Request $request ){
 
 	   	$file_name = str_replace(' ', '_', strtolower($request->snippet_name).".blade.php");

		$id = Auth::user()->id;

		$snippet = new Snippets();
		$snippet->user_id = $id;
		$snippet->snippet_name =  $request->snippet_name;
		$snippet->file_name = $file_name;
		$snippet->path = '/contentHolders/';
		$snippet->save();

		if( $snippet->save() ){
			Storage::disk('snippets')->put($file_name, $request->snippet_content);
			session()->flash('message', 'Snippet has been saved.');
		}
	
     	return redirect()->back();	
    }
    public function list(){

    	$snippets = Snippets::where('user_id', Auth::user()->id)->get();

    	return view('admin.snippets-list', compact('snippets'));
    }
    public function view( $id ){

    	$snippet = Snippets::find( $id );

    	if( $snippet ){

    		$content = Storage::disk('snippets')->get($snippet->file_name);
    	
    	}

    	return view('admin.snippets-edit', compact('snippet','content'));
    }
    public function update( Request $request ){

    	$snippet = Snippets::find( $request->snippet_id );

    	if( $snippet ){

    		Storage::disk('snippets')->delete( $request->previous_file );

    		$file_name = str_replace(' ', '_', strtolower($request->snippet_name).".blade.php");
			$snippet->snippet_name =  $request->snippet_name;
			$snippet->file_name = $file_name;
			$snippet->path = '/contentHolders/';
			$snippet->update();
			Storage::disk('snippets')->put($file_name, $request->snippet_content);
		    session()->flash('message', 'Snippet has been updated.');
    	}

     	return redirect()->back();
    }
    public function delete( $id ){

    	$snippet = Snippets::find( $id );

    	if( $snippet ){
    		$snippet->delete();
    		Storage::disk('snippets')->delete( $snippet->file_name );
    	}
    	return redirect('/snippets-list');
    }
}
