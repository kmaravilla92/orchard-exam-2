<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class Menu 
{
    const MAIN_SLUG = 'product-of-the-day';

    public static function init(): void
    {
        add_action( 'admin_menu', [static::class, 'addMenuPage'] );
        add_action( 'admin_menu', [static::class, 'addSubmenuPage'] );
    }

    public static function addMenuPage(): void
    {
        add_menu_page(
            'Product Of The Day',
            'Product Of The Day',
            'manage_options',
            static::MAIN_SLUG,
            '',
            'dashicons-products',
            20
        );
    }

    public static function addSubmenuPage(): void
    {
        add_submenu_page(
            static::MAIN_SLUG,
            'Settings',
            'Settings',
            'manage_options',
            'orchard-product-of-the-day-settings',
            [Settings::class, 'edit'],
            30
        );
    }
}