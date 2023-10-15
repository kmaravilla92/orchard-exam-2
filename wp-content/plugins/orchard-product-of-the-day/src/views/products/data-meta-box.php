<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<p>
    <label for="mark_as_product_of_the_day">
        <input type="hidden" name="mark_as_product_of_the_day" value="0">
        <input type="checkbox" name="mark_as_product_of_the_day" value="1" id="mark_as_product_of_the_day" <?php checked( $mark_as_product_of_the_day ); ?>>
        <b>Yes</b>
        <p><small><em>Mark this product as featured.</em></small></p>
    </label>
</p>