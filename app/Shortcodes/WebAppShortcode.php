<?php
	
namespace App\Shortcodes;
use App\Snippets;

class WebAppShortcode 
{

  	public function custom($shortcode, $content, $compiler, $name, $viewData)
	{
		
		$snippet = Snippets::find( $shortcode->id );

		$path_file = $snippet->path.$snippet->file_name;

    	$content = \Storage::get( $path_file );

		return $content;	   
	}
  
}	

?>