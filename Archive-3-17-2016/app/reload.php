<?php
require 'start.php';

    $namedb = $dbh->prepare("SELECT * FROM name WHERE email=:email");
    $namedb->execute([
        'email' => $_SESSION['email']
        ]);
    $names = $namedb->fetchAll();
    $_SESSION['error'] = null;

?>

 <?php if($names) : ?>
            <?php foreach ($names as $name) : ?>
                <?php if ( $name['done']): ?>
                    <li class="strike"><b><?php echo $name['todo']; ?></b> <a href="javascript:remove(<?php echo $name['id']; ?>);">x</a></li>
                <?php else: ?>
                    <li class=""><b><?php echo $name['todo']; ?></b> <a href="javascript:remove(<?php echo $name['id']; ?>);">x</a><a href="javascript:done(<?php echo $name['id']; ?>);">&#10003;</a></li>
                <?php endif ?>
                <br>
            <?php endforeach; ?>
        <?php else: ?>
            <li>Nothing todo.</li>
            <br>
        <?php endif; ?>
