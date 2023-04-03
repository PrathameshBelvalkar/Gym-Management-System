<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <?php include 'links.php'?>
  <title>Customer Login</title>
</head>

<body class="adminloginbody img-fluid"  style="background-image: url('images/CustomerLoginbody.jpg');">
  <!-- navabar starts -->
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
        </ul>
      </div>
    </div>
  </nav>
  <!-- navbar ends -->
  <div class="formbody p-3">
    <form action="Adminlogin.php" method="POST" autocomplete="off">
      <h3 style="color: #00a6a6" class="text-center">Admin Login</h3>
      <div class="mb-3 mt-3">
        <label for="email" style="font-size: 20px"><span><i class="fa-solid fa-user"></i></span> Admin Username</label>
        <input type="text" class="form-control admininput" id="email" placeholder="Enter Username" name="adminuser" />
      </div>
      <div class="mb-3">
        <label for="pwd" style="font-size: 20px"><span><i class="fa-solid fa-unlock-keyhole"></i></span> Admin Password</label>
        <input type="password" class="form-control admininput" id="pwd" placeholder="Enter password" name="adminpass" />
      </div>
      <button type="submit" class="adminloginbtn" name="submit"><span><i class="fa-solid fa-right-to-bracket"></i></span> Log In</button>
    </form>
  </div>

  <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
  <!-- php starts here -->
  <?php
  if(isset($_POST['submit'])){
    $adminuser=$_POST['adminuser'];
    $adminPassword=$_POST['adminpass'];
    $_SESSION['getadmin']=$adminuser;
    if($adminuser=='admin' && $adminPassword=='123456'){
      ?>
      <script>
        location.replace('dashboard3.php');
      </script>
  <?php
    }
    else
    {
  ?>
    <script>
                Swal.fire({
                title: 'Login Failed',
                text: 'Please check your Username and Password',
                icon: 'error',
                confirmButtonText: '<a href="" style="text-decoration:none;color:white;font-size:25px;"><i class="fa-solid fa-thumbs-down"></i> Ok</a>'
                })
    </script>
  <?php
    }
  }
  ?>
</body>

</html>