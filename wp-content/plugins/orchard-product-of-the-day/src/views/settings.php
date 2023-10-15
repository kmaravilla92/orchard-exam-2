<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<div class="wrap">
    <h1>Settings</h1>
    <form action="<?php echo esc_url( admin_url( 'admin-post.php?action=orchard_save_settings' ) ) ?>" method="POST">
        <table class="form-table">
            <tbody>
                <tr>
                    <th scope="row"><label for="block_title">Block Title</label></th>
                    <td><input name="block_title" type="text" id="block_title" value="<?php echo esc_attr( $block_title ); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="featured_product_max_count">Featured Product Max Count</label></th>
                    <td><input name="featured_product_max_count" type="number" id="featured_product_max_count" value="<?php echo esc_attr( $featured_product_max_count ); ?>" class="regular-text" min="1"></td>
                </tr>
                <tr>
                    <th scope="row"><label for="report_email_address">Report Email Address</label></th>
                    <td><input name="report_email_address" type="text" id="report_email_address" value="<?php echo esc_attr( $report_email_address ); ?>" class="regular-text"></td>
                </tr>
                <tr>
                    <td scope="row" style="padding-left: 0;">
                        <button type="submit" class="button button-primary">Save</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </form>
</div>