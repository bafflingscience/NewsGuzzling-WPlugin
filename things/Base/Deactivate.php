<?php
/**
 * @package Newzzler
 */
namespace Things\Base;

class Deactivate
{
      public static function deactivate()
      {
          flush_rewrite_rules();
      }
}
