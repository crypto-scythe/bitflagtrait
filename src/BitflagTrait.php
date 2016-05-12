<?php

namespace crypto_scythe;

/*
 * BitflagTrait is used to set / retrieve bitflags
 *
 * @access    public
 * @author    Chris Fasel <crypto.scythe@gmail.com>
 * @copyright Copyright (c) 2016, Chris Fasel
 * @license   http://opensource.org/licenses/MIT
 *
 */

trait BitflagTrait {

  final protected function isBitflagSet( &$property, $flag ) {
    
    return ( ($property & $flag ) == $flag );
    
  }

  final protected function setFlag( &$property, $flag, $value ) {
    
    if( $value ) {
      
      $property |= $flag;
      
    } else {
      
      $property &= ~$flag;
      
    }
    
  }
  
}
