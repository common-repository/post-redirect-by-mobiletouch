<?php
/**
 * Plugin Name: Post Redirect by Mobiletouch
 * Description: Redirect your posts to an external link by adding the url into a new metabox. Simply and efficient!
 * Version: 1.0
 * Author: sipappman,Mobiletouch2
 * Author URI:
 */

defined( 'ABSPATH' ) or exit;

function mobiletouch_postretourl() {
    if( !is_singular() ) return;

    global $post;
    $redirect = esc_url( get_post_meta( $post->ID, 'redirect', true ) );
    if( $redirect ) {
        wp_redirect( $redirect, 301 );
        exit;
    }
}
add_action( 'template_redirect', 'mobiletouch_postretourl' );