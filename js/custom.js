emergence.init({
    offsetBottom: 20,
    reset: false
});

jQuery(window).scroll(function() {    
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 100) {
      jQuery("header").addClass("has_scrolled");
  } else {
      jQuery("header").removeClass("has_scrolled");
  }
});

jQuery(window).scroll(function() {    
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 160) {
      jQuery(".reading-progress").addClass("visible");
  } else {
      jQuery(".reading-progress").removeClass("visible");
  }
});


jQuery(window).scroll(function(event) {
  var scrollTop = jQuery(window).scrollTop();
  docHeight = jQuery(document).height(),
  winHeight = jQuery(window).height(),
  scrollPercent = (scrollTop) / (docHeight - winHeight),
  scrollPercentageString = (scrollPercent * 100) + "%",
  readingIndicator = jQuery(".reading-progress");
  readingIndicator.width(scrollPercentageString);
});

jQuery('.countnumber').each(function () {
    jQuery(this).prop('Counter',0).animate({
        Counter: jQuery(this).text()
    }, {
        duration: 4000,
        easing: 'swing',
        step: function (now) {
            jQuery(this).text(Math.ceil(now));
        }
    });
});