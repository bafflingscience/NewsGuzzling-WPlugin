<?php

function create_database_table()
{
    //? https://developer.wordpress.org/reference/classes/wpdb *//
    global $wpdb;
    global $newsapi_db_version;
    
    $newsapi_db_version = '1.0.0';
    
    //* create db table called 'fake_fucking_news' with prefix (DEFAULT is wp_) *//
    $table_name = $wpdb->prefix . "fake_fucking_news";
    
	$charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        title varchar(50),
        author text(30),
        published_date datetime DEFAULT '00-00-0000 00:00:00' NOT NULL,
        link varchar(125),
        clean_url varchar(255),
        summary varchar(500),
        rights varchar(25),
        ranking int(10),
        topic varchar(12),
        authors varchar(50),
        media varchar(125),
        is_opinion varchar(10),
        twitter_account varchar(30),
        _score float(12),
        _id varchar(30),
        PRIMARY KEY  (id)
) $charset_collate;";

  
  require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
  dbDelta( $sql );

  //* Save API call as a Transient *//
  add_option('newsapi_db_version',
  $newsapi_db_version);
}

function save_database_table_info()
{
    global $wpdb;

    $table_name = $wpdb->prefix . 'fake_fucking_news';

    $articles = json_decode(get_option('newsapi_db_info'))->articles;

    foreach ($articles as $article) {
        $wpdb->insert(
            $table_name,
            array(
              'title'          => $article->title,
              'author'         => $article->author,
              'published_date' => $article->published_date,
              'link'           => $article->link,
              'clean_url'      => $article->clean_url,
              'summary'        => $article->summary,
              'rights'         => $article->rights,
              'rank'           => $article->rank,
              'topic'          => $article->topic,
              'authors'        => $article->authors,
              'media'          => $article->media,
              'is_opinion'     => $article->is_opinion,
              'twitter_account'=> $article->twitter_account,
              '_score'         => $article->_score,
              '_id'            => $article->_id
            )
        );
    }
}
