<?php
/**
 * Plugin Name: newscatcherWP 
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
defined('ABSPATH') or die;
//include 'newscatch-guzzler.php';
//include 'newscatcher-db.php';

require_once ABSPATH . 'wp-admin/includes/upgrade.php';

class NewsCatchGuzzleWP
{
    public function __construct() 
    {
        add_action('admin_menu', array($this, 'news_add_menu_page'));
        add_action('init', array($this, 'custom_post_type'));
    }
    
    public function news_add_menu_page()
    {
        add_menu_page(
            'Real Fake News',
            'Fake News',
            'manage_options',
            'real-fake-news.php',
            'run_all',
            'dashicons-book',
            16,
        );
    }

    public function activate() {
        //* generated menu, generate CPT, flush rewrite rules *//
        $this->news_add_menu_page();
        $this->custom_post_type();
        flush_rewrite_rules( hard );
     }
   
   public function deactivate() {
        //* Flush rewrite rules *//
    }

   public function uninstall(){
       //* Delete CPT
       //* Delete all the plugin Data from the DB *//
   }
   public function custom_post_type() {
       register_post_type( 
           'news', [
               'public' => true,
               'label' => 'News']);
   }
}

if (class_exists('NewsCatchGuzzleWP')) 
{
    $newscatchguzzlewp = new NewsCatchGuzzleWP();
}

register_activation_hook( __FILE__, array($newscatchguzzlewp, 'activate' ) );
register_deactivation_hook( __FILE__, array($newscatchguzzlewp, 'deactivate') );


