<?php
    if(!session_start()) {
        session_start();
    }
    error_reporting(0);
    ini_set('display_errors', 0);
?>
 <ul>
    <li>
        <a href="/">Home</a>
    </li>
    <?php if ($_SESSION['email']): ?>
        <li>
            <a href="/todo">Todo</a>
        </li>
        <li>
            <a class="btn-primary " href="/sign-out">Sign Out</a>
        </li>
    <?php else: ?>
    <li>
        <a href="/sign-up">Sign Up</a>
    </li>
    <li>
        <a href="/sign-in/hello">Sign In</a>
    </li>
    <?php endif ?>
</ul>
