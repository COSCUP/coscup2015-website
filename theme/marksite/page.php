<?php
$theme_assets_uri = $home_path."assets/";
$cachebusting = rand(0, 1000);
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <?php include 'header.php' ?>
</head>
<body>
<div id="header">
    <img id="mobile-header" src="<?php echo $theme_assets_uri;?>mobile/header.jpg" width="100%" />
    <div class="wrap">
      <div id="logo"><a href="<?php echo $home_path.$this->current[0]."/index.html"?>">COSCUP 2014</a></div>
        <ul id="languages" class="no-decoration">
          <?php $local_path = join('/', array_slice($this->current, 1, -1)); ?>
          <li><a href="<?php echo $home_path;?>en/<?php echo $local_path;?>" title="English" data-lang="en-US">EN</a></li>
          <li><a href="<?php echo $home_path;?>zh-tw/<?php echo $local_path;?>" title="正體中文" data-lang="zh-TW">正體</a></li>
          <li><a href="<?php echo $home_path;?>zh-cn/<?php echo $local_path;?>" title="简体中文" data-lang="zh-CN">简体</a></li>
        </ul>
	    <ul id="desktop-social-links" class="no-decoration">
        <li><a href="https://www.facebook.com/coscup" title="facebook" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_fb.png"/></a></li>
        <li><a href="https://plus.google.com/101434041225212178932" title="Google+" rel="publisher" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_gplus.png"/></a></li>
        <li><a href="http://www.plurk.com/coscup" title="plurk" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_plurk.png" /></a></li>
        <li><a href="https://twitter.com/coscup" title="twitter" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_twitter.png" /></a></li>
        <li><a href="http://blog.coscup.org" title="blog" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_blog.png" /></a></li>
        <li><a href="http://www.flickr.com/photos/coscup/sets/" title="flickr" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_flickr.png"  /></a></li>
        <li><a href="http://www.youtube.com/user/thecoscup?feature=watch" title="youtube" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_utube.png" /></a></li>
	    </ul>
      <nav id="nav-wrap">
        <div id="mobile-menu-icon" data-l10n-id="menu">選單</div>
        <ul id="mainNav" class="no-decoration">
          <?php echo $this->menu(1); ?>
        </ul>
      </nav>
    </div>
</div>
<!--Main-->
<div id="main">
<div class="wrap">
  <!--Sponsor-->
  <div id="sponsor" class="empty">
    <h2 data-l10n-id="sponsorship">贊助 COSCUP</h2>
    <p data-l10n-id="mailtoSponsor"><a href="mailto:sponsorship@coscup.org">sponsorship@coscup.org</a></p>
  </div>
  <div id="mySwipe" style='max-width:500px;margin:0 auto' class="swipe empty">
  </div>
  <div id="content">
    <?php echo $transformed; ?>
  </div>
</div>
</div>
<!--social Mobile-->
<ul id="mobile-social-links" class="no-decoration">
  <li class="title">Follow Us!!<hr></li>
  <li><a href="https://www.facebook.com/coscup" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_fb.png" align="absmiddle" /><span>facebook</span></a></li>
  <li><a href="https://plus.google.com/101434041225212178932" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_gplus.png" align="absmiddle" /><span>Google+</span></a></li>
  <li><a href="http://www.plurk.com/coscup" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_plurk.png" align="absmiddle" /><span>Plurk</span></a></li>
  <li><a href="https://twitter.com/coscup" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_twitter.png" align="absmiddle" /><span>twitter</span></a></li>
  <li><a href="http://blog.coscup.org" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_blog.png"  align="absmiddle" /><span>Blog</span></a></li>
  <li><a href="http://www.flickr.com/photos/coscup/sets/" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_flickr.png"  align="absmiddle" /><span>flickr</span></a></li>
  <li><a href="http://www.youtube.com/user/thecoscup?feature=watch" target="_blank"><img src="<?php echo $theme_assets_uri;?>icon_utube.png"  align="absmiddle" /><span>Youtube</span></a></li>
</ul><!--social Mobile end-->
<!--底-->
<div id="footer">
  <ul class="no-decoration">
    <li><span>&copy; 2014 COSCUP<span></li>
    <li><a data-l10n-id="contactUs" href="<?php echo $home_path.$this->current[0]."/contact/"?>">聯絡我們</a>|</li>
    <li><a href="http://coscup.org/2006/" target="_blank">2006</a>|</li>
    <li><a href="http://coscup.org/2007/" target="_blank">2007</a>|</li>
    <li><a href="http://coscup.org/2008/" target="_blank">2008</a>|</li>
    <li><a href="http://coscup.org/2009/" target="_blank">2009</a>|</li>
    <li><a href="http://coscup.org/2010/" target="_blank">2010</a>|</li>
    <li><a href="http://coscup.org/2011/" target="_blank">2011</a>|</li>
    <li><a href="http://coscup.org/2012/" target="_blank">2012</a>|</li>
    <li><a href="http://coscup.org/2013/" target="_blank">2013</a>|</li>
  </ul>
</div>
</body>
</html>
