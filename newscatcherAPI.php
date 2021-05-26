<?php
/**
 * Plugin Name: NewsGuzzlerWPlugin
 * Plugin URI: https://goodtech.tips
 * Author: g o o d t e c h . t i p s
 * Author URI: https://goodtech.tips
 * Description: Pulls in the latest propaganda from the sources you know you can't trust. Pulled in via newsapi.org
 * Version: 1.0.0
 * Licencse: GPL2
 * License URL: http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain: newscatcherAPI
 * Domain Path: /languages
 */
defined('ABSPATH') or die('You Dead.');

if ( file_exists(dirname( __FILE__ ) . '/vendor/autoload.php')) 
{
    require_once dirname( __FILE__ ) . '/vendor/autoload.php';
}

if (class_exists( 'Inc\\Init')) 
{
    Inc\Init::register_services();
}