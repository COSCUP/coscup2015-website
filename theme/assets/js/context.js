define(['jquery'], function($) {

  var path = window.location.href.match(/2015\/([-\w]+)\/?/);
  var lang = ((path && path[1]) || 'zh-tw')
  lang = lang.substr(0, 3) + lang.substr(3).toUpperCase();

  $(document).ready(function () {
    document.l10n.requestLocales(lang);
  })

  return {
    origin: 'http://coscup.org',
    api_path: '/2015/api',
    lang: lang.toLowerCase()
  }
});
