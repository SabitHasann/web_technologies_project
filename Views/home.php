<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- CSS -->
    <link rel="stylesheet" href="../CSS/home.css">
  </head>
  <body>
    <!-- navbar -->
    <header>
        <nav class="navbar fixed-top navbar-expand-lg navbar-custom">
            <div class="container-fluid">
                <a class="navbar-brand" href="../Controllers/homeController.php"> <img src="../Images/icons8-hospital-30.png" alt="logo">&nbsp;CivicCare Medical Center</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../Controllers/loginController.php">Login</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" href="../Controllers/registrationController.php">Registration</a>
                    </li>
                </ul>
                </div>
            </div>
        </nav>
    </header>
    <!-- carousel -->
    <section>
        <div id="carousel" class="carousel slide">
        <div class="carousel-indicators">
            <button  type="button" data-bs-target="#carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active c-item">
            <img src="../Images/undraw_medicine_b-1-ol.svg" class="d-block w-100 c-image" alt="...">
            <div class="carousel-caption">
                <h2>Medical Professionals</h2>
                <p>"Empowering Medical Excellence through Knowledge, Compassion, and Innovation."</p>
            </div>
            </div>
            <div class="carousel-item c-item">
            <img src="../Images/undraw_doctor_kw-5-l.svg" class="d-block w-100 c-image" alt="...">
            <div class="carousel-caption">
                <h2>Doctor's Consultaion</h2>
                <p>"Nurturing Health through Expert Guidance: Your Path to Personalized Care."</p>
            </div>
            </div>
            <div class="carousel-item c-item">
            <img src="../Images/undraw_scientist_ft0o.svg" class="d-block w-100 c-image" alt="...">
            <div class="carousel-caption">
                <h2>Diagnosis & Treatment</h2>
                <p>"Precision Diagnosis, Compassionate Treatment: Paving the Way to Health and Healing."</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carousel" data-bs-slide="prev">
            <img src="../Images/icons8-back-26.png" alt="">
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carousel" data-bs-slide="next">
            <img src="../Images/icons8-forward-26.png" alt="">
        </button>
        </div>
    </section>
    <!-- about -->
    <section>
        <div class="about-us">
            <h1>About Us</h1>
        </div>
        <div class="details">
            <p>Welcome to CivicCare Medical Center, a beacon of health and healing in Dhaka, Bangladesh. Our commitment to serving the community is reflected in our state-of-the-art facilities and a team of highly skilled healthcare professionals. At CivicCare, we prioritize your well-being, offering personalized and compassionate care across a range of medical specialties. From routine check-ups to specialized treatments, we are your trusted partner in health, dedicated to providing excellence with integrity.<br><br>

            As a community-oriented institution, CivicCare Medical Center actively engages in health education and outreach programs, aiming to enhance public awareness and promote preventive healthcare. We take pride in fostering a healthier, happier community and appreciate the trust you place in us for your healthcare needs. Welcome to CivicCare Medical Center, where your health is our priority.</p>
        </div>
    </section>
    <!-- footer -->
    <footer class="bg-dark py-5 mt-5">
        <div class="container text-light text-center">
            <p class="display-5 mb-3">CivicCare Medical Center</p>
            <small class="text-white-50">&copy; Copyright by SABIT. All rights reserved.</small>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
  </body>
</html>