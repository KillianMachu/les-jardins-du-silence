<?php

/**
 * Plugin Name: Ljds Bedroom Manager
 * Plugin URI: https://killianmachu.fr/
 * Description: A plugin to manage bedrooms
 * Version: 1.0
 * Requires PHP: 7.0
 * Requires at least: 5.0
 * Author: Killian Machu
 * Author URI: https://killianmachu.fr/
 * License: GPL-3.0
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Text Domain: ljds-bedroom-manager
 * Domain Path: /languages
 * 
 * @package LjdsBedroomManager
 */

use LjdsBedroomManager\CustomFields;
use LjdsBedroomManager\Filters;
use LjdsBedroomManager\PostType;
use LjdsBedroomManager\Taxonomies;

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

require_once 'inc\PostType.php';
require_once 'inc\Taxonomies.php';
require_once 'inc\CustomFields.php';
require_once 'inc\Filters.php';

//(new Metaboxes())->register();
(new PostType())->register();
(new Taxonomies())->register();
(new CustomFields())->register();
(new Filters())->register();

add_action('plugins_loaded', 'ljds_text_domain_load');

function ljds_text_domain_load()
{
    load_plugin_textdomain( 'ljds-bedroom-manager', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );
}

?>