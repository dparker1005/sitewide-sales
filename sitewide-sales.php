<?php
/**
 * Plugin Name: Sitewide Sales
 * Plugin URI: https://sitewidesales.com
 * Description: Run Black Friday, Cyber Monday, or other flash sales on your WordPress-powered eCommerce or membership site.
 * Author: Stranger Studios
 * Author URI: https://www.strangerstudios.com
 * Version: 1.1
 * Plugin URI:
 * License: GNU GPLv2+
 * Text Domain: sitewide-sales
 *
 * @package sitewide-sales
 */
namespace Sitewide_Sales;

defined( 'ABSPATH' ) || die( 'File cannot be accessed directly' );

define( 'SWSALES_VERSION', '1.1' );
define( 'SWSALES_DIR', dirname( __FILE__ ) );
define( 'SWSALES_BASENAME', plugin_basename( __FILE__ ) );

require 'autoload.php';

// Handles registering banners and displaying banners on frontend.
classes\SWSales_Banners::init();

// Sets up shortcode [sitewide_sales] and landing page-related code.
classes\SWSales_Landing_Pages::init();

// Handles displaying/saving metaboxes for Sitewide Sale CPT and
// returning from editing a discount code/landing page associated
// with Sitewide Sale.
classes\SWSales_MetaBoxes::init();

// Sets up Sitewide Sale CPT and associated menu.
classes\SWSales_Post_Types::init();

// Generates report pages and enqueues JS to track interaction
// with Sitewide Sale.
classes\SWSales_Reports::init();

// Sets up pmpro_sitewide_sale option.
classes\SWSales_Settings::init();

// Enqueues scripts and does other administrative things.
classes\SWSales_Setup::init();

// Enqueues settings for privacy policy page
classes\SWSales_Privacy::init();

// Handle templates
classes\SWSales_Templates::init();

// Add blank page template
classes\SWSales_Page_Template::init();

// Add a general About admin page.
classes\SWSales_About::init();

// Add a license admin page.
classes\SWSales_License::init();

// Helper functions
require_once ( 'includes/functions.php' );
require_once ( 'includes/license.php' );

// Load Ecommerce Modules
function swsales_load_modules() {
	require_once SWSALES_DIR . '/modules/class-swsales-module-pmpro.php';
	require_once SWSALES_DIR . '/modules/class-swsales-module-wc.php';
	require_once SWSALES_DIR . '/modules/class-swsales-module-custom.php';
	require_once SWSALES_DIR . '/modules/class-swsales-module-edd.php';
}
add_action( 'init', 'Sitewide_Sales\\swsales_load_modules', 1 );
