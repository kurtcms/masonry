<?php get_header(); ?>
<div class="content thin">
  <?php if (have_posts()) : ?>
    <div class="page-title">
      <h4>
        <?php _e('Results for', 'masonry'); echo " '" . get_search_query() . "'"; ?>
      </h4>
    </div>
    <!-- /page-title -->
    <div class="posts" id="posts">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; ?>
    </div>
    <!-- /posts -->
    <?php if ($wp_query->max_num_pages > 1) : ?>
      <div class="archive-nav">
        <?php echo get_next_posts_link('&laquo; ' . __('Previous', 'masonry')); ?>
        <?php echo get_previous_posts_link(__('Next', 'masonry') . ' &raquo;'); ?>
        <div class="clear"></div>
      </div>
      <!-- /post-nav archive-nav -->
    <?php endif; ?>
  <?php else : ?>
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
