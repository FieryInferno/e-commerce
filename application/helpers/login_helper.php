<?php
  if ( ! function_exists('isLogin'))
  {
      $CI;

      function isLogin(){
        $CI =& get_instance();

        if ($CI->session->admin) {
            redirect('admin');
          }
      }

  }
?>