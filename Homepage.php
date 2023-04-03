<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'links.php' ?>
  <title>Homepage</title>
</head>
<style>
  a {
    text-decoration: none;
  }
</style>

<body>
  <!-- navabar starts here -->
  <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <div class="container-fluid navcontainer">
      <a class="navbar-brand" href="#">
        <img src="images/MaxHealthLogo.png" alt="MaxHealthLogo" class="Maxhealthlogo" />
      </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link homelink" href="#"><label for="" class="homelink">Home</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CustomerLogin.php"><label for="" class="homelink">Log In</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SignUpPage.php"><label for="" class="homelink">Sign Up</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Enquiry.php"><label for="" class="homelink">Enquiry</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Adminlogin.php"><label for="" class="homelink">Admin Log In</label></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navabar ends here -->
  <!-- header section -->
  <div class="headerimageplace" style="height: 100%">
    <div class="headerimagediv">
      <img src="images/HeaderBodyBuilderImage.jpg" alt="" srcset="" class="img-fluid headerimage1" />
    </div>
    <div class="tagline" style="width: 50%">
      <h1 style="
            color: white;
            font-size: 5vw;
            font-family: 'Varela Round', sans-serif;
          ">
        It's All About What can you Achieve
      </h1>
      <h3 style="
            color: white;
            font-size: 2vw;
            font-family: 'Cinzel', serif;
          ">
        Empower Yourself to make the changes you need to make.
      </h3>
      <a class="memberbtnbtn" style="text-decoration: none;" href="#about">About Us</a>
    </div>
  </div>
  <!-- header ends -->
  <!-- Packeges list -->
  <div class="classes row container-fluid mt-2 d-flex justify-content-around mb-2" style="width: 100%;background-color: white;">
    <h1 class="text-center" style="color: #00a6a6">Our Packages</h1>
    <hr />
    <!-- card1 -->
    <div class="card col-4 col-md-6 col-sm-12 mt-1" style="width: 400px" data-aos="fade-up">
      <img class="card-img-top" src="images/cardio.jpg" alt="Card image" style="width: 100%" />
      <div class="card-body">
        <h4 class="card-title">cardio</h4>
        <p class="card-text">
          cadiovascular fitness is health related component of physical
          fitness that is brought about by sustained physical activity.
        </p>

      </div>
    </div>
    <!-- card2 -->
    <div class="card col-4 col-md-6 col-sm-12 mt-1" style="width: 400px" data-aos="fade-up">
      <img class="card-img-top" src="images/Calisthenics.jpg" alt="Card image" style="width: 100%" />
      <div class="card-body">
        <h4 class="card-title">Calisthenics</h4>
        <p class="card-text">
          Calisthenics is type of workout that uses a person's body weight
          with little or no equipment.
        </p>

      </div>
    </div>
    <!-- card 3 -->
    <div class="card col-4 col-md-6 col-sm-12 mt-1" style="width: 400px" data-aos="fade-up">
      <img class="card-img-top" src="images/Yoga.jpg" alt="Card image" style="width: 100%" />
      <div class="card-body">
        <h4 class="card-title">Yoga</h4>
        <p class="card-text">
          Yoga is essentially a spiritual discipline based on an extremely
          subtle science,which focuses on bringing harmony between mind and
          body.
        </p>

      </div>
    </div>
    <!-- card4 -->
    <div class="card col-4 col-md-6 col-sm-12 mt-1" style="width: 400px" data-aos="fade-up">
      <img class="card-img-top" src="images/Crossfit.jpg" alt="Card image" style="width: 100%" />
      <div class="card-body">
        <h4 class="card-title">Crossfit</h4>
        <p class="card-text">
          CrossFit is a strength and conditioning workout that is made up of
          functional movement performed at a high intensity.
        </p>

      </div>
    </div>
    <div class="text-break mt-2 mb-2 container-fluid m-auto d-flex justify-content-center">
      <a href="HomePagePackage.php"><button class="manymorebtn">And many More......</button></a>
    </div>
  </div>
  <!-- package list ends -->


  <hr class="container" />
  <!-- training section starts -->
  <!-- row1 -->
  <div class="trainingsections container-fluid row rowfirst p-2 w-100" style="background-color: black">
    <div class="firstrowimage col-lg-6 col-md-12 mt-2" data-aos="fade-right">
      <img src="images/WeightTraining.jpg" alt="" srcset="" style="width: 100%" class="img-fluid" />
    </div>
    <div class="weighttraininginformation col-lg-6 col-md-12 mt-2">
      <h2 style="color: #00a6a6; font-size: 3vw">
        <span><img src="images/weightlifter-silhouette-100x100.png" alt="" style="height: 50px; width: 50px;font-family: 'Questrial', sans-serif;" /></span>Weight Training
      </h2>
      <p style="font-size: 2.2vw; color: white;font-family: 'Cinzel', serif;" class="">
        From bodybuilding to powerlifting and everything in between,the
        Fitness Factory has the equipment to help you to reach goal.With
        dumbell up to 150lbs,7 squat racks,5 deadlift platforms, 2 competition
        benches and variety of plate loaded and pin loaded machine,we have
        everything you need.
      </p>
    </div>
  </div>
  <!-- row1 ends -->
  <!-- row2 -->
  <div class="trainingsections container-fluid row rowfirst p-2 w-100" style="background-color: black">
    <div class="weighttraininginformation col-lg-6 col-md-12 mt-2">
      <h2 style="color: #00a6a6; font-size: 3vw">
        <span><img src="images/exercise-100x100.png" alt="" style="height: 50px; width: 50px;font-family: 'Questrial', sans-serif;" /></span>General Fitness
      </h2>
      <p style="font-size: 2.2vw; color: white;font-family: 'Cinzel', serif;" class="">
        If your goals are to improve your overall health and wellness, we have
        everything you need. We have cardio equipment spanning two floors
        including 8 stepmills, 15+ treadmills, row machines, exercise bikes,
        spin bikes, ellipticals, arc trainers and even a Jacob's Ladder. In
        addition to cardio equipment, we have stretching areas with mats, foam
        rollers, bands, light weights, and much more.
      </p>
    </div>
    <div class="firstrowimage col-lg-6 col-md-12 mt-2" data-aos="fade-left">
      <img src="images/Treadmill.jpg" alt="" srcset="" style="width: 100%" class="img-fluid" />
    </div>
  </div>
  <!-- row2 ends -->
  <!-- row3 -->
  <div class="trainingsections container-fluid row rowfirst p-2 w-100" style="background-color: black">
    <div class="firstrowimage col-lg-6 col-md-12 mt-2" data-aos="fade-right">
      <img src="images/Functionaltraining.jpg" alt="" srcset="" style="width: 100%" class="img-fluid" />
    </div>
    <div class="weighttraininginformation col-lg-6 col-md-12 mt-2">
      <h2 style="color: #00a6a6; font-size: 3vw">
        <span><img src="images/weightlifting-100x100.png" alt="" style="height: 50px; width: 50px;font-family: 'Questrial', sans-serif;" /></span>Functional
        Training
      </h2>
      <p style="font-size: 2.2vw; color: white;font-family: 'Cinzel', serif;" class="">
        With 60 feet of turf with a sled, stackable plyometric boxes, weighted
        medicine balls, battle ropes, squat racks, and deadlift platforms our
        functional training room has all the equipment you need to take your
        training to the next level.
      </p>
    </div>
  </div>
  <!-- row3 ends -->
  <hr class="container" style="background-color: #00a6a6;">
  <!-- about starts -->
  <div class="abouts container-fluid mb-2 text-center mt-2 w-50" style="background-color: black;color: white;" id="about">
    <h1 style="font-weight: bolder;font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;">About
      <span style="color: #ffd700;">Max</span><span style="color: #00a6a6;"> Muscle</span>
    </h1>
    <p style="font-size: 2vw;font-family: 'Questrial', sans-serif;">
      We're not here to carry you to fitness, we're
      here to motivate you to carry yourself to your
      goals.
    </p>
    <p style="font-size: 2vw;font-family: 'Questrial', sans-serif;">
      If you're not sure what your goals are,or don't know
      where to start on your fitness journey,come in and speak
      to one of our qualified trainers who can help you develope
      a plan.
    </p>
    <hr class="container" style="background-color: #ffd700;">
  </div>
  <!-- about ends -->
  <!-- footer starts -->
  <div class="footer mt-2 row container-fluid d-flex justify-content-between w-100">
    <!-- row 1 starts -->
    <div class="firstrowfooter col-md-6 col-lg-3">
      <ul class="footerrows">
        <li><span style="color: #ffd700;font-size: 50px;font-weight: bolder;">Max</span><span style="color: #00a6a6;font-size: 50px;font-weight: bolder;">
            Muscle</span></li>
        <li class="footercolors1">It's All About</li>
        <li class="footercolors1">What you can achieve.</li>
        <li class="footercolors2">Lift Today shape tommorrow</li>
      </ul>
    </div>
    <!-- row 1 ends -->
    <!-- row 2 starts -->
    <div class="secondrowfooter col-md-6 col-lg-3">
      <ul class="footerrows">
        <li class="footercolors2"><span><i class=""></i></span> Explore</li>
        <li class="footercolors1"><span><i class="fa-solid fa-dumbbell"></i></span> Home</li>
        <a href="CustomerLogin.php">
          <li class="footercolors1"><span><i class="fa-solid fa-right-to-bracket"></i></span> Log In</li>
        </a>
        <a href="SignUpPage.php">
          <li class="footercolors1"><span><i class="fa-solid fa-user-plus"></i></span> Sign Up</li>
        </a>
        <a href="Enquiry.php">
          <li class="footercolors1"><span><i class="fa-solid fa-message"></i></span> Enquiry</li>
        </a>
      </ul>
    </div>
    <!-- row 2 ends -->
    <!-- row 3 starts -->
    <div class="thirdrowfooter col-md-6 col-lg-3">
      <ul class="footerrows">
        <li class="footercolors2"><span><i class="fa-solid fa-location-dot"></i></span> Visit</li>
        <li>
          <p class="footercolors1">
            Subrao gavali talim <br>
            Mangalwar Peth kolhapur.
          </p>
        </li>
      </ul>
    </div>
    <!-- row 3 ends -->
    <div class="fourthrowfooter col-md-6 col-lg-3">
      <ul class="footerrows">
        <li class="footercolors2"><span><i class="fa-solid fa-hashtag"></i></span> Follow</li>
        <li class="footercolors1 instalogo"><span><i class="fa-brands fa-instagram"></i></span> Instagram</li>
        <li class="footercolors1 twitterlogo"><span><i class="fa-brands fa-twitter"></i></span> Twitter</li>
        <li class="footercolors1 facebooklogo"><span><i class="fa-brands fa-facebook"></i></span> Facebook</li>
      </ul>
    </div>
  </div>
  <!-- footer ends -->
  <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
  <!-- AOS JS -->
  <script src="lib/AnimationLibrary/AOS/aos.js"></script>
  <script>
    AOS.init({
      offset: 150,
      delay: 250,
    });
  </script>
</body>

</html>