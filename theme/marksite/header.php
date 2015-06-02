<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title><?php echo $title; ?> | 2015 COSCUP</title>

<meta name="keywords" content="COSCUP, COSCUP2015, 開源人年會, Conference for Open Source Coders, Users and Promoters Open Source, Free Software, 自由軟體, 開放原始碼, 研討會, 社群, FLOSS">
<meta name="description" content="COSCUP 2015, 8/15-16 中央研究院。台灣 Opens Source 相關社群聯合舉辦的大型開放源碼研討會。讓世界各地的 FLOSS 愛好者、專家藉由開源人年會齊聚一堂，分享經驗、想法與新技術，共同激發群眾投入貢獻開源 / 自由軟體。">

<!--locales-->
<!--[if gt IE 8]><!-->
  <link rel="localization" href="<?php echo $theme_assets_uri;?>locales/manifest.json">
  <script src="<?php echo $theme_assets_uri;?>js/lib/l20n.min.js"></script>
<!--<![endif]-->

<!--fb shareing-->
<meta property="og:title" content="2015 COSCUP">
<meta name="og:description" content="COSCUP 2015, 8/15-16 中央研究院。台灣 Opens Source 相關社群聯合舉辦的大型開放源碼研討會。讓世界各地的 FLOSS 愛好者、專家藉由開源人年會齊聚一堂，分享經驗、想法與新技術，共同激發群眾投入貢獻開源 / 自由軟體。">
<meta property="og:type" content="website">
<meta property="og:url" content="http://coscup.org/2015/">
<meta property="og:site_name" content="2015 COSCUP">
<meta property="og:image" content="http://coscup.org/2015/assets/og-image.jpg">

<!--stylings-->
<link rel="stylesheet" href="<?php echo $theme_assets_uri;?>normalize.min.css" type= "text/css">
<link rel="stylesheet" media="only screen and (max-width:768px)" href="<?php echo $theme_assets_uri;?>mobile.css?<?php echo $cachebusting;?>" type= "text/css">
<link rel="stylesheet" media="screen and (min-width:769px)" href="<?php echo $theme_assets_uri;?>style.css?<?php echo $cachebusting;?>" type="text/css">

<!--favicon-->
<link rel="shortcut icon" href="<?php echo $theme_assets_uri;?>favicon.ico" type="image/x-icon">

<!--phone-->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link rel="apple-touch-icon" href="<?php echo $theme_assets_uri;?>ios-fav.jpg">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">

<!-- GA -->
<script>
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-12923351-1']);
  _gaq.push(['_setDomainName', 'coscup.org']);
  _gaq.push(['_trackPageview']);

  (function() {
  var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
  ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
  var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();
</script>
