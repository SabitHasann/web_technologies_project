<?php
    session_start();
    if(!isset($_SESSION['username']))
    {
        header("Location: ../Controllers/loginController.php");
    }
    require_once('../Models/alldb.php');
    //doctor details
    $varDoctorUsername = $_SESSION['username'];
    $rowDoctor = doctorDetails($varDoctorUsername);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Profile</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/viewProfile.css">
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
          <a class="nav-link" href="../Controllers/dashboardController.php">Dashboard</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Controllers/viewPatientListController.php">View Patient List</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../Controllers/medicineDBController.php">Medicine DB</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link active dropdown-toggle" data-bs-toggle="dropdown" aria-current="page" href="#" role="button" aria-expanded="false">Settings</a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item active" href="../Controllers/viewProfileController.php">View Profile</a></li>
            <li><a class="dropdown-item" href="../Controllers/changePasswordController.php">Change Password</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- profile details -->
    <section>
        <div class="container py-5 h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-lg-6 mb-4 mb-lg-0">
                <div class="card mb-3" style="border-radius: .5rem; border-color: rgb(90, 185, 193);">
                <div class="row g-0">
                    <div class="col-md-4 gradient-custom text-center" style="border-top-left-radius: .5rem; border-bottom-left-radius: .5rem;">
                        <img src="../Images/undraw_pic_profile_re_7g2h.svg"
                            alt="profile picture" class="img-fluid my-5" style="width: 80px;" />
                        <h5>Dr.&nbsp;<?php echo $rowDoctor['D_Name'];?></h5>
                        <p>Username:&nbsp;<?php echo $rowDoctor['D_Username'];?></p>
                    </div>
                    <div class="col-md-8">
                        <div class="card-body p-4">
                            <h6>Information</h6>
                            <hr class="mt-0 mb-4">
                            <div class="row pt-1">
                                <div class="col-6 mb-3">
                                    <h6>Email</h6>
                                    <p class="text-muted"><?php echo $rowDoctor['D_Email'];?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Phone</h6>
                                    <p class="text-muted"><?php echo $rowDoctor['D_Phone'];?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Birth Date</h6>
                                    <p class="text-muted"><?php echo $rowDoctor['D_DOB'];?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Gender</h6>
                                    <p class="text-muted"><?php echo $rowDoctor['D_Gender'];?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Address</h6>
                                    <p class="text-muted"><?php echo $rowDoctor['D_Address'];?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Commission Per Patient</h6>
                                    <p class="text-muted"><?php echo $rowDoctor['D_Salary'];?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Qualification</h6>
                                    <p class="text-muted"><?php echo $rowDoctor['D_Qualification'];?></p>
                                </div>
                                <div class="col-6 mb-3">
                                    <h6>Speciality</h6>
                                    <p class="text-muted"><?php echo $rowDoctor['D_Speciality'];?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>