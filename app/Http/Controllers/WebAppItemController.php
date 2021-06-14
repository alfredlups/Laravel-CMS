<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebApp;
use App\WebAppitems;
use App\CustomFields;
use DB;

class WebAppItemController extends Controller
{
    public function index( $id ){

    	$fields = CustomFields::where('web_app_id', $id)->get()->first();
    	
    	return view('admin.webapp-item-create', compact('fields'));
    }
    public function create( Request $request ){
 
    	$data = $request->except('_token','web_app_id','custom_fields_id','item_name','details_slug','release_date','expiry_date','enabled');

        $custom_fields = CustomFields::find( $request->custom_fields_id );

        $custom_fields = json_decode( $custom_fields->fields );

        $fields_value = [];
        foreach( $custom_fields as $custom_field ){
            foreach ( $data as $key => $value ) {
                if( $custom_field[1] == $key ){
                    if( $key  == 'file'){
                        if ($request->hasFile('file')) {
                            $imageName = time().'.'.$request->file->getClientOriginalExtension();
                            $fields_value[ $key ] = $imageName;
                        }
                    }else{
                        $fields_value[ $key ] = $value;
                    }
                }
            }
        }
        if ($request->hasFile('file')) {
            $imageName = time().'.'.$request->file->getClientOriginalExtension();
            $request->file->move(public_path('uploads'), $imageName);
            $fields_value[ $key ] = $imageName;
        }

        $enabled = $request->enabled ? 1 : 0;

	   	WebAppitems::create([
            'web_app_id' => $request->web_app_id,
            'custom_fields_id' => $request->custom_fields_id,
            'item_name' => $request->item_name,
            'details_slug' => $request->details_slug,
            'custom_fields_values' => json_encode($fields_value), 
            'release_date' => $request->release_date,
            'expiry_date' => $request->expiry_date,
            'enabled' => $enabled,
        ]);

	   	session()->flash('success', 'WebApp item has been created.');
	   	return redirect()->back();
    }
    public function list( $id ){
    	
    	$fields = WebAppitems::where('web_app_id', $id)->get();
    	$app = WebApp::find( $id );

    	return view('admin.webapp-item-list', compact('fields', 'app'));
    
    }
    public function values( $id ){
    	
    	$fields = WebAppitems::find( $id );
        $app_field = CustomFields::find( $fields->custom_fields_id );

    	$release_date = $fields->release_date; 
        $expiry_date = $fields->expiry_date;
        
        $values =  json_decode( $fields->custom_fields_values );
        
        return view('admin.webapp-list-values', compact('fields','app_field','values','release_date','expiry_date'));
    
    }
    public function update( Request $request ){

    	$data = $request->except('_token','web_app_id','custom_fields_id','web_app_item_id','item_name','details_slug','release_date','expiry_date','enabled');

        $fields_value = [];
        foreach ( $data as $key => $value ) {
            if( $key  == 'file'){
                if ($request->hasFile('file')) {
                    $imageName = time().'.'.$request->file->getClientOriginalExtension();
                    $request->file->move(public_path('uploads'), $imageName);
                    $fields_value[ $key ] = $imageName;
                }
            }else if( $key == 'photo_orig' ){
                $fields_value[ 'file' ] = $value; 
            }else{
                $fields_value[ $key ] = $value;
            }
        }

        $enabled = $request->enabled ? 1 : 0;
        
       	$fields_items = WebAppitems::find( $request->web_app_item_id );
	   
        if( $fields_items ){
            $fields_items->item_name = $request->item_name;
            $fields_items->details_slug = $request->details_slug;
            $fields_items->custom_fields_values = json_encode( $fields_value );
            $fields_items->release_date = $request->release_date;
            $fields_items->expiry_date = $request->expiry_date;
            $fields_items->enabled = $enabled;
            $fields_items->update();
            session()->flash('success', 'WebApp item has been updated.');
        }
    	
    	return redirect()->back();
    }
    public function remove( $id ){

        $webapp_item = WebAppitems::find( $id );

        if( $webapp_item ){

            $webapp_item->delete();
            
        }
        
        return redirect()->back();
    }
    public function delete( Request $request ){
        $webappItem =  WebAppitems::find( $request->webapp_item_id );
        if( $webappItem ){
            $webappItem->delete();
            return redirect('/webapp-item-list/'.$request->webapp_id);
        }
    }
}
