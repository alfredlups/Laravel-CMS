<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Template;
use App\Menu;
use App\MenuItem;
use App\Pages;

class FrontPagesController extends Controller
{
	public function index(){
		$result = Pages::where('is_homepage', 1)->get()->first();

		if( $result ){
			$page = explode('.', $result->filename)[0];
			$template = explode('.', $result->template->file_name)[0];
    		return view('index', compact('template', 'page'));
		}else{
			return view('404');
		}

	}
  public function getPage( $slug = null ){
  		
  		$slug = '/'.$slug;
  		$page = MenuItem::where('url', $slug)->get()->first();
  		
  		if( $page ){
  			if( $page->page_id ){
  				$template = explode( '.',$page->page->template->file_name )[0];
		  		$page = explode( '.', $page->page->filename )[0];
		    	return view('index', compact('template', 'page'));
  			}else{
  				echo 'Select page for this menu.';
  			}
  		}else{
  			 $page = Pages::where('slug', $slug)->get()->first();
         if( $page ){
            $template = explode( '.',$page->template->file_name )[0];
            $page = explode( '.', $page->filename )[0];
            return view('index', compact('template', 'page'));
         }else{
            return view('404');
         }
  		}	

    }
}
