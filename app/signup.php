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

    $signin = $dbh->prepare("INSERT INTO users (email, password) VALUES (:email, :password)");
    $done = $signin->execute([
        'email' => $email,
        'password' => $password
        ]);
    if($done) {
        echo "done";
    }
    else {
        echo "something went wrong";
    }
/*
    if($done) {

        require '../vendor/autoload.php';

        $mail = new PHPMailer;
        /*
        //$mail->SMTPDebug = 3;                               // Enable verbose debug output

        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'jack@darrenjrizza.com';                 // SMTP username
        $mail->Password = '4/16/999';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        $mail->setFrom('todo@jackrizza.com', 'Mailer');
        $mail->addAddress($email, '');     // Add a recipient

        $mail->isHTML(true);                                  // Set email format to HTML

        $mail->Subject = 'Greetings';
        $mail->Body    = 'Welcome to todo by jackrizza! first things first, lets confirm your email : <a href="localhost:8888/confirm/' . $email.'">confirm email </a>
        ';
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        if(!$mail->send()) {
            echo 'Message could not be sent.';
            echo 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
            echo 'Message has been sent';
        }

    }
    */
?>
