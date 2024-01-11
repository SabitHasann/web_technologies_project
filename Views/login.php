<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/login.css">
    <script>
        function validateForm()
        {
            let username = document.getElementById('username').value;
            let password = document.getElementById('password').value;
            if(username.trim() == "" && password.trim() == "")
            {
                alert("Both username and password are required.");
                return false;
            }
            if(username.trim() == "")
            {
                alert("Username is required.");
                return false;
            }
            if(password.trim() == "")
            {
                alert("Password is required.");
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
                    <a class="nav-link active" aria-current="page" href="../Controllers/loginController.php">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../Controllers/registrationController.php">Registration</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- login -->
    <section class="container">
        <header>Login Form</header>
        <form method="post" action="../Controllers/loginCheckController.php" class="formLogin" onsubmit="return validateForm();">
            <div class="input-box">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username">
            </div>
            <div class="input-box">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password">
            </div>
            <span><?php if(isset($_SESSION['validityErr'])){ echo $_SESSION['validityErr']; unset($_SESSION['validityErr']);}?></span>
            <button class="login" type="submit" name="login">Login</button>
        </form>
        <form method="post" action="../Controllers/registrationController.php" class="formSignup">
            <div class="signup">
                <label>Not a member?&nbsp</label>
                <button type="submit" name="signup">Signup</button>
            </div>
        </form>
        <span><?php if(isset($_SESSION['newUsername'])){ echo '<script>alert("Your registration is succesfull and your username is '.$_SESSION['newUsername'].'. Please do remember this username for future login.")</script>'; unset($_SESSION['newUsername']);} ?></span>
    </section>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>