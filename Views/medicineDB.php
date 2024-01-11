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
    $resultMedicine = medicineDetails();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Medicine DB</title>
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
    <link rel="stylesheet" href="../CSS/medicine.css">
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
          <a class="nav-link active" aria-current="page" href="../Controllers/medicineDBController.php">Medicine DB</a>
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
    <!-- search & add -->
    <section>
        <div class="c-search_add">
        <div class="c-search">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="myInput" placeholder="Search Medicine" name="searchMedicine">
                <label for="myInput">Search Medicine...</label>
            </div>
        </div>
        <form method="post" action="../Controllers/addMedicineController.php">
            <div class="c-btn">
                <button class="btn btn-secondary" type="submit" name="addMedicine">Add Medicine</button>
            </div>
        </form>
        </div>
    </section>
    <!-- table -->
    <section class="c-table">
    <?php if($resultMedicine->num_rows > 0){ ?>
        <table class="table table-hover">
            <thead>
                <tr>
                <th scope="col">Info.</th>
                <th scope="col">Brand Name</th>
                <th scope="col">Generic Name</th>
                <th scope="col">Company Name</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody class="table-group-divider" id="myTable">
            <?php while($r= mysqli_fetch_assoc($resultMedicine)){ ?>
                <tr>
                <td><span class="d-inline-block" tabindex="0" data-bs-toggle="popover" data-bs-trigger="hover focus" data-bs-placement="left" data-bs-title="Indications" data-bs-content="<?php echo $r['Indications']?>">
                <button class="btn btn-outline-success" type="button" disabled>Indications</button>
                </span></td>
                <td><?php echo $r['Brand_Name']?></td>
                <td><?php echo $r['Generic_Name']?></td>
                <td><?php echo $r['Company_Name']?></td>
                <td>
                  <div class="d-grid gap-2 d-md-flex">
                    <!-- button trigger edit modal -->
                    <button type="submit" class="btn btn-outline-warning editBtn">Edit</button>
                    <!-- button trigger delete modal -->
                    <button type="submit" class="btn btn-outline-danger deleteBtn">Delete</button>                   
                  </div>
                </td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    <?php } ?>
    </section>
    <span><?php if(isset($_SESSION['deleteMedicineErr'])){ echo '<script>alert("'.$_SESSION['deleteMedicineErr'].'")</script>'; unset($_SESSION['deleteMedicineErr']);} if(isset($_SESSION['deleteMedicineSuccess'])){ echo '<script>alert("'.$_SESSION['deleteMedicineSuccess'].'")</script>'; unset($_SESSION['deleteMedicineSuccess']);} if(isset($_SESSION['emptyFieldErr'])){ echo '<script>alert("'.$_SESSION['emptyFieldErr'].'")</script>'; unset($_SESSION['emptyFieldErr']);} if(isset($_SESSION['editMedicineErr'])){ echo '<script>alert("'.$_SESSION['editMedicineErr'].'")</script>'; unset($_SESSION['editMedicineErr']);} if(isset($_SESSION['editMedicineSuccess'])){ echo '<script>alert("'.$_SESSION['editMedicineSuccess'].'")</script>'; unset($_SESSION['editMedicineSuccess']);} ?></span>
    <!-- edit modal -->
    <div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel"> Edit Medicine Data </h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="../Controllers/editMedicineController.php">
                    <div class="modal-body">
                      <input type="hidden" name="update_id" id="update_id">

                      <div class="mb-4">
                        <h5> Brand Name </h5>
                        <input type="text" name="brandName" id="brandName" class="form-control" placeholder="Enter Brand Name">
                      </div>
                      <div class="mb-4">
                        <h5> Generic Name </h5>
                        <input type="text" name="genericName" id="genericName" class="form-control" placeholder="Enter Generic Name">
                      </div>
                      <div class="mb-4">
                        <h5> Company Name </h5>
                        <input type="text" name="companyName" id="companyName" class="form-control" placeholder="Enter Company Name">
                      </div>
                      <div class="mb-4">
                        <h5> Indications </h5>
                        <label class="form-label"> [Write updated indications if needed otherwise old indications will be replaced.] </label>
                        <textarea name="indications" id="indications" class="form-control" rows="5"></textarea>
                      </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="updatedata" class="btn btn-warning">Update Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- delete modal -->
    <div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                  <h4 class="modal-title" id="exampleModalLabel"> Delete Medicine Data </h4>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>

                <form method="post" action="../Controllers/deleteMedicineController.php">
                    <div class="modal-body">
                      <input type="hidden" name="delete_id" id="delete_id">
                      <p>Are you sure you want to delete this Medicine Data.</p>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                      <button type="submit" name="deletedata" class="btn btn-danger">Yes</button>
                    </div>
                </form>
            </div>
        </div>
    </div> 
    <!-- Ajax -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    <!-- popover indications -->
    <script>
        const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
        const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))
    </script>
    <!-- edit medicine -->
    <script>
        $(document).ready(function () 
        {
            $('.editBtn').on('click', function () 
            {
                $('#editmodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#update_id').val(data[1]);
                $('#brandName').val(data[1]);
                $('#genericName').val(data[2]);
                $('#companyName').val(data[3]);
            });
        });
    </script>
    <!-- delete medicine-->
    <script> 
        $(document).ready(function () 
        {
            $('.deleteBtn').on('click', function () 
            {
                $('#deletemodal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function () {
                    return $(this).text();
                }).get();

                console.log(data);

                $('#delete_id').val(data[1]);
            });
        });
    </script>
  </body>
</html>