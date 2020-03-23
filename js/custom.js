emergence.init({
  offsetBottom: 20,
  reset: false
});

jQuery(window).scroll(function () {
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 600) {
    jQuery(".btp").addClass("is--visible");
  } else {
    jQuery(".btp").removeClass("is--visible");
  }
});

jQuery('.btp').on('click', function (e) {
  e.preventDefault();
  jQuery('html, body').animate({ scrollTop: 0 }, '300');
});

jQuery("body").on('click', '.m-tg', function () {
  jQuery('.mobile-nav').animate({ 'height': 'toggle' }, 200);
  jQuery('main').toggleClass('blurred');
  jQuery('.mt-btns').toggleClass('displayed');
  jQuery('.hamburger div:nth-child(1)').toggleClass('first');
  jQuery('.hamburger div:nth-child(2)').toggleClass('middle');
  jQuery('.hamburger div:nth-child(3)').toggleClass('last');
});

jQuery("body").on('click', '.src-toggle', function () {
  jQuery('.mx').fadeToggle();
  jQuery(this).toggleClass('src-toggle');
  jQuery('.hamb').toggleClass('hmb-toggle');
  jQuery('.btnsnav').toggleClass('hidden');
  jQuery('nav .search form').animate({
    width: "toggle"
  });
  jQuery('.hmd').toggleClass('search-active');
});

jQuery(document).ready(mobilesearch);
jQuery(window).on('resize', mobilesearch);

function mobilesearch() {
  var $containerWidth = jQuery(window).width();
  if ($containerWidth <= 768) {
    jQuery('.search-button').removeClass('src-toggle');
    jQuery('.search-button').addClass('src-m-toggle');
  }
  if ($containerWidth > 768) {
    jQuery('.search-button').addClass('src-toggle');
    jQuery('.search-button').removeClass('src-m-toggle');
  }
}

jQuery(document).ready(function () {
  jQuery("body").on('click', '.src-m-toggle', function () {
    jQuery('.hamburger div:nth-child(1)').toggleClass('first');
    jQuery('.hamburger div:nth-child(2)').toggleClass('middle');
    jQuery('.hamburger div:nth-child(3)').toggleClass('last');
    jQuery('.hamburger').removeClass('m-tg');
    jQuery('.hamburger').addClass('s-tg');
    jQuery(this).fadeToggle(300);
    jQuery('nav .search form').animate({
      width: "toggle"
    });
  });
});

jQuery(document).ready(function () {
  jQuery("body").on('click', '.s-tg', function () {
    jQuery('.hamburger').removeClass('s-tg');
    jQuery('.hamburger').addClass('m-tg');
    jQuery('.hamburger div:nth-child(1)').toggleClass('first');
    jQuery('.hamburger div:nth-child(2)').toggleClass('middle');
    jQuery('.hamburger div:nth-child(3)').toggleClass('last');
    jQuery('nav .search form').animate({
      width: "toggle"
    });
    jQuery('.src-m-toggle').fadeToggle(300);
  });
});


jQuery(document).ready(function () {
  jQuery("body").on('click', '.apply-guest', function () {
    jQuery('.apply-post').slideToggle(300);
  });
});

jQuery(document).ready(function () {
  jQuery("body").on('click', '.news-btn, .letter-overlay, .close-letter', function () {
    jQuery('.pop-up-letter').toggleClass('letter-open');
    jQuery('.letter-overlay').toggleClass('ov-open');
  });
});

jQuery("body").on('click', '.search-active', function () {
  jQuery('.mx').fadeToggle();
  jQuery('.search-button').toggleClass('src-toggle');
  jQuery('.hamb').toggleClass('hmb-toggle');
  jQuery('nav .search form').animate({
    width: "toggle"
  });
  jQuery('.hmd').toggleClass('search-active');
});

jQuery("body").on('click', '#newsletterbtn', function () {
  jQuery('.newsletter--bar').animate({ 'height': 'toggle' }, 200);
});

jQuery("body").on('click', '.hmb-toggle', function () {
  jQuery('.sd--menu').animate({
    width: "toggle"
  });
  jQuery(this).toggleClass("is--active");
});


jQuery(window).scroll(function () {
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 100) {
    jQuery("header").addClass("has_scrolled");
  } else {
    jQuery("header").removeClass("has_scrolled");
  }
});

jQuery(window).scroll(function () {
  var scroll = jQuery(window).scrollTop();
  if (scroll >= 160) {
    jQuery(".reading-progress").addClass("visible");
  } else {
    jQuery(".reading-progress").removeClass("visible");
  }
});


jQuery(window).scroll(function (event) {
  var scrollTop = jQuery(window).scrollTop();
  docHeight = jQuery(document).height(),
    winHeight = jQuery(window).height(),
    scrollPercent = (scrollTop) / (docHeight - winHeight),
    scrollPercentageString = (scrollPercent * 100) + "%",
    readingIndicator = jQuery(".reading-progress");
  readingIndicator.width(scrollPercentageString);
});

jQuery('.countnumber').each(function () {
  jQuery(this).prop('Counter', 0).animate({
    Counter: jQuery(this).text()
  }, {
    duration: 4000,
    easing: 'swing',
    step: function (now) {
      jQuery(this).text(Math.ceil(now));
    }
  });
});