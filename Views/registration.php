<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/registration.css">
</head>
<body>
    <!-- navbar -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"> <img src="../Images/icons8-hospital-30.png" alt="logo">&nbsp;CivicCare Medical Center</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link" href="../Controllers/homeController.php">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../Controllers/loginController.php">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../Controllers/registrationController.php">Registration</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- registration -->
    <section class="container">
        <header>Registration Form</header>
        <form method="post" action="../Controllers/registrationCheckController.php" class="formSignup">
            <div class="input-box">
                <label>Full Name</label>
                <input type="text" name="name" value="<?php if(isset($_SESSION['name'])){ echo $_SESSION['name']; unset($_SESSION['name']);}?>" placeholder="Enter full name">
                <span><?php if(isset($_SESSION['nameErr'])){ echo $_SESSION['nameErr']; unset($_SESSION['nameErr']);}?></span>
            </div>
            <div class="input-box">
                <label>Email Address</label>
                <input type="email" name="email" value="<?php if(isset($_SESSION['email'])){ echo $_SESSION['email']; unset($_SESSION['email']);}?>" placeholder="Enter email address">
                <span><?php if(isset($_SESSION['emailErr'])){ echo $_SESSION['emailErr']; unset($_SESSION['emailErr']);}?></span>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Phone Number</label>
                    <input type="text" name="phone" value="<?php if(isset($_SESSION['phone'])){ echo $_SESSION['phone']; unset($_SESSION['phone']);}?>" placeholder="Enter phone number">
                    <span><?php if(isset($_SESSION['phoneErr'])){ echo $_SESSION['phoneErr']; unset($_SESSION['phoneErr']);}?></span>
                </div>
                <div class="input-box">
                    <label>Birth Date</label>
                    <input type="date" name="dob" value="<?php if(isset($_SESSION['dob'])){ echo $_SESSION['dob']; unset($_SESSION['dob']);}?>" placeholder="Enter birth date">
                    <span><?php if(isset($_SESSION['dobErr'])){ echo $_SESSION['dobErr']; unset($_SESSION['dobErr']);}?></span>
                </div>
            </div>
            <div class="gender-box">
                <h3>Gender</h3>
                <div class="gender-option">
                    <div class="gender">
                        <input type="radio" id="check-male" name="gender" value="Male" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == "Male"){ echo 'checked'; unset($_SESSION['gender']);}?>>
                        <label for="check-male">Male</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-female" name="gender" value="Female" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == "Female"){ echo 'checked'; unset($_SESSION['gender']);}?>>
                        <label for="check-female">Female</label>
                    </div>
                    <div class="gender">
                        <input type="radio" id="check-other" name="gender" value="Other" <?php if(isset($_SESSION['gender']) && $_SESSION['gender'] == "Other"){ echo 'checked'; unset($_SESSION['gender']);}?>>
                        <label for="check-other">Prefer not to say</label>
                    </div>
                </div>
                <span><?php if(isset($_SESSION['genderErr'])){ echo $_SESSION['genderErr']; unset($_SESSION['genderErr']);}?></span>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Address</label>
                    <input type="text" name="address" value="<?php if(isset($_SESSION['address'])){ echo $_SESSION['address']; unset($_SESSION['address']);}?>" placeholder="Enter address">
                    <span><?php if(isset($_SESSION['addressErr'])){ echo $_SESSION['addressErr']; unset($_SESSION['addressErr']);}?></span>
                </div>
                <div class="input-box">
                    <label>Commission Per Patient</label>
                    <input type="text" name="salary" value="<?php if(isset($_SESSION['salary'])){ echo $_SESSION['salary']; unset($_SESSION['salary']);}?>" placeholder="Enter salary">
                    <span><?php if(isset($_SESSION['salaryErr'])){ echo $_SESSION['salaryErr']; unset($_SESSION['salaryErr']);}?></span>
                </div>
            </div>
            <div class="column">
                <div class="input-box">
                    <label>Qualification</label>
                    <input type="text" name="qualification" value="<?php if(isset($_SESSION['qualification'])){ echo $_SESSION['qualification']; unset($_SESSION['qualification']);}?>" placeholder="Enter qualification">
                    <span><?php if(isset($_SESSION['qualificationErr'])){ echo $_SESSION['qualificationErr']; unset($_SESSION['qualificationErr']);}?></span>
                </div>
                <div class="input-box">
                    <label>Speciality</label>
                    <input type="text" name="speciality" value="<?php if(isset($_SESSION['speciality'])){ echo $_SESSION['speciality']; unset($_SESSION['speciality']);}?>" placeholder="Enter speciality">
                    <span><?php if(isset($_SESSION['specialityErr'])){ echo $_SESSION['specialityErr']; unset($_SESSION['specialityErr']);}?></span>
                </div>
            </div>
            <div class="input-box">
                <label>Password</label>
                <input type="password" name="password" value="<?php if(isset($_SESSION['password'])){ echo $_SESSION['password']; unset($_SESSION['password']);}?>" placeholder="Enter new password">
                <span><?php if(isset($_SESSION['passwordErr'])){ echo $_SESSION['passwordErr']; unset($_SESSION['passwordErr']);}?></span>
            </div>
            <button class="signup" type="submit" name="signup">Signup</button>
        </form>

        <form method="post" action="../Controllers/loginController.php" class="formLogin">
            <div class="login">
                <label>Already a member?,&nbsp</label>
                <button type="submit" name="login">Login</button>
            </div>
        </form>
        <span><?php if(isset($_SESSION['registrationErr'])){ echo '<script>alert("'.$_SESSION['registrationErr'].'")</script>'; unset($_SESSION['registrationErr']);}?></span>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>