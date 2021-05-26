<?php

require 'vendor/autoload.php';

use GuzzleHttp\Client;

function get_news_api() {
  include 'conf.php';
  
  $client = new Client();

  $response = $client->request(
    'GET',
      'https://free-news.p.rapidapi.com/v1/search', [

        'headers' => [
          'x-rapidapi-key' => $apiKey,
          'x-rapidapi-host' => $host
        ],
        'query' => [
          'q' => '"baffled" OR "baffling"',
          'lang' => 'en'
          ]
        ]);

  $body = $response->getBody();
  $response_code = $response->getStatusCode();
  $contents = $body->getContents(); 
  $json = json_decode($contents);

  print_r($json);

    if (401 === $response_code) {
        return "Unauthorized Access";
    }
    if (200 !== $response_code) {
        return "Fucking Ping Error";
    }
    if (200 === $response_code) {
        return $body;
  }
  json_decode( $response->getBody() );
}

//echo get_news_api(); 
