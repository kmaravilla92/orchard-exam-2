<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="notice notice-<?php echo esc_html( $type ); ?> is-dismissible">
    <p><?php echo esc_html( $message ); ?></p>
</div>