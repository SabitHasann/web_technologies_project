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
    $varPatientUsername = $_SESSION['patientUsername'];
    //medical history
    $rowMedicalHistory = medicalHistory($varPatientUsername);
    //patient name
    $rowPatientName = patientName($varPatientUsername);
    //prescription details
    $resultPrescription = prescriptionDetails($varPatientUsername);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Prescribe</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/prescribe.css">
    <!-- JS validation -->
    <script>
        function validateForm()
        {
            let disease = document.getElementById('disease').value;
            let brandName = document.getElementById('searchBrandName').value;
            let dose = document.getElementById('dose').value;
            let duration = document.getElementById('duration').value;
            if(disease.trim() == "" || brandName.trim() == "" || dose.trim() == "" || duration.trim() == "")
            {
                alert("All fields are required.");
                return false;
            }
        }
    </script>
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
    <!-- medical history -->
    <div class="card mb-3 mt-5" style="border-radius: .5rem; border-color: rgb(90, 185, 193); width:60%; margin:auto;">
        <div class="card-body p-4">
            <h6 class="text-center">Medical History</h6>
            <hr class="mt-0 mb-4">
            <div class="d-flex justify-content-center align-items-center" style="column-gap: 50px;">
                <div>
                    <h6>Patient ID</h6>
                    <p class="text-muted"><?php echo $varPatientUsername?></p>
                </div>
                <div>
                    <h6>Name</h6>
                    <p class="text-muted"><?php echo $rowPatientName['P_Name']?></p>
                </div>
                <div>
                    <h6>Visit Reason</h6>
                    <p class="text-muted"><?php echo $rowMedicalHistory['VisitReason']?></p>
                </div>
                <div>
                    <h6>Medical Problems [Current & Old]</h6>
                    <p class="text-muted"><?php echo $rowMedicalHistory['MedicalProblems']?></p>
                </div>
                <div>
                    <h6>Previous Sergeries</h6>
                    <p class="text-muted"><?php echo $rowMedicalHistory['PreviousSurgeries']?></p>
                </div>
            </div>
        </div>
    </div>
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
        <form method="post" action="../Views/savePrescription.php">
            <div class="c-btn">
                <button type="submit" class="btn btn-success" name="save" value="<?php echo $varPatientUsername; ?>">Save</button>
            </div>
        </form>
    <?php } ?>
    </section>
    <!-- prescription -->
    <section class="prescription">
        <form method="post" action="..//Controllers/addPrescriptionController.php" onsubmit="return validateForm();">
            <header>Prescription</header>
            <input type="hidden" name="varPatientUsername" value="<?php echo $varPatientUsername; ?>">
            <div class="input-box">
                <label>Disease</label>
                <input type="text" name="disease" id="disease" value="<?php echo $rowMedicalHistory['VisitReason']; ?>" placeholder="Enter disease">
            </div>
            <div class="input-box">
                <label>Brand Name</label>
                <input type="text" id="searchBrandName" name="brandName" placeholder="Search brand name...">
            </div>
            <div class="list-group col-md-8" id="show-list">
                <!-- Here brand name list will be display -->
            </div>
            <div class="select-box-label">
                <label>Dose</label>
            </div>
            <div class="select-box">
                <select name="dose" id="dose">
                    <option hidden value="null">Select Dose</option>
                    <option value="1+1+1">1+1+1</option>
                    <option value="1+0+1">1+0+1</option>
                    <option value="1+0+0">1+0+0</option>
                    <option value="0+0+1">0+0+1</option>
                    <option value="0+1+0">0+1+0</option>
                    <option value="0.5+0.5+0.5">0.5+0.5+0.5</option>
                    <option value="0.5+0+0">0.5+0+0</option>
                    <option value="0+0+0.5">0+0+0.5</option>
                </select>
            </div>
            <div class="input-box">
                <label>Duration</label>
                <input type="text" name="duration" id="duration" placeholder="Enter duration">
            </div>
            </div>
            <div class="radio-box">
                <div class="radio">
                    <input type="radio" id="check-after" name="conditionDose" value="After Meal" checked>
                    <label for="check-after">After Meal</label>
                </div>
                <div class="radio">
                    <input type="radio" id="check-before" name="conditionDose" value="Before Meal">
                    <label for="check-before">Before Meal</label>
                </div>
            </div>
            <div class="c-btn">
                <button type="submit" class="btn btn-success" name="add">ADD</button>
            </div>
        </form>
    </section>
    <span><?php if(isset($_SESSION['addPrescriptionErr'])){ echo '<script>alert("'.$_SESSION['addPrescriptionErr'].'")</script>'; unset($_SESSION['addPrescriptionErr']);}?></span>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            // Send Search Text to the server
            $("#searchBrandName").keyup(function(){
                let searchText = $(this).val();
                if(searchText != ""){
                    $.ajax({
                        url: "../Controllers/searchBrandNameController.php",
                        method: "post",
                        data:{
                            brandName: searchText
                        },
                        success: function(response){
                            $("#show-list").html(response);
                        }
                    });
                }
                else{
                    $("#show-list").html('');
                }
            });
            // Set searched text in input field on click of search button
            $(document).on('click','a',function(){
                $("#searchBrandName").val($(this).text());
                $("#show-list").html('');
            });
        });
    </script>
  </body>
</html>