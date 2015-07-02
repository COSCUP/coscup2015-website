define(['jquery'], function($) {
  $(document).ready(function () {
    var path = window.location.href.match(/2015\/([-\w]+)\/?/);
    var lang = ((path && path[1]) || 'zh-tw').toLowerCase();
    lang = lang.substr(0, 3) + lang.substr(3).toUpperCase();
    document.l10n.requestLocales(lang);
  })

  //包在 ready 裡面似乎傳回時機不對會造成錯誤？
  return {
    origin: 'http://coscup.org',
    api_path: '/2015/api',
    lang: lang
  }
});
