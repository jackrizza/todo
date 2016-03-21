<?php
    if(!session_start()) {
        session_start();
    }
    error_reporting(0);
    ini_set('display_errors', 0);
?>
<div class="offscreen side-nav">
   <div class="sd-app"></div>
</div>
<script>
    function reloadSN() {
        $.get("<?php echo $_SESSION['server'];?>view/template/off.screen.list.navagation.list.html.php", function(data) {
            $(".sd-app").html(data);
        });
    }
    reloadSN();
    window.setInterval(function(){
      /// call your function here
      reloadSN();
    }, 1000);
</script>
