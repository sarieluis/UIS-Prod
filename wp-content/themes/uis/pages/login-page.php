<?php
/*
 Template Name: Login Page
*/

global $post;


get_header(); ?>

    <!-- USER -->
    <div class="user">
        <div class="user-col user-col_bg"></div>
        <div class="user-col user-col_info">
            <a href="<?php echo home_url() ?>" class="back-btn">< Back</a>
            <div class="user-wrap">
                <a href="<?php echo home_url() ?>" class="user-logo for-img">
                    <img src="<?php echo get_template_directory_uri() ?>/img/assets/logo.png" alt="">
                </a>
                <form class="user-form login_form" action="<?php echo esc_url( admin_url('admin-post.php') ) ?>" method="post">
                    <p class="user-title">User Login</p>
                    <p class="user-subtitle">Enter your user name and password to login</p>
                    <div class="form-group">
                        <i class="i-user"></i>
                        <input type="text" class="form-text" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group">
                        <i class="i-password"></i>
                        <input type="password" class="form-text" placeholder="Password" name="password" required>
                        <p class="error-message"></p>
                    </div>
                    <div class="form-group">
                        <a href="#" class="forgot-password">Forgot password?</a><br />
                        <input type="hidden" name="action" value="login_user">
                        <?php echo wp_nonce_field( 'submit_login', '_wpnonce', true, false ) ?>
                        <button class="btn" id="login-form-btn">
                          Login
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- USER END -->

<?php get_footer(); ?>