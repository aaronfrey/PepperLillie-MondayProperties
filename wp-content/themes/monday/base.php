<?php

use Roots\Sage\Config;
use Roots\Sage\Wrapper;

?>

<?php get_template_part('templates/head'); ?>
  <body <?php body_class(); ?>>
    <!--[if lt IE 9]>
      <div class="alert alert-warning">
        <?php _e('You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.', 'sage'); ?>
      </div>
    <![endif]-->
    <?php
      do_action('get_header');
      get_template_part('templates/header');
    ?>
    <div class="wrap container-fluid" role="document">
      <div class="content row">
        <main role="main">
          <?php include Wrapper\template_path(); ?>
        </main><!-- /.main -->
        <?php if (Config\display_sidebar()) : ?>
          <aside class="sidebar" role="complementary">
            <?php include Wrapper\sidebar_path(); ?>
          </aside><!-- /.sidebar -->
        <?php endif; ?>
      </div><!-- /.content -->
    </div><!-- /.wrap -->
    <?php
      get_template_part('templates/footer');
      wp_footer();
    ?>

    <script type="text/javascript" src="<?php bloginfo('template_url'); ?>/assets/styles/fancybox/jquery.fancybox.pack.js?v=2.1.5"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/scripts/jquery.easing.1.3.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/scripts/jquery.animate-enhanced.min.js"></script>
    <script src="<?php bloginfo('template_url'); ?>/assets/scripts/jquery.superslides.js" type="text/javascript" charset="utf-8"></script>
    <script>
      $('#slides').superslides({
        animation: 'fade'
      });
    </script>

    <script type="text/javascript">
      $(document).ready(function() {
        $(".fancybox").fancybox({
          openEffect  : 'none'
        });
      });
    </script>

  </body>
</html>