<?php
$home_path = rtrim($home_path, "/");
$cachebusting = rand(0, 1000);
$assets_path = $home_path."/assets";
$current_path = rtrim($home_path.$this->current[0], "/");
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <?php include 'header.php' ?>
</head>
<body>
  <div id="header">
    <header>
      <div class="wrap">
        <nav>
          <div id="logo"><a href="<?php echo $home_path;?>"><img src="<?php echo $assets_path;?>/images/logo.png"/></a></div>
          <ul class="main menu">
            <li><a href="<?php echo $home_path;?>/schedule.html">議程</a></li>
            <li><a href="<?php echo $home_path;?>/about.html">簡介</a></li>
            <li><a href="<?php echo $home_path;?>/sponsor.html">贊助</a></li>
            <li><a href="<?php echo $home_path;?>/">部落格</a></li>
          </ul>
          <div class="archive button"><a href="<?php echo $home_path;?>/archive.html">more</a></div>
        </nav>
      </div>
    </header>
  </div>

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

  <div id="content">
    <div class="main content wrap">
      <?php echo $transformed; ?>
    </div>
    <aside class="left aside">
    </aside>
    <aside class="right aside sponsers roll">
      <section>
        <div class="title">鑽石級贊助</div>
      </section>
      <section>
        <div class="title">黃金級贊助</div>
      </section>
      <section>
        <div class="title">白銀級贊助</div>
        <div class="sponser banner"><a href="http://www.archilife.org/"><img src="images/sponsor-archilife.jpg" alt="祐生研究基金會" /></a></div>
      </section>
      <section>
        <div class="title">青銅級贊助</div>
        <div class="sponser banner"><a href="http://www.wabow.com/"><img src="images/sponsor-wabow.jpg" alt="哇寶國際資訊" /></a></div>
      </section>
      <section>
        <div class="title">協辦單位</div>
      </section>
      <section>
        <div class="title">媒體夥伴</div>
      </section>
      <section>
        <div class="title">贊助 COSCUP</div>
      </section>
    </aside>
  </div>

  <footer id="footer">
    <div class="wrap">
    </div>
  </footer>
</body>
</html>
