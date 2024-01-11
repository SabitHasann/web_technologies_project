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
    $resultAppoinment = appoinmentDetails($varDoctorUsername);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>View Patient List</title>
    <!-- Ajax -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- jquery filter -->
    <script>
        $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/viewPatientList1.css">
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
          <a class="nav-link active" aria-current="page" href="../Controllers/viewPatientListController.php">View Patient List</a>
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
    <!-- search & date -->
    <section>
        <div class="c-search_date">
          <div class="c-search">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="myInput" placeholder="Search Medicine" name="searchMedicine">
                <label for="myInput">Search Patient...</label>
            </div>
          </div>
          <div class="c-date">
                <h5>Date : &nbsp; <?php echo date("Y-m-d")?></h5>
          </div>
        </div>
    </section>
    <!-- table -->
    <section class="c-table">
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">SL.</th>
                <th scope="col">Patient ID</th>
                <th scope="col">Name</th>
                <th scope="col">Phone Number</th>
                <th scope="col">Gender</th>
                <th scope="col">Birth Date</th>
                <th scope="col">Email</th>
                <th scope="col">Address</th>
                <th scope="col">Blood Group</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="myTable">
            <?php if($resultAppoinment->num_rows > 0) { while($rAppoinment= mysqli_fetch_assoc($resultAppoinment)){ $varPatientUsername = $rAppoinment['P_Username']; $resultPatient = patientDetails($varPatientUsername); while($rPatient=mysqli_fetch_assoc($resultPatient)){ ?>
                <tr>
                <td><?php echo $rAppoinment['Serial_No']?></td>
                <td><?php echo $rPatient['P_Username']?></td>
                <td><?php echo $rPatient['P_Name']?></td>
                <td><?php echo $rPatient['P_Phone']?></td>
                <td><?php echo $rPatient['P_Gender']?></td>
                <td><?php echo $rPatient['P_DOB']?></td>
                <td><?php echo $rPatient['P_Email']?></td>
                <td><?php echo $rPatient['P_Address']?></td>
                <td><?php echo $rPatient['P_BloodGroup']?></td>
                <td>
                  <form method="post" action="../Controllers/prescribeController.php">
                    <button type="submit" name="prescribe" class="btn btn-outline-success" value="<?php echo $rPatient['P_Username']?>">Prescribe</button>
                  </form>                  
                </td>
                </tr>
            <?php } } }?>
            </tbody>
        </table>
    </section>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>