<?php

  if ( ! function_exists('isLogin'))
  {
    function isLogin(){
      $CI =& get_instance();

      if (!str_contains(current_url(), 'logout')) {
        if ($CI->session->admin) {
          redirect('admin');
        }
      }
    }
  }

  if ( ! function_exists('isAdmin'))
  {
    function isAdmin(){
      $CI =& get_instance();
      
      if (!$CI->session->admin) {
        redirect('404_override');
      }
    }
  }
?>