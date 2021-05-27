<?php
/**
 * Plugin Name: Newzzler
 * Plugin URI: https://goodtech.tips
 * Author: g o o d t e c h . t i p s
 * Author URI: https://goodtech.tips
 * Description: Pullin' in da news and creating custom post types fo yall
 * Version: 1.0.0
 * Licencse: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: newzzler-plugin
 * Domain Path: /languages
 */
// If file called directly, you dead.
 defined('ABSPATH') or die('You Dead.');

// Composer autoload
if ( file_exists(dirname( __FILE__ ) . '/vendor/autoload.php')) 
{
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}


function activate_newzzler_plugin() 
{
    Things\Base\Activate::activate();
}
register_activation_hook( __FILE__, 'activate_newzzler_plugin' );


function deactivate_newzzler_plugins() 
{
    Things\Base\Deactivate::deactivate();
}

register_deactivation_hook( __FILE__, 'deactivate_newzzler_plugin' );

if ( class_exists( 'Things\\Init' ) ) 
{
    Things\Init::register_services();
}
