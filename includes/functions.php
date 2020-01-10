<?php
/**
 * Functions for Sitewide Notice WP
 */

/**
 * Sanitize RGBA and HEX values.
 * Taken from - https://wordpress.stackexchange.com/questions/257581/escape-hexadecimals-rgba-values
 * @since 2.1
 */
function sanitize_rgba_color( $color ) {
    if ( empty( $color ) || is_array( $color ) )
        return 'rgba(0,0,0,0)';

    // If string does not start with 'rgba', then treat as hex
    // sanitize the hex color and finally convert hex to rgba
    if ( false === strpos( $color, 'rgba' ) ) {
        return sanitize_hex_color( $color );
    }

    // By now we know the string is formatted as an rgba color so we need to further sanitize it.
    $color = str_replace( ' ', '', $color );
    sscanf( $color, 'rgba(%d,%d,%d,%f)', $red, $green, $blue, $alpha );
    return 'rgba('.$red.','.$green.','.$blue.','.$alpha.')';
}