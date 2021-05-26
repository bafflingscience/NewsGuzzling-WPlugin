<?php

/**
 * Trigger on Plugin Uninstall
 * 
 * @package NewsGuzzler-WPlugin
 */

 if (! defined( 'WP_UNINSTALL_PLUGIN ')) {
   die;
 }

// Clear any shit still stored in the database
$news = get_posts( array( 'post_type' => 'news', 'numberposts' => -1 ));

foreach ($news as $newz ) {
  wp_delete_post($anewz->ID, false);
}

// Access DB via SQL and Delete the shit
global $wpdb;
$wpdb->query("DELETE FROM wp_posts WHERE post_type = 'news'");
$wpdb->query("DELETE FROM wp_postmeta WHERE post_id NOT IN (SELECT id FROM wp_posts)");
$wpdb->query("DELETE FROM wp_term_relationships WHERE object_id NOT IN (SELECT id FROM wp_posts)");


