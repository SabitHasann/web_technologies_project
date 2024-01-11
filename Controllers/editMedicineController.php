<?php
    session_start();
    require_once('../Models/alldb.php');
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        $update_id = $_REQUEST['update_id'];

        $brandName = trim($_REQUEST["brandName"]);
        $genericName = trim($_REQUEST["genericName"]);
        $companyName = trim($_REQUEST["companyName"]);
        $indications = trim($_REQUEST["indications"]);

        if(empty($brandName) || empty($genericName) || empty($companyName))
        {
            $_SESSION['emptyFieldErr'] = "Brand name or Generic name or Company name are missing! Please try again.";
            header("Location: ../Controllers/medicineDBController.php");
            exit();
        }
        if(empty($indications))
        {
            $status = editMedicineNotAll($update_id,$brandName,$genericName,$companyName);
        }
        else
        {
            $status = editMedicineAll($update_id,$brandName,$genericName,$companyName,$indications);
        }

        if($status)
        {
            $_SESSION['editMedicineSuccess'] = "Success! Medicine data has been changed."; 
            header("Location: ../Controllers/medicineDBController.php");
            exit();
        }
        
        {
            $_SESSION['editMedicineErr'] = "An error has been occurred! Please try again.";  
        }
        header("Location: ../Controllers/medicineDBController.php");
        exit();
    }
?>