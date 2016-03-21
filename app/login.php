<?php
    session_start();
    require 'passwords.php';
    require '../vendor/autoload.php';

    $dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    if (isset($_POST['password'])) {
        $password = password($_POST['password']);
    }

    $signin = $dbh->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    $signin->execute([
        'email' => $email,
        'password' => $password
        ]);
    $count = $signin->rowCount();
    $row = $signin->fetch();
    if($count == 1) {
        $_SESSION['email'] = $email;
        echo 'yes';
    }else {
        echo 'no';
    }
?>
