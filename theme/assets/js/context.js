define(['jquery'], function($) {

  var path = window.location.href.match(/2015\/([-\w]+)\/?/);
  var lang = ((path && path[1]) || 'zh-tw').toLowerCase();

  // implicit use sponsor display (which is decided by CSS media query)
  // to detect device, to avoid use matchmedia query in JavaScript
  // FIXME: CSS dependent test
  var isMobile = ($('#mySwipe').css('display') ==='none')? false : true;
  if (navigator.userAgent.match(/(Android|iPhone|iPod|iPad|IEMobile|Mobile)/)) {
    isMobile = true;
  }

  return {
    origin: 'http://coscup.org',
    api_path: '/2015/api',
    lang: lang,
    mobile: isMobile
  }


  //COSCUP 2015 website only, for translating on-the-fly.
  $(document).ready(function () {
    lang2 = lang.substr(0, 3) + lang.substr(3).toUpperCase();
    document.l10n.requestLocales(lang2);
  })
});
