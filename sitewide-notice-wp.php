<?php
/**
 * Plugin Name: Sitewide Notice WP
 * Description: Adds a simple message bar to the front-end of your website.
 * Plugin URI: https://yoohooplugins.com
 * Version: 2.1
 * Author: Yoohoo Plugins
 * Author URI: https://yoohooplugins.com
 * License: GPL2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: sitewide-notice-wp
 *
 * Sitewide Notice WP is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * Sitewide Notice WP is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Sitewide Notice WP. If not, see http://www.gnu.org/licenses/gpl.html
 *
**/

defined( 'ABSPATH' ) or exit;

/**
 * INCLUDES
 */
include 'sitewide-notice-settings.php'; //all admin code can be found in here.
include 'includes/functions.php';

class SiteWide_Notice_WP {

    /** Refers to a single instance of this class. */
    private static $instance = null;

    /**
    * Creates or returns an instance of this class.
    *
    * @return  Sitewide_Notice_WP A single instance of this class.
    */
    public static function get_instance() {
        if ( null == self::$instance ) {
            self::$instance = new self;
            self::$instance->hooks();
        }
        return self::$instance;
    } // end get_instance;

    /**
    * Initializes the plugin by setting localization, filters, and administration functions.
    */
    private function __construct() {

    } //end of construct


    private static function hooks() {
        global $pagenow;

        //run this code regardless if the actual banner is activated or not.
        add_action( 'init', array( 'SiteWide_Notice_WP', 'init' ) );

        $swnza_options = get_option( 'swnza_options' );

        if( $swnza_options['active'] && !is_admin() && ( $pagenow !== 'wp-login.php' ) ) {
            add_action( 'wp_footer', array( 'SiteWide_Notice_WP', 'display_sitewide_notice_banner' ) );
            add_action( 'wp_enqueue_scripts', array( 'SiteWide_Notice_WP', 'enqueue_scripts' ) );
        }
    }

    public static function init() {
        if( isset( $_REQUEST['remove_swnza_settings'] ) || !empty( $_REQUEST['remove_swnza_settings'] ) ) {
            delete_option( 'swnza_options' );
        }
    }

    public static function enqueue_scripts() {
        wp_enqueue_style( 'swnza_css', plugins_url( '/css/swnza.css', __FILE__ ) );
        wp_enqueue_script( 'swnza_css', plugins_url( '/js/jquery_cookie.js', __FILE__ ), array( 'jquery' ), '2.1.4', true );
    }

    public static function display_sitewide_notice_banner() {
       $swnza_options = get_option( 'swnza_options' );

        if( ( isset( $swnza_options[ 'hide_for_logged_in' ] ) && ! empty( $swnza_options['hide_for_logged_in'] ) ) && is_user_logged_in() ) {
            return;
        }

        if( $swnza_options[ 'active' ] ) {

            // If show for PMPro members setting is enabled and user doesn't have membership level, return.
            if( isset( $swnza_options['show_for_members'] ) && ! empty( $swnza_options['show_for_members'] ) && !pmpro_hasMembershipLevel() ) {
                return;
            } ?>

            <!-- SiteWide Notice WP Cookies -->
            <script type="text/javascript">
            jQuery(document).ready(function($){

                if( Cookies.get('swnza_hide_banner_cookie') != undefined ) {
                    $('.swnza_banner').hide();
                }

                $('#swnza_close_button_link').click(function(){
                  Cookies.set('swnza_hide_banner_cookie', 1, { expires: 1, path: '/' }); //expire the cookie after 24 hours.

                  $('.swnza_banner').hide();
                });
            });
            </script>

            <!-- SiteWide Notice WP Custom CSS -->
                <style type="text/css">
                    .swnza_banner{
                        position:fixed;
                        min-height:50px;
                        height:auto;
                        width:100%;
                        background:<?php echo sanitize_rgba_color( $swnza_options['background_color'] ); ?>;
                        padding-top:10px;
                        z-index:999;
                        display:block;
                    }  

                    <?php if( isset( $swnza_options['show_on_top'] ) && ! empty( $swnza_options['show_on_top'] ) ) { ?>
                        .admin-bar .swnza_banner { margin-top:32px; }
                        .swnza_banner { top:0; }
                        .swnza_close_button { bottom:-10px; }
                    <?php } else { ?> 
                        .swnza_banner{ bottom:0; }
                        .swnza_close_button { top:-10px;}
                    <?php } ?>   

                    .swnza_banner p {
                        color: <?php echo sanitize_rgba_color( $swnza_options['font_color'] ); ?>;
                        text-align:center;
                        z-index:1000;
                        font-size:20px;
                        display:block;
                        margin: 0;
                    }

                    .swnza_close_button{
                        display:block;
                        position:absolute;
                        right:5px;
                        width:20px;
                        height:20px;
                        background:url("<?php echo plugins_url( 'images/close-button.svg', __FILE__ ); ?>") no-repeat center center;
                        background-color:white;
                        border-radius:100px;
                        border: 1px solid #000;
                    }

                    .swnza_close_button:hover{
                        cursor: pointer;
                    }

                    #swnza_banner_text{
                        margin-top:0;
                    }

                <?php if( $swnza_options[ 'show_on_mobile' ] != 1 ) { ?>
                    @media all and (max-width: 500px){
                    .swnza_banner{
                        display: none;
                    }
                }
                <?php } ?>
                </style>
                <?php } ?>

        <div class="swnza_banner" id="swnza_banner_id">
        <p id="swnza_banner_text"><?php echo htmlspecialchars_decode( stripslashes( $swnza_options['message'] ) ); ?></p>
        <a id="swnza_close_button_link" class="swnza_close_button"></a>
        </div>

    <?php
    }
} //end of class

Sitewide_Notice_WP::get_instance();
