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
<body>
  <header id="header">
    <div class="wrap">
      <a id="logo" href="<?php echo $home_path;?>"><img src="<?php echo $assets_path;?>/images/logo.png"/>&nbsp;</a>
      <?php include 'navbar.php';?>
    </div>
  </header>

  <div id="content">
    <div class="main content thin wrap">
      <?php echo $transformed; ?>
    </div>
  </div>

  <footer id="footer">
    <div class="wrap">
    </div>
  </footer>
  <?php include 'script.php';?>
</body>
</html>
