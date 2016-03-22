<?php

if(!session_start()) {
    session_start();
}
session_destroy();
echo 'good bye';
?>
<script>
    window.location.href = "http://localhost:8888/";
</script>
