<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class Activator
{
    public static function init(): void
    {
        register_activation_hook( PLUGIN_FILE, [static::class, 'saveInitialSettings'] );
    }

    public static function saveInitialSettings(): void
    {
        Settings::saveFields(
            [
                'block_title' => 'Product Of The Day!',
                'featured_product_max_count' => 5,
                'report_email_address' => 'kimluari+dev@gmail.com',
            ],
            false
        );
    }
}