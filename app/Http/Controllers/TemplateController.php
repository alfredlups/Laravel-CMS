<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;

use App\Template;
use Auth;

class TemplateController extends Controller
{
    public function index(){
    	return view('admin.template-create');
    }
    public function create( Request $request ){

        $default = Template::where('is_default', 1)->get()->first();
        $status = $request->is_default ? 1 : 0;

        if( $default && $status == 1 ){
            $default->is_default = 0;
            $default->update();
        }    

        $file_name = str_replace(' ', '_', strtolower($request->template_name).".blade.php");

        $template = new Template();
        $template->template_name =  $request->template_name;
        $template->file_name = $file_name;
        $template->path = "/templates/";
        $template->is_default = $status;
        $template->save();

        if( $template->save() ){
            Storage::disk('templates')->put($file_name, $request->template_content);
            session()->flash('message', 'Template has been created.');
        }
     	return redirect()->back();

    }
    public function list(){

    	$templates = Template::all();

    	return view('admin.template-list', compact('templates'));
    }
    public function view( $id ){

    	$template = Template::find( $id );

    	if( $template ){

	    	$content = Storage::disk('templates')->get($template->file_name);

    	}

    	return view('admin.template-edit', compact('template','content'));
    }
    public function update( Request $request ){

        $default = Template::where('is_default', 1)->get()->first();
        $status = $request->is_default ? 1 : 0;

        if( $default && $status == 1 ){
            $default->is_default = 0;
            $default->update();
        }

        $template = Template::find( $request->template_id );
        if( $template ){

            Storage::disk('templates')->delete($request->previous_file);

            $file_name = str_replace(' ', '_', strtolower($request->template_name).".blade.php");
            Storage::disk('templates')->put($file_name, $request->template_content);

            $template->template_name =  $request->template_name;
            $template->file_name = $file_name;
            $template->is_default = $status;
            $template->update();
            session()->flash('message', 'Template has been updated.');

        }
     	return redirect()->back();

    }
    public function delete( Request $request ){
    	$template = Template::find( $request->template_id );
        if( $template ){
            $template->delete();
            Storage::disk('templates')->delete( $template->file_name );
        }
        return redirect('/template/list');
    }
    public function delete_files( $previous_file ) {
    	
    	if(is_file($previous_file)) {        
	        unlink( $previous_file );  
	    	return true;
	    }else{ return false; }	
	}
}
