<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebAppItems;

class SiteController extends Controller
{
    public function index(){
        
    	return view('front_page')->withShortcodes();
    }
    public function parts(){
    	return view('parts-and-accessories');
    }
    public function subcategories(){
    	return view('sub-categories');
    }
    public function partsDetails(){
    	return view('parts-details');
    }
    public function newEquipments(){
    	return view('new-equipments');
    }	
    public function newEquipmentsDetails(){
    	return view('new-equipments-details');
    }
    public function usedVehicles(){
    	return view('used-vehicles');
    }
    public function usedVehiclesDetails(){
    	return view('used-vehicles-details');
    }
    public function service(){
    	return view('service');
    }
    public function faqs(){
    	return view('faqs');
    }
    public function partSchematics(){
    	return view('parts-schematics');
    }
    public function partSchematicsDetails(){
    	return view('parts-schematics-details');
    }
    public function affiliationsBrands(){
    	return view('affiliations-brands');
    }
    public function about(){
    	return view('about-us');
    }
    public function contact(){
    	return view('contact-us');
    }
    public function login(){
    	return view('auth.login-dealer');
    }
    public function secure(){
    	return view('dealer-secure-zone');
    }
    public function loginDealer(){
    	return view('auth.login-dealer');
    }
    public function dashboard(){
    	return view('dashboard');
    }
    public function customURL( $slug ){
        echo $slug;
    }
}
