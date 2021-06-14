<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenuController extends Controller
{
    public function index(){

    	$menus = Menu::all();
    	return view('admin.menu', compact('menus'));
    }
    public function create( Request $request ){

    	$menu = new Menu();
    	$menu->name = $request->menu_name;
    	$menu->enabled = 1;
    	$menu->save();

    	return redirect()->back();
    }
    public function update( Request $request ){

        $menu = Menu::find( $request->menu_id );
        if( $menu ){
            $menu->name = $request->menu_name;
            $menu->update();
        }

        return redirect()->back();
    }
    public function delete( $id ){
        $menu = Menu::find( $id );
        if( $menu ){
            $menu->delete();
        }
        return redirect()->back();
    }
}
