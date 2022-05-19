<?php
  if ( ! function_exists('isLogin'))
  {
    $CI;

    function isLogin(){
      $CI =& get_instance();

      if (!str_contains(current_url(), 'logout')) {
        if ($CI->session->admin) {
          redirect('admin');
        }
      }
    }
  }
?>