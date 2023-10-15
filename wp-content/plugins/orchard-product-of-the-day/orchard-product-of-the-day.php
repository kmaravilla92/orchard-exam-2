<?php
/*
 * Plugin Name:       Orchard Product Of The Day Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       .
 * Version:           1.0.0
 * Requires at least: 6.3.2
 * Requires PHP:      7.4
 * Author:            Kim Maravilla
 * Author URI:        https://kimmaravilla.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://kimmaravilla.com/orchard/exam-2
 * Text Domain:       orchard
 * Domain Path:       /languages
 */

namespace Orchard\ProductOfTheDay;

if ( !defined( 'ABSPATH' ) ) {
    exit;
}

require_once 'vendor/autoload.php';

if ( !session_id() ) {
    session_start();
}

define( 'PLUGIN_FILE', __FILE__ );
define( 'PLUGIN_DIR_PATH', plugin_dir_path( __FILE__ ) );
define( 'PLUGIN_DIR_URL', plugin_dir_url( __FILE__ ) );
define( 'PLUGIN_VIEWS_PATH', PLUGIN_DIR_PATH . 'src/views/' );

PostType::init();
Products::init();
Shortcode::init();

if ( is_admin() ) {
    AdminNotice::init();
    Menu::init();
    Settings::init();
    ProductMetaBox::init();
    Activator::init();
}