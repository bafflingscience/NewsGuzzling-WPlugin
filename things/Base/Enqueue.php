<?php
/**
* @package Newzzler
*/

namespace Things\Base;

use \Things\Base\BaseController;

class Enqueue extends BaseController
{
  public function register() 
  {
    add_action( 'admin_enqueue_scripts', array( $this, 'enqueue' ));
  }

  function enqueue() 
  {
    wp_enqueue_style( 'morestyle', 'PLUGIN_URL' . 'assets/morestyle.css');
    wp_enqueue_scripts( 'scriptual', 'PLUGIN_URL' . 'assets/scriptual.js');
  }
}