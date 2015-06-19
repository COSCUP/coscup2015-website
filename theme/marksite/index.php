<?php
$cachebusting = rand(0, 1000);
$assets_path = $home_path."assets/";
$current_path = rtrim($home_path.$this->current[0], "/") . "/";
?>
<!DOCTYPE html>
<html class="no-js">
<head>
  <?php include 'header.php' ?>
</head>
<body class="index">
  <header id="header">
    <div class="wrap">
      <a id="logo" href="<?php echo $home_path;?>"><img src="<?php echo $assets_path;?>/images/logo.png"/>&nbsp;</a>
      <?php include 'navbar.php';?>
      <div class="hide at-thin">
        <?php include 'locale.php';?>
      </div>
    </div>
  </header>
  <div id="header-image"></div>
  <div id="mobile-header-image"><img src="<?php echo $assets_path;?>/images/mobile-header.jpg"/></div>


  <div class="context-with-nav">
    <div id="content">
      <div class="main content wrap">
        <div id="features">
          <?php include 'events.php';?>
        </div>
        <?php echo $transformed; ?>
      </div>
      <aside class="left aside">
      </aside>
      <?php include 'sponsor.php';?>
    </div>
    <?php include 'navbar.php';?>
    <?php include 'archivebar.php';?>
  </div>

  <footer id="footer">
    <div class="wrap">
    </div>
  </footer>
  <?php include 'script.php';?>
</body>
</html>
