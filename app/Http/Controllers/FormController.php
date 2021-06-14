<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Form;
use App\FormFields;
use App\Workflow;
use App\Pages;

class FormController extends Controller
{
    public function index(){
    	$forms = Form::all();
    	return view('admin.form', compact('forms'));
    }
    public function create( Request $request ){
        $form = new Form();
    	$form->name = $request->name;
        $form->form_route = $this->str_random(8);

    	if( $form->save() ){
            $last_id = Form::all()->last()->id;
            $default_fields = [['first_name','First Name','text',1],['last_name','Last Name','text',1],['email','Email','email',1]];

            foreach( $default_fields as $key => $default ){
                $fields = new FormFields();
                $fields->form_id = $last_id; 
                $fields->name = $default[0];
                $fields->label = $default[1];
                $fields->type = $default[2];
                $fields->is_required = $default[3];
                $fields->order = $key + 1;
                $fields->save();
            }
            
        }
    	return redirect()->back();
    }
    public function view( $id ){
    	$form = Form::find( $id );
        $workflow = Workflow::all();
        $pages = Pages::all();

    	if( $form ){
    		return view('admin.form-edit', compact('form','workflow','pages'));
    	}
    	return redirect()->back();
    }
    public function update( Request $request ){

        $form = Form::find( $request->form_id );

        if( $form ){
            $autoresponder = $request->is_autoresponder ? 1 : 0;
            $confirmpage = $request->page_id ? $request->page_id : 0;

            $form->name = $request->name;
            $form->workflow_id = $request->workflow_id;
            $form->is_auto_responder = $autoresponder;
            $form->confirm_page = $confirmpage;
            $form->update();
            session()->flash('message','Form details has been updated');
        }

         return redirect()->back();
    }
    public function str_random($length = 16){

        $pool = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

        return substr(str_shuffle(str_repeat($pool, $length)), 0, $length);
    }
    public function formHTML( $id ){
        $form = Form::find( $id );
        $fields = FormFields::where('form_id', $id)->get();

        return view('admin.form-html', compact('form','fields'));
    }
    public function autoResponder( $id ){
        $form = Form::find( $id );
        $fields = FormFields::where('form_id', $id)->get();

        return view('admin.form-autoresponder', compact('form','fields'));
    }
    public function autoResponderUpdate( Request $request ){
        $form = Form::find( $request->form_id );
        if( $form ){
            $form->resp_subject = $request->subject;
            $form->resp_from_email = $request->email;
            $form->resp_from_name = $request->name;
            $form->resp_email_content = $request->content;
            $form->update();
            session()->flash('message', 'Form Autoresponder has been updated.');
        }
        return redirect()->back();
    }
    public function submit( Request $request ){

        
        
    }
}
