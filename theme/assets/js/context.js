define(['jquery'], function($) {
  'use strict';

  var path = window.location.href.match(/2015\/([-\w]+)\/?/);
  var lang = ((path && path[1]) || 'zh-tw').toLowerCase();
  lang = lang.substr(0, 3) + lang.substr(3).toUpperCase();
  document.l10n.requestLocales(lang);

  return {
    origin: 'http://coscup.org',
    api_path: '/2015/api',
    lang: lang,
  }
});
