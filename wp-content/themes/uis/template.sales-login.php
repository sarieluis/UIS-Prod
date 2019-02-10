<?php
/*
 Template Name: Sales Login
*/

global $post;
get_header(); ?>

<!-- Login area -->
<section id="login-area" style="margin-left: 50px;">

  <form action="<?php echo esc_url( admin_url('admin-post.php') ); ?>" method="post">

    <input type="text" id="sales_login_username" name="sales_login_username" />
    <input type="password" id="sales_login_password" name="sales_login_password" />
    <input type="submit" id="sales_login_submit" name="sales_login_submit" value="Login" />
    <?php wp_nonce_field( 'sales_login_form', 'sales_login_form' ); ?>
    <input name="action" value="sales_login_form" type="hidden">
  </form>

</section>
<!-- End Login area -->

<?php get_footer(); ?>
