<?php

if(!session_start()) {
    session_start();
}

$dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");
if (isset($_POST['todo'])) {
        $todo = $_POST['todo'];
    }

$dbUpdate = $dbh->prepare(" INSERT INTO todo
                            (todo, email)
                            VALUES (:todo, :email)");

$done = $dbUpdate->execute([
    "todo" => $todo,
    "email" => $_SESSION['email']
    ]);

if($done) {
    echo "done";
}
else {
    echo "did not go through";
}
