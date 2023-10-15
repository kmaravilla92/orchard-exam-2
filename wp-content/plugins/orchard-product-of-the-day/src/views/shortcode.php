<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}
?>
<section>
    <?php if ( $block_title ) { ?>
    <h3><?php echo esc_html( $block_title ); ?></h3>
    <?php } ?>
    <article>
        <figure>
            <?php echo get_the_post_thumbnail( $product ); ?>
        </figure>
        <h3><?php echo esc_html( get_the_title( $product ) ); ?></h3>
        <p><?php echo esc_html( get_the_content( null, false, $product ) ); ?></p>
        <a href="<?php echo esc_url( get_permalink($product ) ); ?>">
            View Product > 
        </a>
    </article>
</section>