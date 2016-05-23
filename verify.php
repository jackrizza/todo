<?php
    if(!session_start()) {
        session_start();
    }

    $dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

    $done = $dbh->prepare("UPDATE users SET confirm_email=:confirm_email WHERE email=:email");
    $done->execute([
        "confirm_email" => $_GET['email'],
        "email" => $_GET['email']
        ]);
?>
howdy
<script>
    //window.location.href = "http://localhost:8888/sign-in";
</script>
