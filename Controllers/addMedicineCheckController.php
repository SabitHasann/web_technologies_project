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
            $brandName = trim($_REQUEST["brandName"]);
            $genericName = trim($_REQUEST["genericName"]);
            $companyName = trim($_REQUEST["companyName"]);
            $indications = trim($_REQUEST["indications"]);

            $status = addMedicine($brandName,$genericName,$companyName,$indications);
            
            if($status)
            {
                $_SESSION['addMedicineSuccess'] = "Success! New Medicine data has been added to the Database.";
                header("Location: ../Controllers/addMedicineController.php");
                exit();
            }
            else
            {
                $_SESSION['addMedicineErr'] = "An error has been occurred! Please try again.";
            }
            header("Location: ../Controllers/addMedicineController.php");
            exit();
        }
    }
?>