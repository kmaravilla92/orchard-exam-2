<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class AdminNotice 
{
    public static function init()
    {
        add_action( 'admin_notices', [static::class, 'adminNotice'] );
    }

    public static function adminNotice(): void
    {
        $orchard_admin_notice = $_SESSION['orchard_admin_notice'] ?? [];

        if ( empty( $orchard_admin_notice ) ) {
            return;
        }

        echo View::render( 'notices', $orchard_admin_notice );
        $_SESSION['orchard_admin_notice'] = '';
    }
}