<?php get_header(); ?>
<div class="content">
  <?php if (have_posts()) : ?>
    <div class="posts" id="posts">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; ?>
    <?php endif; ?>
  </div>
  <!-- /posts -->
  <?php if ($wp_query->max_num_pages > 1) : ?>
    <div class="archive-nav">
      <?php echo get_next_posts_link(__('Previous', 'masonry') . ' &rarr;'); ?>
      <?php echo get_previous_posts_link('&larr; ' . __('Next', 'masonry')); ?>
      <div class="clear"></div>
    </div>
    <!-- /archive-nav -->
  <?php endif; ?>
</div>
<!-- /content -->
<?php get_footer(); ?>
