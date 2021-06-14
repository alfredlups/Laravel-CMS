<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/','FrontPagesController@index')->name('homepage');

Route::get('/parts-and-accessories', 'SiteController@parts')->name('parts');
Route::get('/sub-categories', 'SiteController@subcategories')->name('subcategories');
Route::get('/parts-details', 'SiteController@partsDetails')->name('parts-details');
Route::get('new-equipments', 'SiteController@newEquipments')->name('new-equipments');
Route::get('/new-equipments-details', 'SiteController@newEquipmentsDetails')->name('new-equipments-details');
Route::get('/used-vehicles', 'SiteController@usedVehicles')->name('used-vehicles');
Route::get('/used-vehicles-details', 'SiteController@usedVehiclesDetails')->name('used-vehicles-details');
Route::get('/service', 'SiteController@service')->name('service');
Route::get('/faqs', 'SiteController@faqs')->name('faqs');
Route::get('/parts-schematics', 'SiteController@partSchematics')->name('parts-schematics');
Route::get('/parts-schematics-details', 'SiteController@partSchematicsDetails')->name('parts-schematics-details');
Route::get('/affiliations-brands', 'SiteController@affiliationsBrands')->name('affiliations-brands');
Route::get('/about-us', 'SiteController@about')->name('about-us');
Route::get('/contact-us', 'SiteController@contact')->name('contact');
Route::get('/login_dealer', 'SiteController@loginDealer')->name('login-dealer');
Route::get('/dealer-secure-zone', 'SiteController@secure')->name('secure');

Auth::routes();

Route::group(['middleware' => ['auth','admin']], function () {

	Route::get('/dashboard', 'SiteController@dashboard')->name('dashboard');	

	Route::get('/webapp-new', 'WebAppController@index')->name('webapp');
	Route::post('/webapp-create', 'WebAppController@create')->name('webapp_create');
	Route::get('/webapp-list', 'WebAppController@list')->name('webapp-list');
	Route::get('/webapp-item/{id}', 'WebAppItemController@index')->name('webapp-item');
	Route::post('/webapp-item-create', 'WebAppItemController@create')->name('webapp-item-create');
	Route::get('/webapp-item-list/{id}', 'WebAppItemController@list')->name('webapp-item-list');
	Route::get('/webapp-item-values/{id}', 'WebAppItemController@values')->name('webapp-item-values');
	Route::post('/webapp-list-update', 'WebAppItemController@update')->name('webapp-list-update');
	Route::get('/web-app-item-remove/{id}', 'WebAppItemController@remove')->name('webapp-item-remove');
	Route::post('/web-app-item/delete', 'WebAppItemController@delete')->name('webapp-item-delete');
	Route::get('/snippets', 'SnippetsController@index')->name('snippets');
	Route::post('/snippets-create', 'SnippetsController@create')->name('snippets-create');
	Route::get('/snippets-list', 'SnippetsController@list')->name('snippets-list');
	Route::get('/snippets-edit/{id}', 'SnippetsController@view')->name('snippets-view');
	Route::post('/snippets-update', 'SnippetsController@update')->name('snippets-update');
	Route::get('/snippets-delete/{id}', 'SnippetsController@delete')->name('snippets-delete');
	Route::get('/template', 'TemplateController@index')->name('template-new');
	Route::post('/template/create', 'TemplateController@create')->name('template-create');
	Route::get('/template/list', 'TemplateController@list')->name('template-list');
	Route::get('/template/{id}', 'TemplateController@view')->name('template-view');
	Route::post('/template-update', 'TemplateController@update')->name('template-update');
	Route::post('/template-delete', 'TemplateController@delete')->name('template-delete');
	Route::get('/pages/create', 'PagesController@index')->name('pages-new');
	Route::post('/pages/create', 'PagesController@create')->name('pages-create');
	Route::get('/pages/list', 'PagesController@list')->name('pages-list');
	Route::get('/page/{id}', 'PagesController@view')->name('pages-view');
	Route::post('/page/update', 'PagesController@update')->name('pages-update');
	Route::post('/page/delete', 'PagesController@delete')->name('pages-delete');
	Route::get('/menus', 'MenuController@index')->name('menu');
	Route::post('/menu/create', 'MenuController@create')->name('menu-create');
	Route::post('/menu/update', 'MenuController@update')->name('menu-update');
	Route::get('/menu-delete/{id}', 'MenuController@delete')->name('menu-delete');
	Route::get('/menu/{id}', 'MenuItemController@index')->name('menu-item');
	Route::post('/menu-item/create', 'MenuItemController@create')->name('menu-item-create');
	Route::get('/menu-item/{id}', 'MenuItemController@view')->name('menu-item-edit');
	Route::post('/menu-item/update', 'MenuItemController@update')->name('menu-item-update');
	Route::post('/menu-item/delete', 'MenuItemController@delete')->name('menu-item-delete');
	Route::post('/menu-item/sorting', 'MenuItemController@sort')->name('menu-item-sort');

	Route::get('/laravel-filemanager', '\UniSharp\LaravelFilemanager\Controllers\LfmController@show')->name('file-manager');
    Route::post('/laravel-filemanager/upload', '\UniSharp\LaravelFilemanager\Controllers\UploadController@upload');

    Route::get('/workflow', 'WorkFlowController@index')->name('workflow');
    Route::post('/workflow/create','WorkFlowController@create')->name('workflow-create');
    Route::post('/workflow/update', 'WorkFlowController@update')->name('workflow-update');
    Route::get('/forms', 'FormController@index')->name('forms');
    Route::post('/form/create', 'FormController@create')->name('form-create');
    Route::get('/form/{id}', 'FormController@view')->name('form-item');
    Route::post('/form-details/update', 'FormController@update')->name('form-details-update');
    Route::get('/form-fields/{id}', 'FormFieldsController@index')->name('form-fields');
    Route::post('/form-fields/update', 'FormFieldsController@update')->name('form-fields-update');
    Route::get('/form-fields/delete/{id}', 'FormFieldsController@delete')->name('form-fields-item-delete');
    Route::get('/form-fields/edit/{id}', 'FormFieldsController@editItem')->name('form-fields-item-edit');
    Route::post('/form-fields-item/update', 'FormFieldsController@updateItem')->name('form-fields-item-update');
    Route::get('/form-html/{id}','FormController@formHTML')->name('form-html');
    Route::post('/form/{route}','FormController@submit')->name('web-form');
    Route::get('/form-auto-responder/{id}', 'FormController@autoResponder')->name('form-autoresponder');
    Route::post('/form-auto-responder/update', 'FormController@autoResponderUpdate')->name('form-autoresponder-update');

});

//Route::get('/{slug}', 'FrontPagesController@view')->name('custom-url');
Route::get('{slug}', 'FrontPagesController@getPage')->where('slug', '([A-Za-z0-9\-\/]+)')->name('custom-link');
