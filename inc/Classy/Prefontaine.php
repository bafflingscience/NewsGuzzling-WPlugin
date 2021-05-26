<?php
include 'newscatcherAPI.php';

class RunAll {
    public function run_all()
{
    if (false === get_option('newsapi_db_info')) {

        //* assign variable to get_news_api() function *//
        $info_news = get_news_api();

        $articles = json_decode(get_option('newsapi_db_info'))->articles;
        
        '<pre>';
        print_r($articles);
        '</pre>';

        //* Save API call as a Transient *//
        add_option('newsapi_db_info', $info_news);
        return;
    }

    //* Custom TABLES *//
    if (false === get_option('newsapi_db_version')) {
        create_database_table();
    }
    //* Get info stored in the database *//
        save_database_table_info();
    }
 }