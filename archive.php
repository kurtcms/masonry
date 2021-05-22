<?php get_header(); ?>
<div class="content">
  <div class="page-title">
    <div class="section-inner">
      <h4>
        <?php if (is_day()) : ?>
          <?php echo get_the_date(get_option('date_format')); ?>
        <?php elseif (is_month()) : ?>
          <?php echo get_the_date('F Y'); ?>
        <?php elseif (is_year()) : ?>
          <?php echo get_the_date('Y'); ?>
        <?php elseif (is_category()) : ?>
          <?php printf(__('%s', 'masonry'), '' . single_cat_title('', false) . ''); ?>
        <?php elseif (is_tag()) : ?>
          <?php printf(__('%s', 'masonry'), '' . single_tag_title('', false) . ''); ?>
        <?php elseif (is_author()) : ?>
          <?php $curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author)); ?>
          <?php printf(__('Author: %s', 'masonry'), $curauth->display_name); ?>
        <?php else : ?>
          <?php _e('Archive', 'masonry'); ?>
        <?php endif; ?>
      </h4>
    </div>
    <!-- /section-inner -->
  </div>
  <!-- /page-title -->
  <?php if (have_posts()) : ?>
    <?php rewind_posts(); ?>
    <div class="posts" id="posts">
      <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part('content', get_post_format()); ?>
      <?php endwhile; ?>
    </div>
    <!-- /posts -->
    <?php if ($wp_query->max_num_pages > 1) : ?>
      <div class="archive-nav">
        <div class="section-inner">
          <?php echo get_next_posts_link('&laquo; ' . __('Previous', 'masonry')); ?>
          <?php echo get_previous_posts_link(__('Next', 'masonry') . ' &raquo;'); ?>
          <div class="clear"></div>
        </div>
      </div>
      <!-- /post-nav archive-nav -->
    <?php endif; ?>
  <?php endif; ?>
</div>
<!-- /content -->
<?php get_footer(); ?>
