<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\WebAppItems;
use App\Snippets;
use App\MenuItem;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Blade::directive('webapp_banner', function ($expression) {
            
            list($variable, $value) = explode(',', $expression, 2);
            $variable = trim(str_replace('\'', '', $variable));
            
            if (! starts_with($variable, '$')) {
                $variable = '$' . $variable;
            }

            $value = trim($value);

            $id = $value;
            $webapp_item = WebAppItems::where('web_app_id', $id )->get();

            $cf_values = array();
            foreach( $webapp_item as $key => $item ) {
               array_push( $cf_values, json_decode( $item["custom_fields_values"] ) );
            }
            $value = json_encode($cf_values);
            return "<?php {$variable} = json_decode('{$value}'); ?>";//
        
        });

        Blade::directive('webapp_partners', function ($expression) {
            
            list($variable, $value) = explode(',', $expression, 2);
            $variable = trim(str_replace('\'', '', $variable));
            
            if (! starts_with($variable, '$')) {
                $variable = '$' . $variable;
            }

            $value = trim($value);

            $id = $value;
            $webapp_item = WebAppItems::where('web_app_id', $id )->get();

            $cf_values = array();
            foreach( $webapp_item as $key => $item ) {
               array_push( $cf_values, json_decode( $item["custom_fields_values"] ) );
            }
            $value = json_encode($cf_values);
            return "<?php {$variable} = json_decode('{$value}'); ?>";
        
        });

        Blade::directive('module_contentholder', function ($expression) {
            
            list($variable, $value, $type) = explode(',', $expression, 3);           
            $variable = trim(str_replace('\'', '', $variable));
            
            if (! starts_with($variable, '$')) {
                $variable = '$' . $variable;
            }

            $value = trim($value);
            $type = trim($type);
            $id = $value;

            if( $type == "snippet" ){

                $snippet = Snippets::find( $id );
                if( $snippet ){

                    $config = \Config::get('view.paths')[0];
                    $file = $config.$snippet->path.$snippet->file_name;
                    return "<?php include('{$file}'); ?>";

                }else{
                    return 'Snippet not found.';
                }
            }else{
                return "<?php {$variable} = '{$value}'; ?>";
            }
        
        });
        
        Blade::directive('module_menus', function ($expression) {

            list($variable, $value, $id) = explode(',', $expression, 3);
            $variable = trim(str_replace('\'', '', $variable));
            if (! starts_with($variable, '$')) {
                $variable = '$' . $variable;
            }
            
            $menu_items = MenuItem::where('menu_id', $id )->orderBy('order','asc')->get();

            $value = json_encode( json_decode( $menu_items ) );

            return "<?php {$variable} = json_decode('{$value}'); ?>";

        });
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
