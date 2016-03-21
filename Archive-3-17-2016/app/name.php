<?php
    session_start();

    $dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

        if(isset($_POST['name'])) {
            $postToDB = $dbh->prepare("
            INSERT INTO name(name)
            VALUES(:name)
            ");
            $postToDB->execute([
                'name' => $_POST['name']
                ]);
        } else {
            echo "no";
        }
?>
