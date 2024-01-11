<?php
    session_start();
    require_once('../Models/alldb.php');
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        $brandName = $_REQUEST['delete_id'];
        $status = deleteMedicine($brandName);

        if($status)
        {
            $_SESSION['deleteMedicineSuccess'] = "Success! Medicine data has been Deleted."; 
            header("Location: ../Controllers/medicineDBController.php");
            exit();
        }
        
        {
            $_SESSION['deleteMedicineErr'] = "An error has been occurred! Please try again.";  
        }
        header("Location: ../Controllers/medicineDBController.php");
        exit();
    }
?>