define(['jquery'], function($) {
  function featuresFocus() {
    var features = {},
        names = ["booking", "conference", "workshop", "film"],
        focus = undefined,
        top = 120,
        bottom = 30;

    names.forEach(function (name) {
      var el = $('.' + name + '.feature.block');
      features[name] = {
        top: el.position().top,
        bottom: el.position().top + el.height(),
        element: el
      };
    });

    function checkScroll() {
      var scroll = $(window).scrollTop();
      if (scroll) {
        if (focus) {
          features[focus].element.removeClass('hover');
          focus = undefined;
        }
        for (var i = 0; i < names.length; i++) {
          if (scroll < features[names[i]].top - top) {
            if (i === 0) return;
            features[names[i-1]].element.addClass('hover');
            focus = names[i-1];
            return;
          }
        }
        if (scroll < features[names[names.length - 1]].bottom - bottom) {
          features[names[names.length - 1]].element.addClass('hover');
          focus = names[names.length - 1];
          return;
        }
      }
    }

    function bindCheckScroll() {
      if ($(window).width() <= 599) {
        $(window).on('scroll', checkScroll);
      } else {
        $(window).off('scroll', checkScroll);
      }
    }

    bindCheckScroll();
    $(window).resize(bindCheckScroll);
  }

  $(document).ready(featuresFocus);
})
