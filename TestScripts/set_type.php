<?php
    session_start();
    $_SESSION['USER TYPE'] = $_GET['type'];
    header('Location: /CIS435Proj3');
?>
