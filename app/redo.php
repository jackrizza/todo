<?php
    if(!session_start()) {
        session_start();
    }
    if(isset($_POST['number'])) {
        $id = intval($_POST['number']);
    }else {
        echo 'no';
        exit();
    }

    $dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

    $done = $dbh->prepare("UPDATE todo SET done=false WHERE id=:id AND email=:email");
    $done->execute([
        "id" => $id,
        "email" => $_SESSION['email']
        ]);
?>
