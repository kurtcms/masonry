<?php get_header(); ?>
<div class="content thin">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <div id="post-<?php the_ID(); ?>" <?php post_class('single'); ?>>
      <div class="post-subject">
        <div class="post-header">
          <h2 class="post-title"><?php the_title(); ?></h2>
        </div>
        <!-- /post-header -->
        <div class="post-meta">
          <p>
            <?php the_date(get_option('date_format')); ?>
            <?php masonry_readtime() ?>
          </p>
        </div>
        <!-- /post-header -->
      </div>
      <!-- /post-subject -->
      <?php if (has_post_thumbnail()) : ?>
        <div class="featured-media">
          <?php the_post_thumbnail('post-image'); ?>
        </div>
        <!-- /featured-media -->
      <?php endif; ?>
      <div class="post-body">
        <div class="post-content">
          <?php the_content(); ?>
        </div>
        <!-- /post-content -->
        <div class="clear"></div>
        <div class="post-meta-bottom">
          <?php
          $defaults = array(
            'before'           => '<div class="clear"></div><p class="page-links">' . __('Pages:'),
            'after'            => '</p>',
            'link_before'      => '',
            'link_after'       => '',
            'next_or_number'   => 'number',
            'separator'        => '<span class="sep">/</span>',
            'nextpagelink'     => __('Next', 'masonry'),
            'previouspagelink' => __('Previous', 'masonry'),
            'pagelink'         => '%',
            'echo'             => 1
          );
          wp_link_pages($defaults);
          ?>
          <ul>
            <?php if (has_category()) : ?>
              <li class="post-categories">
                <?php the_category(', '); ?>
              </li>
            <?php endif; ?>
            <?php if (has_tag()) : ?>
              <li class="post-tags">
                <?php the_tags('', ' '); ?>
              </li>
            <?php endif; ?>
            <?php edit_post_link('Edit post', '<li>', '</li>'); ?>
          </ul>
          <div class="clear"></div>
        </div>
        <!-- /post-meta-bottom -->
      </div>
      <!-- /post-body -->
      <?php
      $prev_post = get_previous_post();
      $next_post = get_next_post();
      ?>
      <div class="post-navigation">
        <?php if (!empty($prev_post)): ?>
          <div class="post-nav-prev">
            <p class="meta-nav">
              <?php _e('Previous', 'masonry'); ?>
            </p>
            <a class="meta-nav-post-title" href="<?php echo get_permalink($prev_post->ID); ?>">
              <?php echo esc_attr(get_the_title($prev_post)); ?>
            </a>
          </div>
        <?php endif; ?>
        <?php if (!empty($next_post)): ?>
          <div class="post-nav-next">
            <p class="meta-nav">
              <?php _e('Next', 'masonry'); ?>
            </p>
            <a class="meta-nav-post-title" href="<?php echo get_permalink($next_post->ID); ?>">
              <?php echo esc_attr(get_the_title($next_post)); ?>
            </a>
          </div>
        <?php endif; ?>
        <div class="clear"></div>
      </div>
      <!-- /post-navigation -->
      <?php comments_template('', true); ?>
    </div>
    <!-- /post -->
  <?php endwhile; else: ?>
    <div class="post single">
      <div class="post-subject">
        <div class="post-header">
          <h2 class="post-title">
            <?php _e('No result for', 'masonry'); echo " '" . get_search_query() . "'. "; _e('Try something else?', 'masonry'); ?>
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
