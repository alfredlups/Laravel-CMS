<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Pages;
use App\MenuItem;
use Artisan;

class MenuItemController extends Controller
{
    public function index( $id ){
        Artisan::call('view:clear');
    	$menu  = Menu::find( $id );
    	$menus = MenuItem::where('menu_id', $id)->get();
    	$pages = Pages::where('parent', 'root')->get();
    	return view('admin.menu-item', compact('menu','menus','pages'));
    }
    public function create( Request $request ){
    	
    	$lastRow = MenuItem::latest()->first();
    	
    	$order = $lastRow ? $lastRow->order + 1 : 1;
    	$enabled = $request->enabled ? 1 : 0;
    	$page_id = $request->page_id ? $request->page_id : 0;
    	$theClass = $request->menu_class ? $request->menu_class : 'item';  
    	$theId = $request->attr_id ? $request->attr_id : 'item';  

    	$menu_item = new MenuItem;

    	$menu_item->menu_id = $request->menu_id;
    	$menu_item->page_id = $page_id;
    	$menu_item->name = $request->menu_name;
    	$menu_item->url = $request->menu_url;
    	$menu_item->target = $request->menu_target;
    	$menu_item->parent = $request->menu_parent;
    	$menu_item->order = $order;
    	$menu_item->class_name = $theClass;
    	$menu_item->id_name = $theId;
    	$menu_item->enabled = $enabled;
    	$menu_item->save();

    	session()->flash('message', 'Menu Item has been created.');
    	return redirect()->back();

    }
    public function view( $id ){
        Artisan::call('view:clear');

    	$menu  = MenuItem::find( $id );

 		if( $menu->menu->id ){
 			$menus = MenuItem::where('menu_id', $menu->menu->id)->get();
 		}
    	$pages = Pages::where('parent', 'root')->get();
    	$menu_item = MenuItem::find( $id );

    	return view('admin.menu-item-edit', compact('menu_item','menu','menus','pages'));
    }
    public function update( Request $request ){

    	$menu_item = MenuItem::find( $request->menu_item_id );

    	if( $menu_item ){

    		$enabled = $request->enabled ? 1 : 0;
    		$page_id = $request->page_id ? $request->page_id : 0;
    		$theClass = $request->menu_class ? $request->menu_class : 'item';  
    		$theId = $request->attr_id ? $request->attr_id : 'item';  

	    	$menu_item->page_id = $page_id;
	    	$menu_item->name = $request->menu_name;
	    	$menu_item->url = $request->menu_url;
	    	$menu_item->target = $request->menu_target;
	    	$menu_item->parent = $request->menu_parent;
	    	$menu_item->class_name = $theClass;
	    	$menu_item->id_name = $theId;
	    	$menu_item->enabled = $enabled;
	    	$menu_item->update();
	    	session()->flash('message', 'Menu Item has been updated.');
    	}else{
    		session()->flash('message', 'Menu Item note found.');
    	}
    	return redirect()->back();
    }
    public function delete( Request $request ){
    	$menu_item = MenuItem::find( $request->menu_item_id );
    	if( $menu_item ){
    		$menu_item->delete();
    	}
    	return redirect('/menu/'.$request->menu_id);
    }
    public function sort( Request $request ){
    	$menu_items = $request->sort_array;
    	foreach( $menu_items as $key => $item ) {
    		$id = $item[0];
    		$parent_id = $item[1];	
    		$menu = MenuItem::find( $id );
    		if( $menu ){
    			$menu->parent = $parent_id;
    			$menu->order = $key + 1;
    			$menu->update();
    		}
    	}
    	return $menu_items;
    }
}
