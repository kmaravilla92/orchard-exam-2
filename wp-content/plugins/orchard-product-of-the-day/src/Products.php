<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

use WP_Post;

class Products 
{
    public static function init(): void
    {
        add_filter( 'manage_' . PostType::NAME . '_posts_columns', [static::class, 'addColumns'] );
        add_filter( 'manage_' . PostType::NAME . '_posts_custom_column', [static::class, 'addColumn'], 10, 2 );
    }

    public static function canAddFeatured(
        int $post_id
    ): bool
    {
        $featured_products = get_posts(
            [
                'post_type' => PostType::NAME,
                'meta_query' => [
                    [
                        'key' => '_mark_as_product_of_the_day',
                        'value' => '1',
                    ]
                ],
                'post__not_in'  => [
                    $post_id,
                ],
            ]
        );

        return count( $featured_products ) < get_option( 'featured_product_max_count' );
    }

    public static function getOneRandom(): WP_Post
    {
        $products = get_posts(
            [
                'post_type' => PostType::NAME,
                'post_status' => 'publish',
                'meta_key' => '_mark_as_product_of_the_day',
                'meta_value ' => 1,
                'posts_per_page' => 1,
                'orderby' => 'rand',
            ]
        );

        return $products[0] ?? [];
    }

    public static function addColumns(
        array $columns
    ): array
    {
        $date_column = $columns['date'];
        unset( $columns['date'] );

        $columns['product-of-the-day'] = __( 'Product Of The Day', 'orchard' );
        $columns['date'] = $date_column;
        
        return $columns;
    }

    public static function addColumn(
        string $column_name,
        int $post_id
    ): void
    {
        if ( 'product-of-the-day' === $column_name ) {
            $is_featured = (int) get_post_meta( $post_id, '_mark_as_product_of_the_day', true );
            printf(
                '<b style="color: %s">%s</b>',
                $is_featured ? '#00a32a' : '#d63638',
                $is_featured ? __( 'Yes', 'orchard' ) : __( 'No', 'orchard' )
            );
        }
    }
}