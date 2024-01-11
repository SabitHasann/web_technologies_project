<?php
    session_start();
    require_once('../Models/alldb.php');
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
        if(isset($_REQUEST["save"]))
        {
            $varPatientUsername = $_REQUEST["save"];
            //update  status
            updateAppoinments($varPatientUsername);
            $varDoctorUsername = $_SESSION['username'];
            //doctor details
            $rowDoctor = doctorDetails($varDoctorUsername);
            //prescription details
            $resultPrescription = prescriptionDetails($varPatientUsername);
        }
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Save Prescription</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/savePrescription.css">
  </head>
  <body>
    <!-- navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom">
          <div class="container-fluid">
              <a class="navbar-brand" href="../Controllers/viewProfileController.php"> <img src="../Images/icons8-male-user-30.png" alt="logo">&nbsp;Dr.&nbsp;<?php echo $rowDoctor["D_Name"]; ?></a>
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                  <a class="nav-link" href="../Controllers/logoutController.php">Logout&nbsp;<img src="../Images/icons8-logout-32.png" alt="logout"></a>
                  </li>
              </ul>
              </div>
          </div>
        </nav>
    </header>
    <!-- back & date -->
    <section>
        <div class="c-back_date">
            <div class="c-back">
                <form method="post" action="../Controllers/viewPatientListController.php">
                    <button type="submit" class="btn btn-outline-danger">Back</button>
                </form>
            </div>
            <div class="c-date">
                <h5>Date : &nbsp; <?php echo date("Y-m-d")?></h5>
            </div>
        </div>
    </section>
    <!-- table -->
    <section class="c-table">
    <?php if($resultPrescription->num_rows > 0){ ?>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Brand Name</th>
                <th scope="col">Dose</th>
                <th scope="col">Duration</th>
                <th scope="col">Condition Dose</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="myTable">
            <?php while($r= mysqli_fetch_assoc($resultPrescription)){ ?>
                <tr>
                <td><?php echo $r['Brand_Name']?></td>
                <td><?php echo $r['Dose']?></td>
                <td><?php echo $r['Duration']?></td>
                <td><?php echo $r['Condition_Dose']?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
        <form method="post" action="../Controllers/createPDFController.php">
            <div class="c-btn">
                <button type="submit" class="btn btn-success" name="creatPDF" value="<?php echo $varPatientUsername; ?>">Creat PDF</button>
            </div>
        </form>
    <?php } ?>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>