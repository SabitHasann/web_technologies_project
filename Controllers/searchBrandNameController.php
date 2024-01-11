<?php
    session_start();
    require_once('../Models/alldb.php');
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        if(isset($_POST['brandName']))
        {
            $brandName = $_POST['brandName'];

            $resultSearchBrandName = searchBrandName($brandName);

            if($resultSearchBrandName->num_rows > 0)
            {
                while($r = mysqli_fetch_assoc($resultSearchBrandName))
                {
                    echo "<a href='#' class='list-group-item list-group-item-action border-1'>".$r['Brand_Name']."</a>";
                }
            }
            else
            {
                echo "<p class='list-group-item border-1'>No Record</p>";
            }
        }
    }
?>