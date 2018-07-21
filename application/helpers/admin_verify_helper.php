<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('admin_verify_helper'))
{
  function admin_verify($bool=false){
    $has_data = isset($_SESSION['user']);

    if(!$has_data && !$bool)
      redirect('/admin','location');

    return $has_data;
  }
}
