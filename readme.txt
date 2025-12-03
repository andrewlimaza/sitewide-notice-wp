=== Sitewide Notice WP ===
Contributors: andrewza, yoohooplugins
Donate link: https://yoohooplugins.com
Tags: sitewide banner, site banner, banner, notice, sitewide notice, popup banner, simple banner, website banner, website notice, site notice, site message, website message bar, website bar message, message bar
Requires at least: 5.2
Tested up to: 6.9
Stable tag: 2.4.2
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Simply add a small message bar to the bottom of each page of your website to display notice messages such as sales, notices and any text messages.

== Description ==
Simply add a small message bar to the bottom of each page of your website to display notice messages such as sales, notices and any text messages.

A lightweight plugin that simply adds a small notification bar that allows you to insert simple text at the bottom of every page of your website as a call-to-action.

= Features =
* Lightweight code that does not slow down your website.
* Choose color of font. (Includes transparency). 
* Choose color of background for the bar. (Includes transparency). 
* Add your own text to the message bar.
* Users are able to close the bar by clicking on the ‘x’.
* When a user closes the bar, automatically hide this notification bar for 24 hours.
* Show/hide notice bar with a checkbox.
* HTML code supported.
* Hide sitewide message on mobile devices.
* Hide sitewide message for logged in users.
* Integrates with [Paid Memberships Pro](https://paidmembershipspro.com) - show notification banner only to members.
* Show notification bar either on top or on the bottom of the screen.

== Installation ==
1. Upload the plugin files to the `/wp-content/plugins/sitewide-notice-wp` directory, or install the plugin through the WordPress plugins screen directly.
2. Activate the plugin through the 'Plugins' screen in WordPress.
3. Use the 'Settings' > 'Sitewide Notice WP' link on the dashboard screen to configure the plugin.
4. Toggle 'Plugin Enable/Disable' to display the notice bar.

== Frequently Asked Questions ==
= Is this plugin free? =

Yes this plugin is totally free! You may donate to our development via Paypal which is found inside the Sitewide Notice page in the dashboard.

= Am I able to add html code to the text of the message bar? =

Yes, you are able to add basic html code to your banner.

= Where is Sitewide Notice WP Settings? =

Navigate to your WordPress dashboard > Settings > Sitewide Notice WP.

= Am I able to add links and other code to the text message? =

Yes, you are able to add basic HTML code to Sitewide Notice WP.

= I need to add custom CSS to my banner =

You may add custom CSS to your WordPress Customizer. This is done by navigating to "Appearance" -> "Customize" -> "Additional CSS".

= Should you have more questions =

Please feel free to contact us for any further questions.

== Screenshots ==
1. Sitewide Notice WP - front view of Sitewide Notice WP.
2. Sitewide Notice WP - Sitewide Notice WP settings page.

== Upgrade Notice ==
= 2.4.2 =
* Upgrade for a minor security improvement to the plugin.

= 2.4 =
* Upgrade for general improvements on loading the notification bar.

= 2.3 =
* Upgrade immediately for SECURITY improvements.

= 2.2 =
* Please upgrade for new features and general improvements.

== Changelog ==
= 2.4.2 - 2025-12-03 =
* SECURITY: Fixed a minor issue of unused code that could be exploited to delete options.

= 2.4 - 2023-01-30 =
* SECURITY: Improved general sanitization and escaping of the plugin where possible.
* ENHANCEMENT: Moved the settings to "Settings" > "Sitewide Notice WP".
* BUG FIX/ENHANCEMENT: Updated library used for WP Color Alpha to support WordPress 5.5+ - Fixes some deprecation warnings.
* BUG FIX/ENHANCEMENT: Improved logic for how the banner is shown when the user closed the notification. 

= 2.3 =
* Security: Fixed a potential XSS issue. Added wp_kses to banner message options.
* Enhancement: Added in filter for frontend banner text `swnza_banner_text`.
* Enhancement: Added in filter for allowed HTML in the banner message options `swnza_message_kses`.

= 2.2 =
* Bug Fix: Support TwentyTwenty theme. Fixed an issue where loading the wp-alpha-color.js was causing issues.
* Enhancement: Added option to hide close button.
* Enhancement: Added filter `swnza_show_banner` as an override to show/hide the bar.
* Enhancement: General styling improvements to the bar to fit things better.

= 2.1 =
* Security: Added in nonces and escaped values when saving.
* Enhancement: Improved UI of text of banner on front-end.

= 2.0.4 =
* Enhancement: Changed close button icon. Uses SVG and supports retina-devices.
* Enhancement: Option to show the notification bar on top or on the bottom of your site.
* Bug Fix: Undefined index in some cases has now been fixed.

= 2.0.3.2 =
* Bug fix with the color picker library.

= 2.0.3.1 =
* Bug fix where WooCommerce checkout would hang.

= 2.0.3 =
* ENHANCEMENT: Integrate with Paid Memberships Pro.

= 2.0.2 =
* BUG FIX: text would appear before page load.
* ENHANCEMENT: hide site wide notice message from logged in users option.

= 2.0.1 =
* Fixed missing files bug.

= 2.0.0 =
* UI interface cleanup.
* ENHANCEMENT: Hide bar for 24 hours when user closes it.
* Speed and Security improvement.

= 1.0.5 =
* BUG FIX: Saved text message showing on wp-login fix.

= 1.0.4 =
* ENHANCEMENT: Hide on mobile.

= 1.0.3 =
* ENHANCEMENT: Custom CSS now supported.

= 1.0.2 =
* ENHANCEMENT: HTML code now supported in the message.

= 1.0.1 =
* ENHANCEMENT: All text is now translatable.

= 1.0 =
* Standard version released.