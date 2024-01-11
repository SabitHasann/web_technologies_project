<?php
    session_start();
    require_once('../Models/alldb.php');

    if(isset($_REQUEST["login"]))
    {
        $username = trim($_REQUEST["username"]);
        $password = trim($_REQUEST["password"]);

        $status = auth($username,$password);
        if($status)
        {
            $_SESSION['username'] = $username;
            $firstWord = substr($username,0,1);
            if($firstWord == "D")
            {
                header("Location: ../Controllers/dashboardController.php");
                exit();
            }
        }
        else
        {
            $_SESSION['validityErr'] = "*Invalid User";
        }
        header("location: ../Controllers/loginController.php");
        exit();
    }
?>