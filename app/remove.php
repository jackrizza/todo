<?php
    if (!session_start()) {
        session_start();
    }

    if(isset($_POST['number'])) {
        $id = intval($_POST['number']);
    }else {
        echo 'no';
        exit();
    }
    $email = $_SESSION['email'];
    $dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

    try {
        $remove = $dbh->prepare("UPDATE todo SET completed=true  WHERE id=:id AND email=:email");

        $done = $remove->execute([
            "id" => $id,
            "email" => $email
        ]);
        if($done) {
            echo 'completed' . $id;
        }else {
            echo "could not be complete";
        }
    } catch (Exception $e) {
        echo $e;
    }
?>
