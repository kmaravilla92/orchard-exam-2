<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class View 
{
    public static function render(
        string $path = '',
        array $vars = []
    ): string
    {   
        ob_start();
        
        $full_path = sprintf(
            '%s%s%s.php',
            PLUGIN_VIEWS_PATH,
            DIRECTORY_SEPARATOR,
            $path
        );

        if ( file_exists( $full_path ) ) {
            extract( $vars );
            include $full_path;
        }

        return ob_get_clean();
    }
}