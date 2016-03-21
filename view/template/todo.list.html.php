<?php
if(!session_start()) {
    session_start();
}

$dbh = new PDO('pgsql:host=localhost;dbname=postgres', "postgres", "root");

$todoList = $dbh->prepare("SELECT * FROM todo WHERE email=:email");
$done = $todoList->execute([
    "email" => $_SESSION['email']
    ]);
$tdlr = $todoList->rowCount();
$tdls = $todoList->fetchAll();
?>
<?php if ($tdlr > 0): ?>
    <?php foreach ($tdls as $tdl): ?>
        <?php if (!$tdl['completed']): ?>
            <?php if ($tdl['done']): ?>
                <li class="strike"><span><?php echo $tdl['todo'];?></span><a href="javascript:remove(<?php echo $tdl['id'];?>);">x</a></li>
            <?php else: ?>
                <li><span><?php echo $tdl['todo'];?></span><a href="javascript:remove(<?php echo $tdl['id'];?>)">x</a><a href="javascript:done(<?php echo $tdl['id'];?>);">&#10003;</a></li>
            <?php endif ?>
        <?php endif ?>
    <?php endforeach; ?>
<?php else: ?>
    <li>Nothing yet</li>
<?php endif ?>

