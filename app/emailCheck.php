<?php

if(!session_start()) {
    session_start();
}

$dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    echo "no email";
    exit();
}

$dbUpdate = $dbh->prepare(" SELECT * FROM users WHERE email=:email");

$done = $dbUpdate->execute([
    "email" => $email
    ]);
$emailCount = $dbUpdate->rowCount();
if($done) {
    if($emailCount < 1) {
        echo "ok";
    }
    else {
        echo "that emails is taken";
    }
}
