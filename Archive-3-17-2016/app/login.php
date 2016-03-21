<?php
    require 'start.php';
    if (isset($_POST['email'])) {
        $email = $_POST['email'];
    }
    else {
        $_SESSION['error'] = "no email";
    }
    if (isset($_POST['password'])) {
        $password = $_POST['password'];
        $password = password($password);;
    }
    else {
        $_SESSION['error'] = "no password";
    }

    $signin = $dbh->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
    $signin->execute([
        'email' => $email,
        'password' => $password;
        ]);
    $signin->fetchAll();
    $_SESSION['error'] = $signinCount;
    if ($signinCount) {
        $_SESSION['email'] = $email;
    } else {
        $_SESSION['error'] = "wrong email and password";
    }
?>
