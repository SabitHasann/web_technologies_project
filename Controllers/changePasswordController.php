<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        header("Location: ../Views/changePassword.php");
    }
?>