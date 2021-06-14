<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Form;
use App\FormFields;

class FormFieldsController extends Controller
{
    public function index( $id ){
        $form = Form::find( $id );
        $fields = FormFields::where('form_id', $id)->get();
        
        if( $form ){
            return view('admin.form-fields', compact('form','fields'));
        }
        return redirect()->back();
    }
    public function update( Request $request ){
    	
    	$form_field = new FormFields();
    	$last_order = FormFields::where('form_id',$request->form_id)->orderBy('order','desc')->first()->order;

    	$value = explode(',', $request->fields);

    	$form_field->form_id = $request->form_id;
		$form_field->name = $value[0];
        $form_field->label = $value[1];
        $form_field->type = $value[2];
        $form_field->is_required = $value[3];
        $form_field->options = $request->options;
        $form_field->order = $last_order + 1; 
        if( $form_field->save() ){
        	session()->flash('message','Form fields has been added.');
        }
    	return redirect()->back(); 
    
    }
    public function delete( $id ){
    	$form_field = FormFields::find( $id );
    	if( $form_field ){
    		$form_field->delete();
    	}
    	return redirect()->back();
    }
    public function editItem( $id ){
    	$form_field = FormFields::find( $id );
    	$form = Form::find( $form_field->form_id );
        if( $form_field ){
        	$fields = FormFields::where('form_id', $form_field->form_id)->get();
            return view('admin.form-fields-edit', compact('form_field','fields','form'));
        }
    }
    public function updateItem( Request $request ){
    	$field_item = FormFields::find( $request->form_field_id );
    	if( $field_item ){
    		$value = explode(',', $request->fields);
    			
    		$field_item->name = $value[0];
	        $field_item->label = $value[1];
	        $field_item->type = $value[2];
	        $field_item->is_required = $value[3];
	        $field_item->options = $request->options;
	        $field_item->update();
	        session()->flash('message','Field Item has been updated');
    	}
    	return redirect()->back();
    }
}
