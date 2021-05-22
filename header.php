<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head profile="http://gmpg.org/xfn/11">
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <title>
    <?php wp_title('|', true, 'right'); ?>
  </title>
  <?php if (is_singular()) {
    wp_enqueue_script("comment-reply");
  } ?>
  <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
  <div class="mobile-navigation">
    <ul class="mobile-menu">
      <?php if (has_nav_menu('primary')) {
        wp_nav_menu(array(
          'theme_location' => 'primary',
          'container_class' => '',
          'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
        ));
      } else {
        wp_list_pages(array(
          'container' => '',
          'title_li' => ''
        ));
      } ?>
    </ul>
  </div>
  <!-- /mobile-navigation -->
  <div id="sidebar" class="sidebar">
    <div class="sidebar-inner">
      <?php if (has_custom_logo()) : ?>
        <div class="blog-logo"><?php the_custom_logo(); ?></div>
        <h1 class="blog-name">
          <a href="<?php echo esc_url(home_url()); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?> &mdash; <?php echo esc_attr(get_bloginfo('description')); ?>" rel="home"><?php echo esc_attr(get_bloginfo('name')); ?></a>
        </h1>
      <?php elseif (get_bloginfo('description') || get_bloginfo('name')) : ?>
        <h1 class="blog-title">
          <a href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name')); ?> &mdash; <?php echo esc_attr(get_bloginfo('description')); ?>" rel="home"><?php echo esc_attr(get_bloginfo('name')); ?></a>
        </h1>
      <?php endif; ?>
      <h1 class="blog-social">
        <?php if (has_nav_menu('social')) {
          wp_nav_menu(array(
            'theme_location' => 'social',
            'container_class' => '',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
          ));
        } ?>
      </h1>
      <a class="nav-toggle hidden" title="<?php __('Tap to view the menu', 'masonry') ?>" href="#">
        <div class="bars">
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="bar"></div>
          <div class="clear"></div>
        </div>
      </a>
      <ul class="main-menu">
        <?php if (has_nav_menu('primary')) {
          wp_nav_menu(array(
            'theme_location' => 'primary',
            'container_class' => '',
            'items_wrap'      => '<ul class="%2$s">%3$s</ul>',
          ));
        } else {
          wp_list_pages(array(
            'container' => '',
            'title_li' => ''
          ));
        } ?>
      </ul>
      <div class="widgets">
        <?php dynamic_sidebar('sidebar'); ?>
      </div>
      <div class="credits">
        <p>&copy;
          <?php echo date("Y") ?>
          <a href="<?php echo esc_url(home_url('/')); ?>">
            <?php bloginfo('name'); ?>
          </a>
        </p>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <!-- /sidebar -->
  <div class="wrapper" id="wrapper">
