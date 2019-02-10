<?php
//add_action( 'init', 'DEV_AUTH' );
function DEV_AUTH (){
  $dev_mode = true;
  if($dev_mode===true){
    if (!isset($_SERVER['PHP_AUTH_USER'])) {
      header('WWW-Authenticate: Basic realm="My Realm"');
      header('HTTP/1.0 401 Unauthorized');
      echo 'Unauthorized';
      exit;
    } else {
      if(empty($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_USER']!='inmanage' ||empty($_SERVER['PHP_AUTH_PW']) || $_SERVER['PHP_AUTH_PW']!='inmanage' ){
        header('WWW-Authenticate: Basic realm="My Realm"');
        header('HTTP/1.0 401 Unauthorized');
        echo 'Unauthorized';
        exit;
      }
    }
  }
}


add_theme_support( 'post-thumbnails' );
add_theme_support( 'menus' );
add_post_type_support( 'page', 'excerpt' );

function widgets_init() {
    register_sidebar( array(
        'name' => 'Footer Sidebar 1',
        'id' => 'footer-sidebar-1',
        'description' => 'Appears in the footer area',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
    register_sidebar( array(
        'name' => 'Footer Sidebar 2',
        'id' => 'footer-sidebar-2',
        'description' => 'Appears in the footer area',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
    register_sidebar( array(
        'name' => 'Footer Headlines',
        'id' => 'footer-headlines',
        'description' => 'Appears in the footer area',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
    register_sidebar( array(
        'name' => 'Header Phone',
        'id' => 'header-phone',
        'description' => 'Appears in the header area',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
    register_sidebar( array(
        'name' => 'Contact Us',
        'id' => 'contact-us',
        'description' => 'Appears on the contact page',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ) );
}
add_action( 'init', 'widgets_init' );

//remove_filter('widget_text_content', 'wpautop');

function add_theme_scripts() {
    wp_enqueue_style( 'fonts.googleapis', 'https://fonts.googleapis.com/css?family=Montserrat:200,300,400,500,600,700,800,900' );
    wp_enqueue_style( 'slick', get_template_directory_uri() . '/libs/slick-1.8.0/slick/slick.css', array(), false, 'all' );
    wp_enqueue_style( 'selectric', get_template_directory_uri() . '/libs/jQuery-Selectric-master/public/selectric.css', array(), false, 'all' );
    wp_enqueue_style( 'jquery-ui', 'https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css');
    wp_enqueue_style( 'fonts', get_template_directory_uri() . '/css/fonts.css', array(), false, 'all' );
    wp_enqueue_style( 'main', get_template_directory_uri() . '/css/main.min.css', array(), false, 'all' );
    wp_enqueue_style( 'style', get_template_directory_uri() . '/style.css', array(), false, 'all' );
    wp_enqueue_style( 'easy-autocomplete', get_template_directory_uri() . '/css/easy-autocomplete.min.css', array(), false, 'all' );
    wp_enqueue_style( 'flags', get_template_directory_uri() . '/css/flags.min.css', array(), false, 'all' );

    wp_enqueue_script( 'es5-shim', get_template_directory_uri() . '/libs/html5shiv/es5-shim.min.js', array ( 'jquery' ), false, true);
    wp_enqueue_script( 'html5shiv', get_template_directory_uri() . '/libs/html5shiv/html5shiv.min.js', array ( 'jquery' ), false, true);
    wp_enqueue_script( 'html5shiv-printshiv', get_template_directory_uri() . '/libs/html5shiv/html5shiv-printshiv.min.js', array ( 'jquery' ), false, true);
    wp_enqueue_script( 'respond', get_template_directory_uri() . '/libs/respond/respond.min.js', array ( 'jquery' ), false, true);

    wp_script_add_data( 'es5-shim', 'conditional', 'lt IE 9' );
    wp_script_add_data( 'html5shiv', 'conditional', 'lt IE 9' );
    wp_script_add_data( 'html5shiv-printshiv', 'conditional', 'lt IE 9' );
    wp_script_add_data( 'respond', 'conditional', 'lt IE 9' );

    wp_enqueue_script( 'main.jquery', get_template_directory_uri() . '/libs/jquery/jquery-2.1.3.min.js', array (  ), false, true);
    wp_enqueue_script( 'slick', get_template_directory_uri() . '/libs/slick-1.8.0/slick/slick.min.js', array ( 'jquery' ), false, true);
    wp_enqueue_script( 'jquery.selectric', get_template_directory_uri() . '/libs/jQuery-Selectric-master/public/jquery.selectric.js', array ( 'jquery' ), false, true);
    wp_enqueue_script( 'jquery.jquery-ui', 'https://code.jquery.com/ui/1.12.1/jquery-ui.js', array (), false, true);
    if(is_profile()) {
        wp_enqueue_script( 'app-scripts', get_template_directory_uri() . '/js/app-page.js', array ( 'jquery' ), false, true);
    }
    wp_enqueue_script( 'easy-autocomplete', get_template_directory_uri() . '/js/jquery.easy-autocomplete.min.js', array ( 'jquery' ), false, true);
    wp_enqueue_script( 'common-scripts', get_template_directory_uri() . '/js/common.min.js', array ( 'jquery' ), false, true);
    wp_enqueue_script( 'main-scripts', get_stylesheet_directory_uri() . '/js/main.min.js', array ( 'jquery' ), '1.0.0', true);


}
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

function custom_logo_setup() {
    $defaults = array(
        'height'      => 100,
        'width'       => 400,
        'flex-height' => true,
        'flex-width'  => true,
        'header-text' => array( 'site-title', 'site-description' ),
    );
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'custom_logo_setup' );

if ( function_exists( 'register_nav_menus' ) ) {
    register_nav_menus(
        array(
            'primary' => 'Primary Header Menu',
            'footer_menu' => 'Footer Menu',
        )
    );
}

function isa_add_img_title( $attr, $attachment = null ) {
    $attr['title'] = trim( strip_tags( $attachment->post_title ) );
    return $attr;
}
add_filter( 'wp_get_attachment_image_attributes','isa_add_img_title', 10, 2 );

class FooterMenuWalker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=array(),$current_object_id = 0) {

        $output .= '<li class="footer-nav-item"><a href="'.$item->url.'" class="footer-nav-link">'.$item->title.'</a></li>';

    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {

        $output .= "</li>\n";

    }

}

class HeaderMenuWalker extends Walker_Nav_Menu {

    function start_el(&$output, $item, $depth=0, $args=array(),$current_object_id = 0) {

        $is_active = in_array("current_page_item",$item->classes) ? "active" : "";
        $output .= '<li class="nav-item '. $is_active .'"><a href="'.$item->url.'" class="nav-link '. $is_active .' ">'.$item->title.'</a></li>';

    }

    function end_el( &$output, $item, $depth = 0, $args = array() ) {

        $output .= "</li>\n";

    }

}

add_action('admin_init', 'my_general_section');
function my_general_section() {
    add_settings_section(
        'my_settings_section', // Section ID
        '', // Section Title
        '', // Callback
        'general' // What Page?  This makes the section show up on the General Settings Page
    );

    add_settings_field( // Option 1
        'inst_link', // Option ID
        'Instagram', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'inst_link' // Should match Option ID
        )
    );

    add_settings_field( // Option 1
        'fb_link', // Option ID
        'Facebook', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'fb_link' // Should match Option ID
        )
    );

    add_settings_field( // Option 1
        'in_link', // Option ID
        'Linkedin', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'in_link' // Should match Option ID
        )
    );

    add_settings_field( // Option 1
        'gp_link', // Option ID
        'Google+', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'gp_link' // Should match Option ID
        )
    );

    add_settings_field( // Option 1
        'register_success_text', // Option ID
        'Register Success Text', // Label
        'my_textbox_callback', // !important - This is where the args go!
        'general', // Page it will be displayed (General Settings)
        'my_settings_section', // Name of our section
        array( // The $args
            'register_success_text' // Should match Option ID
        )
    );



//    register_setting('general','header_cloud_check', 'esc_attr');
    register_setting('general','in_link', 'esc_attr');
    register_setting('general','inst_link', 'esc_attr');
    register_setting('general','gp_link', 'esc_attr');
    register_setting('general','fb_link', 'esc_attr');
    register_setting('general','register_success_text', 'esc_attr');
}

function my_section_options_callback() { // Section Callback
    echo '<p>A little message on editing info</p>';
}

function my_textbox_callback($args) {  // Textbox Callback
    $option = get_option($args[0]);
    echo '<input class="regular-text" type="text" id="'. $args[0] .'" name="'. $args[0] .'" value="' . $option . '" />';
}

function my_checkbox_callback($args) {  // Checkbox Callback
    $option = get_option($args[0]);
    $checked = $option ? 'checked="checked"' : '';

    echo '<input type="checkbox" id="'. $args[0] .'" name="'. $args[0] .'" ' . $checked . '" />';
}

remove_filter( 'the_content', 'wpautop' );
remove_filter( 'the_excerpt', 'wpautop' );

include_once "functions/auth.php";
include_once "functions/application.php";

add_action( 'show_user_profile', 'my_show_extra_profile_fields' );
add_action( 'edit_user_profile', 'my_show_extra_profile_fields' );
function my_show_extra_profile_fields( $user ) { ?>

    <h3>Extra profile information</h3>

    <table class="form-table">

        <tr>
            <th><label for="twitter">Phone</label></th>

            <td>
                <input type="text" name="phone" id="phone" value="<?php echo esc_attr( get_the_author_meta( 'phone', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>

        <tr>
            <th><label for="twitter">Country</label></th>

            <td>
                <input type="text" name="country" id="country" value="<?php echo esc_attr( get_the_author_meta( 'country', $user->ID ) ); ?>" class="regular-text" /><br />
            </td>
        </tr>

        <tr>
            <th scope="row">Application steps</th>

            <td>
                <fieldset>
                    <label>
                        <input name="step_1_activated" type="checkbox" id="step_1_activated" value="1" <?php echo esc_attr( get_the_author_meta( 'step_1_activated', $user->ID ) ) == '1' ? 'checked="checked" disabled="disabled"' : ''; ?>>
                        1st Step Activated</label><br>
                    <label>
                        <input name="step_2_activated" type="checkbox" id="step_2_activated" value="1" <?php echo esc_attr( get_the_author_meta( 'step_2_activated', $user->ID ) ) == '1' ? 'checked="checked" disabled="disabled"' : ''; ?>>
                        2nd Step Activated</label><br>
                    <label>
                        <input name="step_3_activated" type="checkbox" id="step_3_activated" value="1" <?php echo esc_attr( get_the_author_meta( 'step_3_activated', $user->ID ) ) == '1' ? 'checked="checked" disabled="disabled"' : ''; ?>>
                        3rd Step Activated</label><br>
                </fieldset>
            </td>
        </tr>

    </table>
<?php }

add_action( 'personal_options_update', 'my_save_extra_profile_fields' );
add_action( 'edit_user_profile_update', 'my_save_extra_profile_fields' );

function my_save_extra_profile_fields( $user_id ) {

    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['step_1_activated']) && $_POST['step_1_activated'] && !get_the_author_meta( 'step_1_activated', $user_id )) {

        $to = $_POST['email'];
        $subject = 'Step is completed';
        $message = 'Step 1 is completed. Please proceed to the next step: ' . site_url('/personal-application/optimization');

        wp_mail($to, $subject, $message);

        update_user_meta( $user_id, 'step_1_activated', $_POST['step_1_activated'] );
    }
    if(isset($_POST['step_2_activated']) && $_POST['step_2_activated'] && !get_the_author_meta( 'step_2_activated', $user_id )) {

        $to = $_POST['email'];
        $subject = 'Step is completed';
        $message = 'Step 2 is completed. Please proceed to the next step: ' . site_url('/personal-application/submission');

        wp_mail($to, $subject, $message);

        update_user_meta( $user_id, 'step_2_activated', $_POST['step_2_activated'] );
    }
    if(isset($_POST['step_3_activated']) && $_POST['step_3_activated'] && !get_the_author_meta( 'step_3_activated', $user_id )) {

        $to = $_POST['email'];
        $subject = 'Step is completed';
        $message = 'Step 3 is completed.';

        wp_mail($to, $subject, $message);

        update_user_meta( $user_id, 'step_3_activated', $_POST['step_3_activated'] );
    }

    update_user_meta( $user_id, 'phone', $_POST['phone'] );
    update_user_meta( $user_id, 'country', $_POST['country'] );

}

add_action('wp_logout','auto_redirect_after_logout');
function auto_redirect_after_logout(){
    wp_redirect( home_url() );
    exit();
}

add_action('after_setup_theme', 'remove_admin_bar');
function remove_admin_bar() {
    if ( ( ! current_user_can('administrator') && ! current_user_can('uis_lower_admin') ) && !is_admin() ) {
        show_admin_bar(false);
    }
}

function wpse_11244_restrict_admin() {
    if ( ( ! current_user_can('administrator') && ! current_user_can('uis_lower_admin') )  && $_SERVER['PHP_SELF'] != '/wp-admin/admin-post.php' ) {
        wp_redirect( home_url() );
    }
}
add_action( 'admin_init', 'wpse_11244_restrict_admin', 1 );

function successful_approval_message($message, $user) {



    $message = "You have been approved to access " . site_url() . "\r\n\r\n";
    $message .= "Login page: " . site_url('/login');

    return $message;
}
add_filter('new_user_approve_approve_user_message', 'successful_approval_message', 10, 2);

add_action('init', function() {
    $url_path = trim(parse_url(add_query_arg(array()), PHP_URL_PATH), '/');

    if ( $url_path === 'personal-application' ) {
        locate_template('pages/app-1-step.php', true); exit;
    }
    if ( $url_path === 'personal-application/optimization' ) {
        locate_template('pages/app-2-step.php', true); exit;
    }
    if ( $url_path === 'personal-application/submission' ) {
        locate_template('pages/app-3-step.php', true); exit;
    }

});


add_action( 'wp_enqueue_scripts', 'uis_enqueue_scripts' );
function uis_enqueue_scripts() {

  wp_register_style( 'uis-inm-style-css', get_stylesheet_directory_uri() . '/css/compiled-css/style.css', array(), '1.0.2' );

  wp_enqueue_style( 'uis-inm-style-css' );
}
require_once get_stylesheet_directory() . '/inmanage/functions.php';