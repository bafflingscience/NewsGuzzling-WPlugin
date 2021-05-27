<?php
/**
 * @package Newzzler
 */

namespace Things\Api\Callbacks;

use Things\Base\BaseController;

class AdminCallbacks extends BaseController
{
  public function adminDashboard()
  {
    return require_once("$this->plugin_path/templates/admin.php");
  }

  public function adminCpt()
  {
    return require_once("$this->plugin_path/templates/cpt.php");
  }

  public function adminTaxonomy()
  {
    return require_once("$this->plugin_path/templates/taxonomy.php");
  }
  
  public function adminWidget()
  {
    return require_once("$this->plugin_path/templates/widget.php");
  }
  
  public function newzzlerOptionsGroup( $input )
 {
   return $input;
 }
 
 public function newzzlerAdminSection()
 {
   echo "Nice section. Not.";
 }

 public function newzzlerTextExample()
 {
   $value = esc_attr( get_option( 'text_example ') );
   echo '<input type="text" class="regular-text" name="text-example" value="' . $value . '" placeholder="Write Here">';
 }

 public function newzzlerFirstName()
 {
   $value = esc_attr( get_option( 'first_name '));
   echo '<input type="text" class="regular-text" name="first_name" value="' . $value . '" placeholder="Write name here.">'; 
 }
}