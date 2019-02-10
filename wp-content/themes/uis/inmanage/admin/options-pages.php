<?php
add_action( 'admin_menu', 'inm_add_options_pages' );

function inm_add_options_pages() {

  $page_title = __( 'InManage - Global Configurations', 'inmanage' );
  $menu_title = __( 'InManage - Global Configurations', 'inmanage' );
  $capability = 'manage_options';
  $menu_slug  = 'inm_options';
  $function   = 'inm_options_page_template';

  add_options_page( $page_title, $menu_title, $capability, $menu_slug, $function );
}
function inm_options_page_template() {

  include  get_stylesheet_directory() . '/inmanage/admin/templates/template.inmanage-options.php';
}