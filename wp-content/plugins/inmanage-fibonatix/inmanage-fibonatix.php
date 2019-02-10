<?php
/**
 * InManage Fibonatix
 *
 * @author      Amos Khimich | InManage Ltd.
 * @copyright   2017 InManage Ltd.
 * @license     GPL-2.0+
 *
 * @wordpress-plugin
 * Plugin Name: InManage Fibonatix
 * Plugin URI:  https://inmanage.co.il
 * Description: Adds an integration of Fibonatix. Generates a unique page template for payments via Fibonatix. It also provides some settings control over that page. Every request sent or received will be logged to a seperate table created by the plugin when activating it. The page is relying on get parameters which will help us get the needed information about the payment/order from SalesForce. This plugin is built and designed for a very specific Task to solve, so it will not give a real Fibonatix system integration.
 * Version:     1.0.0
 * Author:      Amos Khimich | InManage Ltd.
 * Author URI:  https://inmanage.co.il
 * Text Domain: infibo
 * License:     GPL-2.0+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

if ( ! defined( 'WPINC' ) ) {
  die;
}

define( 'INMANAGE_FIBONATIX_PATH', plugin_dir_path( __FILE__ ) );
define( 'INMANAGE_FIBONATIX_URL', plugins_url( '/', __FILE__  ) );
define( 'INMANAGE_FIBONATIX_PLUGIN_VERSION', '1.0.0' );


class InmanageFibonatix {

  /**
   * @var string
   */
  public $plugin_name = 'InManage Fibonatix';

  /**
   * @var string
   */
  public $plugin_slug;

  /**
   * @var string
   */
  public $plugin_text_domain = 'inmanage_fibonatix';

  /**
   * @var string
   */
  public $plugin_prefix = 'infibo';

  /**
   * @desc The plugin version
   * @var string
   */
  public $plugin_version = '1.0.0';

  /**
   * @desc On activation the plugin will create a table for logs. It will have its own table prefix
   * @var string
   */
  public $plugin_table_prefix = 'tb_';

  protected $loader;

  public function __construct () {

    $this->plugin_slug = 'inmanage_fibonatix';
    $this->plugin_version = '1.0.0';

    $this->load_dependencies();
    $this->define_admin_hooks();

    register_activation_hook( __FILE__, array( $this, 'on_plugin_activation' ) );
  }


  private function load_dependencies() {

    require_once INMANAGE_FIBONATIX_PATH . 'includes/classes/inmanage-fibonatix-admin-manager.php';

    require_once INMANAGE_FIBONATIX_PATH . 'includes/classes/inmanage-fibonatix-loader.php';



    $this->loader = new InmanageFibonatixLoader();
  }


  private function define_admin_hooks() {

    $admin = new InmanageFibonatixAdminManager( $this->get_version() );

//    $this->loader->add_action( 'admin_enqueue_scripts', $admin, 'enqueue_styles' );
    $this->loader->add_action( 'admin_menu', $admin, 'add_menu_page' );

  }


  public function run() {
    $this->loader->run();
  }

  public function get_version() {
    return $this->plugin_version;
  }


  public function on_plugin_activation() {

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );

    global $wpdb;
    $table_name = $this->plugin_table_prefix . 'fibonatix_log';
    $sales_force_table_name = $this->plugin_table_prefix . 'salesforce__log';


    // if table exists than there is nothing we have to do :)
    if( $wpdb->get_var("SHOW TABLES LIKE '$table_name'") == $table_name) return false;



    // but if we don't have that table in the Database then we will create it! Bang! You didn't see it coming! Huh?!
    $charset_collate = $wpdb->get_charset_collate();

    $sql  = "CREATE TABLE " . $table_name . " ( ";
    $sql .= "id bigint(20) unsigned NOT NULL AUTO_INCREMENT, ";
    $sql .= "wp_user_id bigint(20) unsigned NULL, ";
    $sql .= "user_email varchar(64) NULL, ";
    $sql .= "request_fields text NULL, ";
    $sql .= "method_name varchar(128) NULL, ";
    $sql .= "response text NULL, ";
    $sql .= "by_request_sn varchar(256) NULL, ";
    $sql .= "fibonatix_status_code varchar(64) NULL, ";
    $sql .= 'client_orderid varchar(32) NULL, ';
    $sql .= 'orderid int(11) NULL, ';
    $sql .= 'last_four_digits varchar(4) NULL, ';
    $sql .= 'error_message varchar(256) NULL, ';
    $sql .= 'processor_tx_id varchar(256) NULL, ';
    $sql .= 'type varchar(64) NULL, ';
    $sql .= 'status varchar(64) NULL, ';
    $sql .= "last_update int(11) DEFAULT " . time() . " NULL, ";
//    $sql .= "INDEX (wp_userid), ";
    $sql .= "PRIMARY KEY (id) ";
    $sql .= " ) " . $charset_collate . ";";

    dbDelta($sql);


    $sql = "CREATE TABLE ". $sales_force_table_name ." ( ";
    $sql .= "id bigint(20) unsigned NOT NULL AUTO_INCREMENT, ";
    $sql .= "request_url text NOT NULL COMMENT '//service url', ";
    $sql .= "post_fields text NOT NULL COMMENT '//serialized fields', ";
    $sql .= "http_method int(10) unsigned NOT NULL COMMENT '1 = POST, 2 = GET, 3 = PUT, 4 = DELETE, 5 = UPDATE, 6 = PATCH', ";
    $sql .= "response text NOT NULL COMMENT '//serialized response', ";
    $sql .= "ip varchar(255) NOT NULL, ";
    $sql .= "try int(10) unsigned NOT NULL COMMENT 'call try number', ";
    $sql .= "last_update int(11) NOT NULL, ";
    $sql .= "PRIMARY KEY (id) ";
    $sql .= ") ENGINE=InnoDB AUTO_INCREMENT=1 DEFAULT CHARSET=utf8";

    dbDelta($sql);

    return true;

  }
}

function run_single_post_meta_manager() {

  $infibo = new InmanageFibonatix();
  $infibo->run();

}

run_single_post_meta_manager();

require_once( INMANAGE_FIBONATIX_PATH . 'includes/classes/page-templater.php' );
add_action( 'plugins_loaded', array( 'FibonatixPageTemplater', 'get_instance' ) );