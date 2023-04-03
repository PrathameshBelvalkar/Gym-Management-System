<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'links.php' ?>
  <title>customer Login</title>
</head>
<style>
</style>

<body>
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
            <a class="nav-link homelink" href="Homepage.php"><label for="" class="homelink">Home</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="SignUpPage.php"><label for="" class="homelink">Sign Up</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Enquiry.php"><label for="" class="homelink">Enquiry</label></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->
  <div class="Customerloginbody container-fluid" style="background-image: url('images/CustomerLoginbody.jpg');">
    <div class="custloginformbody p-3 container-fluid d-flex justify-content-between">
      <form class="w-100" autocomplete="off" method="POST" action="CustomerLogin.php">
        <div class="text-center">
          <h4>Log in</h4>
          <h6 style="color: #333333;" class="mt-2">New To MAX Muscle?<span class="m-lg-2"><a href="SignUpPage.php" style="color: #ffd700;text-decoration: none;">Sign Up Now!</a></span></h6>
        </div>
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="email" placeholder="Enter email" name="email">
          <label for="email">Email</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pass">
          <label for="pwd">Password</label>
        </div>
        <button type="submit" class="custloginbtn w-100" name="submit"><span><i class="fa-solid fa-right-to-bracket"></i></span> Log In</button>
      </form>
    </div>
  </div>
  <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
  <?php
  include 'connection.php';
  if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $_SESSION['getmail'] = $email;
    // seesion variable created getmail
    $custpass = $_POST['pass'];
    $loginquery = "select Password,email from customer where email='" . $email . "' AND Password='" . $custpass . "' limit 1";
    $success = mysqli_query($con, $loginquery);
    if (mysqli_num_rows($success) == 1) {
  ?>
      <script>
        location.replace('ChhosePackage.php');
      </script>
    <?php
    } else {
    ?>
      <script>
        Swal.fire({
          title: 'Login Failed',
          text: 'Please Check Your email and password',
          icon: 'error',
          confirmButtonText: '<a href="CustomerLogin.php" style="text-decoration:none;color:white;">Ok</a>'
        })
      </script>
  <?php
    }
  }
  ?>

  ?>
</body>

</html>