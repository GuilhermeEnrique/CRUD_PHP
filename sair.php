<?php
    session_start();
    unset($_SESSION['emailAdmin']);
    unset($_SESSION['senhaAdmin']);
    header("Location: login.php");
?>