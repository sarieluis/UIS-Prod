<?php
class FibonatixPageTemplater {

  /**
   * A reference to an instance of this class.
   *
   * @var $instance
   */
  private static $instance;

  /**
   * The array of templates that this plugin tracks
   *
   * @var $templates
   */
  protected $templates;

  protected $loader;
  /**
   * Initializes the plugin by setting filters and administation functions.
   *
   * PageTemplater constructor.
   */
  private function __construct() {

    $this->templates = array();

    $this->load_dependencies();
    $this->define_templater_hooks();

    $this->templates = array(
      'templates/fibonatix-gateway/index.php' => 'Fibonatix Gateway Page',
      'templates/fibonatix-payment-result/index.php' => 'Fibonatix Payment Result Page'
    );

    $this->run();
  }

  private function define_templater_hooks() {

    $admin = new InmanageFibonatixAdminManager( INMANAGE_FIBONATIX_PLUGIN_VERSION );

    // Add a filter to the attributes metabox to inject template into the cache
    if( version_compare ( floatval( get_bloginfo('version') ), '4.7', '<' ) ) {

      // 4.6 snf older
      $this->loader->add_filter( 'page_attributes_dropdown_pages_args', $this, 'register_inmanage_templates' );

    } else {

      // Add ad filter up to the WP 4.7 version attributes metabox
      $this->loader->add_filter( 'theme_page_templates', $this, 'add_new_template' );
    }

    // Add filter to the save post to inject out template into page cache.
    $this->loader->add_filter( 'wp_insert_post_data', $this, 'register_inmanage_templates' );

    // Add a filter to the template include to determine if the page has our
    // template assigned and return it's path
    $this->loader->add_filter( 'template_include', $this, 'view_inmanage_template' );
  }

  /**
   * Returns an instance of this class.
   */
  public static function get_instance() {

    if( self::$instance == null ) {
      self::$instance = new FibonatixPageTemplater();
    }

    return self::$instance;
  }

  /**
   *
   */
  private function load_dependencies() {

    require_once INMANAGE_FIBONATIX_PATH . 'includes/classes/inmanage-fibonatix-admin-manager.php';

    require_once INMANAGE_FIBONATIX_PATH . 'includes/classes/inmanage-fibonatix-loader.php';

    $this->loader = new InmanageFibonatixLoader();
  }


  /**
   * Adds our template to the page dropdown for v4.7+
   *
   */
  public function add_new_template( $posts_templates ) {
    $posts_templates = array_merge( $posts_templates, $this->templates );
    return $posts_templates;
  }

  public function register_inmanage_templates( $atts ) {

    // Create the key used for the themes cache
    $cache_key = 'page_templates-' . md5( get_theme_root() . '/' . get_stylesheet() );

    // Retrieve the cache list.
    // If it doesn't exist, or it's empty prepare an array
    $templates = wp_get_theme()->get_page_templates();
    if( empty( $templates ) ) {
      $templates = array();
    }

    // New Cache, therefore remove the old one
    wp_cache_delete( $cache_key, 'themes' );

    // Now add our template to the list of templates by merging out templates
    // with the existing templates array from the cache.
    $templates = array_merge( $templates, $this->templates );

    // Add the modified cache to allow WordPress to pick it up for listing
    // available templates
    wp_cache_add( $cache_key, $templates, 'themes', 1800 );

    return $atts;
  }

  /**
   * Checks if the template is assigned to the page
   */
  public function view_inmanage_template( $template ) {

    // Get global post
    global $post;

    // Return template if post is empty
    if( ! $post ) {
      return $template;
    }

    // Return default template if we don't have a custom one defined
    if( ! isset( $this->templates[get_post_meta( $post->ID, '_wp_page_template', true )] ) ) {

      return $template;
    }


    $file = INMANAGE_FIBONATIX_PATH . get_post_meta( $post->ID, '_wp_page_template', true );

    // Just to be safe, we check if the file exists first
    if( file_exists( $file ) ) {
      return $file;
    } else {
      echo $file;
    }

    // Return Template
    return $template;
  }

  public function run() {

    $this->loader->run();
  }
}