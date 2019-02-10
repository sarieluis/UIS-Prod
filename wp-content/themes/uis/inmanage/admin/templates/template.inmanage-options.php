<h1>InManage Options <small>| Some small global configurations</small></h1>

<hr>

<h3>User Configurations</h3>


<form action="<?php echo admin_url( 'admin-post.php' ); ?>" method="post" name="inm_user_configs" id="inm_user_configs">
  <table class="inm-table table" id="inm-user-options">

    <!-- Table headings  -->
    <thead>
      <tr>
        <th>Field Label</th>
        <th>Field Value</th>
        <th>Default Value <small>| if there is one.</small></th>
        <th>Field Description</th>
      </tr>
    </thead>
    <!-- End Table headings  -->


    <!-- Username Prefix -->
    <tr>

      <td>Username AI value</td>

      <td>
        <input type="number" name="inm_username_ai" id="inm_username_ai" value="<?php echo get_option( 'inm_username_ai', 100000 ); ?>">
      </td>

      <td>Default: 100,000</td>

      <td>This is a number which is included in the username string when generating a new username. It is Auto Incrementing.</td>

    </tr>
    <!-- End Username Prefix -->

  </table>

  <input type="hidden" name="action" value="inm_user_configs">
  <?php wp_nonce_field( 'inm_user_configs', '_wpnonce', false,true ) ?>
  <?php submit_button( 'Save User Configurations' ) ?>
</form>