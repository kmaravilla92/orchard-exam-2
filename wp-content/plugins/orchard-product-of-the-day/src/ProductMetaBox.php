<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

use WP_Post;

class ProductMetaBox 
{
    public static function init(): void
    {
        add_action( 'add_meta_boxes', [static::class, 'addProductMetaBox'] );
        add_action( 'save_post', [static::class, 'savePostData'] );
    }

    public static function addProductMetaBox(): void
    {
        add_meta_box(
            'orchard_product_meta_box',
            __( 'Product Of The Day', 'orchard' ),
            [static::class, 'productMetaBoxHTML'],
            PostType::NAME
        );
    }

    public static function productMetaBoxHTML(
        WP_Post $post
    ): void
    {
        $mark_as_product_of_the_day = get_post_meta( $post->ID, '_mark_as_product_of_the_day', true );
        
        echo View::render( 'products/data-meta-box', compact( 'post', 'mark_as_product_of_the_day' ) );
    }

    public static function savePostData(
        int $post_id
    ): void
    {
        if ( array_key_exists( 'mark_as_product_of_the_day', $_POST ) ) {
            $mark_as_product_of_the_day = (int) $_POST['mark_as_product_of_the_day'];
            
            if (
                1 === $mark_as_product_of_the_day
                && !Products::canAddFeatured( $post_id )
            ) {
                $_SESSION['orchard_admin_notice'] = [
                    'type' => 'error',
                    'message' => __(
                        sprintf(
                            'Max featured products count reached. Only max of %s of featured products can exist!',
                            get_option( 'featured_product_max_count' )
                        )
                        , 'orchard'
                    ),
                ];

                update_post_meta(
                    $post_id,
                    '_mark_as_product_of_the_day',
                    0
                );

                wp_safe_redirect(
                    get_edit_post_link( $post_id, null )
                );
                exit;
            }

            update_post_meta(
                $post_id,
                '_mark_as_product_of_the_day',
                sanitize_text_field( $mark_as_product_of_the_day )
            );
        }
    }
}