<script src="<?php echo $assets_path;?>js/lib/require.js"></script>
<script>
    require.config({
      baseUrl: "<?php echo $assets_path;?>js"
    });
    //Load common code that includes config, then load the specific
    //logic for this page.
    //Do the require calls here instead of a separate file
    //so after a build there are only 2 HTTP requests instead of three.
    require(['context'], function () {
    });
</script>

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
