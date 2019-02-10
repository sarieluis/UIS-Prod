<?php
add_action( 'admin_post_nopriv_inm_user_configs', 'inm_save_inm_user_options' );
add_action( 'admin_post_inm_user_configs', 'inm_save_inm_user_options' );
function inm_save_inm_user_options() {

  if ( ! isset( $_POST['_wpnonce'] ) || ! wp_verify_nonce( $_POST['_wpnonce'], 'inm_user_configs' ) ||  ! is_user_logged_in() ) {

    wp_redirect( $_SERVER['HTTP_REFERER'] );
    exit;
  }

  if( isset( $_POST['inm_username_ai'] ) && $_POST['inm_username_ai'] && is_numeric( $_POST['inm_username_ai'] ) )
    update_option( 'inm_username_ai', $_POST['inm_username_ai'] );

  wp_redirect( $_SERVER['HTTP_REFERER'] );
  exit;
}