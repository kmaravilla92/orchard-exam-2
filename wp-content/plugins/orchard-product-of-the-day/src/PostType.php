<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class PostType
{
    const NAME = 'product';

    public static function init(): void
    {
        add_theme_support( 'post-thumbnails' );
        add_action( 'init', [static::class, 'registerProductPostType'] );
    }

    public static function registerProductPostType()
    {
        $labels = [
            'name'                     => __( 'Products', 'orchard' ),
            'singular_name'            => __( 'Product', 'orchard' ),
            'add_new'                  => __( 'Add New', 'orchard' ),
            'add_new_item'             => __( 'Add New Product', 'orchard' ),
            'edit_item'                => __( 'Edit Product', 'orchard' ),
            'new_item'                 => __( 'New Product', 'orchard' ),
            'view_item'                => __( 'View Product', 'orchard' ),
            'view_items'               => __( 'View Products', 'orchard' ),
            'search_items'             => __( 'Search Products', 'orchard' ),
            'not_found'                => __( 'No Products found.', 'orchard' ),
            'not_found_in_trash'       => __( 'No Products found in Trash.', 'orchard' ),
            'parent_item_colon'        => __( 'Parent Products:', 'orchard' ),
            'all_items'                => __( 'All Products', 'orchard' ),
            'archives'                 => __( 'Product Archives', 'orchard' ),
            'attributes'               => __( 'Product Attributes', 'orchard' ),
            'insert_into_item'         => __( 'Insert into Product', 'orchard' ),
            'uploaded_to_this_item'    => __( 'Uploaded to this Product', 'orchard' ),
            'featured_image'           => __( 'Featured Image', 'orchard' ),
            'set_featured_image'       => __( 'Set featured image', 'orchard' ),
            'remove_featured_image'    => __( 'Remove featured image', 'orchard' ),
            'use_featured_image'       => __( 'Use as featured image', 'orchard' ),
            'menu_name'                => __( 'Products', 'orchard' ),
            'filter_items_list'        => __( 'Filter Product list', 'orchard' ),
            'filter_by_date'           => __( 'Filter by date', 'orchard' ),
            'items_list_navigation'    => __( 'Products list navigation', 'orchard' ),
            'items_list'               => __( 'Products list', 'orchard' ),
            'item_published'           => __( 'Product published.', 'orchard' ),
            'item_published_privately' => __( 'Product published privately.', 'orchard' ),
            'item_reverted_to_draft'   => __( 'Product reverted to draft.', 'orchard' ),
            'item_scheduled'           => __( 'Product scheduled.', 'orchard' ),
            'item_updated'             => __( 'Product updated.', 'orchard' ),
            'item_link'                => __( 'Product Link', 'orchard' ),
            'item_link_description'    => __( 'A link to a Product.', 'orchard' ),
        ];
    
        $args = [
            'labels'                => $labels,
            'description'           => __( 'Organize and manage products of the day', 'orchard' ),
            'public'                => true,
            'hierarchical'          => false,
            'exclude_from_search'   => true,
            'publicly_queryable'    => true,
            'show_ui'               => true,
            'show_in_menu'          => Menu::MAIN_SLUG,
            'show_in_admin_bar'     => true,
            'show_in_rest'          => false,
            'menu_position'         => null,
            'menu_icon'             => null,
            'capability_type'       => 'post',
            'supports'              => [
                'title',
                'editor',
                'thumbnail',
            ],
            'taxonomies'            => [],
            'has_archive'           => false,
            'rewrite'               => [
                'slug' => static::NAME,
            ],
            'query_var'             => true,
            'can_export'            => true,
            'delete_with_user'      => false,
            'template'              => [],
            'template_lock'         => false,
        ];

        register_post_type( static::NAME, $args );
    }
}