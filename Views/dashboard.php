<?php
    session_start();
    require_once('../Models/alldb.php');
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    else
    {
      //doctor details
      $varDoctorUsername = $_SESSION['username'];
      $rowDoctor = doctorDetails($varDoctorUsername);
      //appoinment count
      $resultAppoinmentCount = appoinmentCount($varDoctorUsername);
      $resultAppoinmentCountChecked = appoinmentCountChecked($varDoctorUsername);
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/dashboard.css">
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
    <!-- tabs -->
    <section class="c-tab">
      <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="../Controllers/dashboardController.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Controllers/viewPatientListController.php">View Patient List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Controllers/medicineDBController.php">Medicine DB</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Settings</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="../Controllers/viewProfileController.php">View Profile</a></li>
            <li><a class="dropdown-item" href="../Controllers/changePasswordController.php">Change Password</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- date -->
    <section>
          <div class="c-date" style="display:flex; align-items:center; justify-content:center; margin-top: 45px;">
                <h5>Date : &nbsp; <?php echo date("Y-m-d")?></h5>
          </div>
    </section>
    <!-- cards -->
    <section class="c-cards">
      <div class="row">
        <div class="col-sm-6 mb-3 mb-sm-0">
          <div class="card">
            <div class="card-header"><h4>Appoinments Remaining</h4></div>
            <div class="card-body">
              <h1 class="card-title"><?php echo $resultAppoinmentCount->num_rows; ?></h1>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="card">
            <div class="card-header"><h4>Today's Income</h4></div>
            <div class="card-body">
              <h1 class="card-title">TK. <?php echo ($resultAppoinmentCountChecked->num_rows)*($rowDoctor["D_Salary"]); ?></h1>
            </div>
          </div>
        </div>
      </div>
    </section>
    <span><?php if(isset($_SESSION['updatePassSuccess'])){ echo '<script>alert("'.$_SESSION['updatePassSuccess'].'")</script>'; unset($_SESSION['updatePassSuccess']);} ?></span>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>