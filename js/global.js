jQuery(document).ready(function ($) {

  //Masonry blocks
  $blocks = $(".posts");
  $blocks.imagesLoaded(function () {
    $blocks.masonry({
      itemSelector: '.post-container'
    });
    $(".post-container").fadeIn();
  });

  $(document).ready(function () {
    setTimeout(function () {
      $blocks.masonry();
    }, 500);
  });

  $(window).resize(function () {
    $blocks.masonry();
  });

  //Toggle mobile menu
  $(".nav-toggle").on("click", function () {
    $(this).toggleClass("active");
    $(".mobile-navigation").slideToggle();
  });

  //Hide mobile menu > 1000
  $(window).resize(function () {
    if ($(window).width() > 1000) {
      $(".nav-toggle").removeClass("active");
      $(".mobile-navigation").hide();
    }
  });

  //Jetpack Infinite scroll
  $(document.body).on('post-load', function () {
    var $container = $('.posts');
    $container.masonry('reloadItems');
    $blocks.imagesLoaded(function () {
      $blocks.masonry({
        itemSelector: '.post-container'
      });
      $(".post-container").fadeIn();
    });

    $container.masonry('reloadItems');

    $(document).ready(function () {
      setTimeout(function () {
        $blocks.masonry();
      }, 500);
    });

  });

  //Sticky sidebar
  var $window, $sidebar
  $window = $( window );
  $sidebar = $('#sidebar').first();

  //Adjust sidebar position on scroll
  $(window).scroll(function () {
    var windowPos = $window.scrollTop(),
			windowHeight = $window.height(),
			sidebarHeight = $sidebar.height(),
			bodyHeight = $(document.body).height();

		if( 1000 < $window.width() && bodyHeight > sidebarHeight && ( windowPos + windowHeight ) >= sidebarHeight ) {
			$sidebar.css({
				position: 'fixed',
				bottom: sidebarHeight > windowHeight ? 0 : 'auto'
			});
		} else {
			$sidebar.css('position', 'relative');
		}
  });
});
