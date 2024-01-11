<?php
    session_start();
    require_once('../Models/alldb.php');
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        if(isset($_REQUEST["add"]))
        {
            $varPatientUsername = $_REQUEST["varPatientUsername"];
            $disease = trim($_REQUEST["disease"]);
            $brandName = trim($_REQUEST["brandName"]);
            $dose = $_REQUEST["dose"];
            $duration = trim($_REQUEST["duration"]);
            $conditionDose = $_REQUEST["conditionDose"];
            echo $varPatientUsername,$disease,$brandName,$dose,$duration,$conditionDose;
            $status = addPrescription($varPatientUsername,$disease,$brandName,$dose,$duration,$conditionDose);
            
            if($status)
            {
                header("Location: ../Controllers/prescribeController.php");
                exit();
            }
            else
            {
                $_SESSION['addPrescriptionErr'] = "An error has been occurred! Please try again.";
            }
            header("Location: ../Controllers/prescribeController.php");
            exit();
        }
    }
?>