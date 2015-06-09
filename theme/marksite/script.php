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
