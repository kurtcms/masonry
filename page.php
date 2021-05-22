<?php get_header(); ?>
<div class="content thin">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div <?php post_class('post single'); ?>>
      <div class="post-subject">
        <div class="post-header">
          <h2 class="post-title"><?php the_title(); ?></h2>
        </div>
        <!-- /post-header section -->
      </div>
      <!-- /post-subject -->
      <?php if (has_post_thumbnail()) : ?>
        <?php $thumb = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'thumbnail_size'); $thumb_url = $thumb['0']; ?>
        <div class="featured-media">
          <?php the_post_thumbnail('post-image'); ?>
        </div>
        <!-- /featured-media -->
      <?php endif; ?>
      <div class="post-body">
        <div class="post-content">
          <?php the_content(); ?>
          <?php
          $defaults = array(
            'before'           => '<div class="clear"></div><p class="page-links">' . __('Pages:'),
            'after'            => '</p>',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'separator'        => '<span class="sep">/</span>',
            'nextpagelink'     => __('Next'),
            'previouspagelink' => __('Previous'),
            'pagelink'         => '%',
            'echo'             => 1
          );
          wp_link_pages($defaults);
          ?>
        </div>
      </div>
      <!-- /post-body -->
      <div class="post-footer">
      </div>
      <!-- /post-footer -->
      <?php if (comments_open()) : ?>
        <?php comments_template('', true); ?>
      <?php endif; ?>
    </div>
    <!-- /post -->
  <?php endwhile; else: ?>
    <div class="post single">
      <div class="post-subject">
        <div class="post-header">
          <h2 class="post-title">
            <?php _e('No result. Try a search?', 'masonry'); ?>
          </h2>
        </div>
        <!-- /post-header section -->
      </div>
      <!-- /post-subject -->
      <div class="post-body">
        <div class="post-content">
          <?php get_search_form(); ?>
        </div>
        <!-- /post-content -->
      </div>
      <div class="post-footer">
      </div>
      <!-- /post-footer -->
    </div>
    <!-- /post -->
  <?php endif; ?>
  <div class="clear"></div>
</div>
<!-- /content -->
<?php get_footer(); ?>
