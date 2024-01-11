<?php
    session_start();
    require_once('../Models/alldb.php');
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        if(isset($_REQUEST["submit"]))
        {
            $varDoctorUsername = $_SESSION['username'];
            $oldPassword = trim($_REQUEST['oldPassword']);
            $newPassword = trim($_REQUEST['newPassword']);
            $retypePassword = trim($_REQUEST['retypePassword']);

            if($oldPassword == $newPassword && $newPassword == $retypePassword)
            {
                $_SESSION['updatePassSimilar'] = "Error! It's look like you have type the same old password. Please try again with different Password.";
                header("Location: ../Controllers/changePasswordController.php");
                exit();
            }

            $status = updatePass($varDoctorUsername,$oldPassword,$newPassword,$retypePassword);
            if($status)
            {
                $_SESSION['updatePassSuccess'] = "Success! Password has been changed.";
                header("Location: ../Controllers/dashboardController.php");
                exit();
            }
            else
            {
                $_SESSION['updatePassErr'] = "An error has been occurred! Please try again.";
            }
            header("Location: ../Controllers/changePasswordController.php");
            exit();
        }
    }
?>