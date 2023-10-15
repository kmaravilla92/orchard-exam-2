<?php
namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

class Settings
{
    const FIELD_KEYS = [
        'block_title',
        'featured_product_max_count',
        'report_email_address',
    ];

    public static function init(): void
    {
        add_action( 'admin_post_orchard_save_settings', [static::class, 'save'] );
    }

    public static function edit(): void
    {
        echo View::render( 'settings', static::getFields() );
    }

    public static function save()
    {
        static::saveFields( $_POST ?: [] );

        $_SESSION['orchard_admin_notice'] = [
            'type' => 'success',
            'message' => __( 'Settings successfully saved.', 'orchard' ),
        ];

        wp_safe_redirect(
            admin_url( 'admin.php?page=orchard-product-of-the-day-settings' )
        );
        exit;
    }

    public static function getFields(): array
    {
        $fields = [];
        
        foreach ( static::FIELD_KEYS as $field_key ) {
            $fields[$field_key] = get_option( $field_key );
        }

        return $fields;
    }

    public static function saveFields(
        array $data = [],
        bool $force = true
    ): void
    {
        foreach ( static::FIELD_KEYS as $field_key ) {
            $value_to_save = sanitize_text_field( $data[$field_key] ?? '' );
            if ( $force ) {
                update_option( $field_key, $value_to_save );
            } else {
                $option_value = get_option( $field_key );

                if ( false === $option_value ) {
                    update_option( $field_key, $value_to_save );
                }
            }
        }
    }
}