<?php
if ( !defined( 'ABSPATH' ) ) {
    exit;
}

get_header();
?>
    <article>
        <figure>
            <?php echo get_the_post_thumbnail(); ?>
        </figure>
        <h3><?php echo esc_html( get_the_title() ); ?></h3>
        <p><?php echo esc_html( get_the_content() ); ?></p>
        <a href="<?php echo esc_url( home_url() ); ?>">
            < Go Back To Home
        </a>
    </article>
<?php
get_footer();