<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class Shortcode 
{
    public static function init(): void
    {
        add_shortcode( 'product_of_the_day', [static::class, 'productOfTheDay'] );
    }

    public static function productOfTheDay(
        $attrs
    ): string
    {
        $product = Products::getOneRandom();

        if ( empty( $product ) ) {
            return '';
        }

        $block_title = get_option( 'block_title' );

        return View::render( 'shortcode', compact( 'product', 'block_title' ) );
    }
}