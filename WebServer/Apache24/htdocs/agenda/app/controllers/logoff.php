<?php
    session_name("agenda");
    session_start();

    unset($_SESSION["login"]);
    session_destroy();
    
    echo '<script>
        window.location.href="http://localhost/agenda";      
        </script>';
?>