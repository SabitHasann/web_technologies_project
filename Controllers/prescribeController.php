<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        if(isset($_REQUEST['prescribe']))
        {
            $varPatientUsername = $_REQUEST['prescribe'];
            $_SESSION['patientUsername'] = $varPatientUsername;
            header("Location: ../Views/prescribe.php");
        }
        else
        {
            header("Location: ../Views/prescribe.php");
        }
    }
?>