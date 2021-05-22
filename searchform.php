<form method="get" class="search-form" id="search-form" action="<?php echo esc_url(home_url('/')); ?>">
  <input type="search" class="search-field" placeholder="<?php __('Search', 'masonry'); ?>" name="s" id="search" />
  <a id="searchsubmit" class="search-button" onclick="this.parentElement.submit(); return false;">
    <div class="genericons-neue genericons-neue-search"></div>
  </a>
</form>
