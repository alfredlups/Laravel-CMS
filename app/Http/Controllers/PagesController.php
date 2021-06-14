<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

use App\Template;
use App\Pages;

use DB;

class PagesController extends Controller
{
    public function index(){

    	$templates = Template::orderBy('is_default','desc')->get();
    	$pages = Pages::where('parent', 'root')->where('is_homepage', 0)->get();
    	$homepage = Pages::where('is_homepage', 1)->count();
    	return view('admin.page-create', compact('templates','pages','homepage'));
    }
    public function create( Request $request ){

    	$homepage = Pages::where('is_homepage', 1)->get()->first();
    	$is_homepage = $request->is_homepage ? 1 : 0;
    	if( $homepage && $is_homepage == 1 ){
    		$homepage->is_homepage = 0;
    		$homepage->update();
    	}

    	$file_name = str_replace(' ', '_', strtolower($request->page_name).".blade.php");	
    	$enabled = $request->enabled ? 1 : 0;
		$meta_title = trim($request->meta_title) != "" ? $request->meta_title : $request->page_name;
		$meta_description= trim($request->meta_description) != "" ? $request->meta_description : $request->page_name; 

    	$page = new Pages();
    	$page->template_id = $request->template_id;
    	$page->name = $request->page_name;
    	$page->slug = $request->page_url;
    	$page->filename = $file_name;
    	$page->parent = $request->parent;
    	$page->enabled = $enabled;
    	$page->is_homepage = $is_homepage;
    	$page->title = $meta_title;
    	$page->meta_description = $meta_description;
    	$page->save();

    	if( $page->save() ){
			Storage::disk('pages')->put($file_name, $request->page_content);
	   		session()->flash('message', 'Page '.$request->page_name.' has been created.');
    	}

    	return redirect()->back();
    }
    public function list(){

    	$pages = Pages::all();

    	return view('admin.page-list', compact('pages'));
    }
    public function view( $id ){

    	$pages = Pages::where('parent', 'root')->where('is_homepage', 0)->get();
    	$page = Pages::find( $id );
    	$templates = Template::all();
    	$is_homepage = Pages::where('is_homepage', 1)->get()->first();
    	if( $is_homepage ){
    		$homepage = $id == $is_homepage->id ? 0 : 1;
    	}else{ $homepage = 0; }
    	
	    $content = Storage::disk('pages')->get($page->filename);

    	return view('admin.page-edit', compact('page', 'templates', 'content','pages', 'homepage'));
    }
    public function update( Request $request ){

    	$homepage = Pages::where('is_homepage', 1)->get()->first();
    	$is_homepage = $request->is_homepage ? 1 : 0;
    	if( $homepage && $is_homepage == 1 ){
    		$homepage->is_homepage = 0;
    		$homepage->update();
    	}

    	$page = Pages::find( $request->page_id );
    	if( $page ){

    		Storage::disk('pages')->delete($request->previous_file);

    		$file_name = str_replace(' ', '_', strtolower($request->page_name).".blade.php");
			Storage::disk('pages')->put($file_name, $request->page_content);

			$enabled = $request->enabled ? 1 : 0;
			$meta_title = trim($request->meta_title) != "" ? $request->meta_title : $request->page_name;
			$meta_description= trim($request->meta_description) != "" ? $request->meta_description : $request->page_name;

			$page->template_id = $request->template_id;
	    	$page->name = $request->page_name;
	    	$page->slug = $request->page_url;
	    	$page->filename = $file_name;
	    	$page->parent = $request->parent;
	    	$page->enabled = $enabled;
	    	$page->is_homepage = $is_homepage;
	    	$page->title = $meta_title;
	    	$page->meta_description = $meta_description;
			$page->update();

		    session()->flash('message', 'Template has been updated.');

    	}

     	return redirect()->back();
    	
    }
    public function delete( Request $request ){
    	$page = Pages::find( $request->page_id );
    	if( $page ){
    		$page->delete();
    		Storage::disk('pages')->delete( $page->filename );
    	}
    	return redirect('/pages/list');
    }
}
