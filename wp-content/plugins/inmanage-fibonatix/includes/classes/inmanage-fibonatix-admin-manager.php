<?php
class InmanageFibonatixAdminManager {

  private $version;

  public function __construct ( $version ) {

    $this->version = $version;
  }

  public function enqueue_scripts () {

    // enqueue styles and scripts goes here
  }

  public function add_menu_page () {

    $page_title = __( 'InManage Fibonatix', 'infibo' );
    $menu_title = __( 'InManage Fibonatix', 'infibo' );
    $capability = 'manage_options';
    $menu_slug  = 'inmanage_fibonatix';
    $function   = array( $this, 'render_menu_page' );
    $icon_url   = INMANAGE_FIBONATIX_URL . 'assets/images/plugin-logo.ico';
    $position   = 100;

    add_menu_page(
      $page_title,
      $menu_title,
      $capability,
      $menu_slug,
      $function,
      $icon_url,
      $position
    );
  }


  public function render_menu_page() {

    require_once INMANAGE_FIBONATIX_PATH  . 'admin/partials/inmanage-fibonatix-menu-page.php';
  }
}