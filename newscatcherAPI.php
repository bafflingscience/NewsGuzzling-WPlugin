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

class NewsGuzzler
{
    public function __construct() 
    {
        add_action('admin_menu', array($this, 'news_add_menu_page'));
        $this->create_post_type();

     // add_action('admin_enqueue_scripts', array($this, 'enqueue'));
    }

    public function register() {
        add_action('admin_enqueue_scripts', array($this, 'enqueue'));
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
        $this->create_post_type();
        flush_rewrite_rules( hard );
     }
   
   public function deactivate() {
        //* Flush rewrite rules *//
    }

   public function uninstall(){
       //* Delete CPT
       //* Delete all the plugin Data from the DB *//
   }
   protected function create_post_type() {
       register_post_type( 
           'news', [
               'public' => true,
               'label' => 'News']);
   }

   public function enqueue() {
    wp_enqueue_style( 'style', plugins_url( '/assets/style.css', __FILE__ ), array(''), false, 'all' );
    wp_enqueue_scripts( 'script', plugins_url( '/assets/scriptual.css', __FILE__ ), array(''), false, 'all' );
   }
}

class PostWithMost extends NewsGuzzler
{
    public function register_post_type() {
        $this->create_post_type();
    }
}

$postwithmost = new PostWithMost();
$postwithmost->register_post_type();

if (class_exists('NewsCatchGuzzleWP')) {
    $newsguzzler = new NewsGuzzler();
    $newsguzzler->register();
}



register_activation_hook( __FILE__, array($newsguzzler, 'activate' ) );
register_deactivation_hook( __FILE__, array($newsguzzler, 'deactivate') );


