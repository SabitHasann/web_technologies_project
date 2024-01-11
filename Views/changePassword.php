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
    <title>Change Password</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/changePass.css">
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
            <li><a class="dropdown-item" href="../Controllers/viewProfileController.php">View Profile</a></li>
            <li><a class="dropdown-item active" href="../Controllers/changePasswordController.php">Change Password</a></li>
          </ul>
        </li>
      </ul>
    </section>
    <!-- change password -->
    <section class="py-5">
        <form method="post" action="../Controllers/changePasswordCheckController.php">
            <div class="c-changePassword">
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingInput" placeholder="password" name="oldPassword">
                    <label for="floatingInput">Old Password</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="newPassword">
                    <label for="floatingPassword">New Password</label>
                </div>
                <div class="form-floating mb-4">
                    <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="retypePassword">
                    <label for="floatingPassword">ReType New Password</label>
                </div>
            </div>
            <div class="column">
                <button type="submit" class="btn btn-success" name="submit">Submit</button>
        </form>
                <form method="post" action="../Controllers/dashboardController.php">
                    <button type="submit" class="btn btn-danger" name="cancel">Cancel</button>
                </form>
            </div>
            <span><?php if(isset($_SESSION['updatePassErr'])){ echo '<script>alert("'.$_SESSION['updatePassErr'].'")</script>'; unset($_SESSION['updatePassErr']);} if(isset($_SESSION['updatePassSimilar'])){ echo '<script>alert("'.$_SESSION['updatePassSimilar'].'")</script>'; unset($_SESSION['updatePassSimilar']);}?></span>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>