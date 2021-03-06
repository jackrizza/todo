<?php
    session_start();
    require 'passwords.php';
    require '../vendor/autoload.php';
    use Mailgun\Mailgun;

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
        mailCall($email);
        echo "done";
    }
    else {
        echo "something went wrong";
    }
    function mailCall($emailUser) {
         # Instantiate the client.
        $email = 'jackrizza@gmail.com';
        $mgClient = new Mailgun('key-f55386178c87572f01fab07705741b64');
        $domain = "jackrizza.com";

        # Make the call to the client.
        $result = $mgClient->sendMessage($domain, [
            'from'    => 'mail@jackrizza.com',
            'to'      => $emailUser,
            'subject' => 'Welcome to TODO by jack',
            'text'    => '',
            'html'    => '<style>
body {
    background: #3A4750;
    width: 100%;
    height: 100%;
    padding: 24px;
    position : absolute;
    line-height : 3;
}

div {
    position : relative;
    width: 90%;
    margin: 0 auto;
}

h1 {
    color: #F6C90E;
    font-size: 24px;
    margin-top: 48px;
    magin-bottom : 24px;
}

p {
    color: #fff;
    padding: 12px;
    margin: 12px;
    line-height : 2;
}

#btn {
    padding: 0.75em;
    margin-top: 1.5em;
    margin-bottom : 1.5em;
    color: #000;
    background: #F6C90E;
    text-decoration: none;
}
a {
    color : #F6C90E;
}
#btn a {
    color : #fff;
}
</style>

<body>
    <div stlye=" ">
        <h1 style="">Hey there, Hi there!</h1>
        <br>
        <p><b>Welcome to the TODO app built by Jack Rizza</b>. It would be much appreciated if you could <b>verify your email</b>.
            <br>
            <br>
            <a href="http:8888/verify.php?email=' . $emailUser . ' " id="btn">verify email</a>
            <br>
            <br>
            If you have no idea with what this is for, That\'s completely fine your email is just being used by someone else. Just forget we ever send you anything!!!
            <br>
            If you have anyquestion just direct them to <a href="mail:help@jackrizza.com">our support line</a>, <b>thanks in advance!</b>
        </p>
    </div>
</body>
'
        ]);
    }
?>
