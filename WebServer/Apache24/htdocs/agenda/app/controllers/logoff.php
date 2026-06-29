<?php
    session_name("agenda");
    session_start();

    $_SESSION = array();
    session_destroy();
    
    header("Location: ../../index.php");
    exit();
?>