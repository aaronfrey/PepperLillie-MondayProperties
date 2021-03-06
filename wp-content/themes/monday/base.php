<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>

  <body <?php body_class(wp_get_post_categories()); ?>>

    <?php
      do_action('get_header');
      
      if(!is_page('investors')) {
        get_template_part('templates/header');
      } else {
        get_template_part('templates/header', 'investors');
      }
    ?>

    <div class="wrap container-fluid" role="document">
      <div class="content row">
        <?php include Wrapper\template_path(); ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->

  </body>

</html>
