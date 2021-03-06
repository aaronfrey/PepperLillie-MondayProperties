<?php use Roots\Sage\Nav\NavWalker;?>

<header class="banner navbar navbar-default navbar-static-top" role="banner">

    <div class="navbar-header">

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only"><?=__('Toggle navigation', 'sage');?></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>

        <a class="hide-xs navbar-brand" href="<?=esc_url(home_url('/'));?>">
            <img src="<?php bloginfo('template_url');?>/dist/images/logo.png">
        </a>

    </div>

    <nav class="collapse navbar-collapse" role="navigation">

        <div class="visible-xs hide-sm mobile-navbar-collpase">

            <a href="<?=esc_url(home_url('/'));?>">
                <img src="<?php bloginfo('template_url');?>/dist/images/logo2.png">
            </a>

            <a href="#" class="mobile-nav-close" id="mobile-nav-close">
                <img src="<?php bloginfo('template_url');?>/dist/images/close.png">
            </a>
            
        </div>

        <?php
        if (has_nav_menu('primary_navigation')):
            wp_nav_menu(['theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'nav navbar-nav']);
        endif;
        ?>

    </nav>

</header>