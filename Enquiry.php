<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
  <title>Enquiry</title>
</head>
<script>
  $(document).ready(function($) {
    $('#custnumber').mask("9999999999",{placeholder: ""});
  });
</script>
<body style="background-image: url('images/CustomerLoginbody.jpg');">
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
                <a class="nav-link" href="CustomerLogin.php"><label for="" class="homelink">Log In</label></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="SignUpPage.php"><label for="" class="homelink">Sign Up</label></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="Adminlogin.php"><label for="" class="homelink">Admin Log In</label></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="enquirybody w-75">
        <form action="Enquiry.php" autocomplete="off" method="POST">
        <table class="w-100">
            <tr>
                <td>
                    <div class="form-floating mt-1 mb-1">
                        <input type="text" class="form-control" id="pwd" placeholder="Enter Your First Name" name="fname" required pattern="[a-zA-Z]+" title="Plase Enter only letters">
                        <label for="pwd">First Name</label> 
                    </div>
                </td>
                <td>
                    <div class="form-floating mt-1 mb-1 m-lg-1">
                        <input type="text" class="form-control" id="pwd" placeholder="Enter Your Last Name" name="lname" required pattern="[a-zA-Z]+" title="Plase Enter only letters">
                        <label for="pwd">Last Name</label> 
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <div class="form-floating mt-1 mb-1">
                        <input type="email" class="form-control" id="pwd" placeholder="abc@gmail.com" name="email" required pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Please enter Valid Email Adress">
                        <label for="pwd">Email</label> 
                    </div>
                </td>
            </tr>
            <tr>
              <td colspan="2">
                  <div class="form-floating mt-1 mb-1">
                      <input type="text" class="form-control" id="custnumber" placeholder="Enter Your Mobile Number" name="mob" required>
                      <label for="pwd">Mobile Number</label> 
                  </div>
              </td>
          </tr>
            <tr>
                <td colspan="2">
                    <div class="form-floating mt-1 mb-1">
                        <input type="text" class="form-control" id="pwd" placeholder="Enter Your Message" name="message" required>
                        <label for="pwd">Message</label> 
                    </div>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <button type="submit" class="btn btn-danger" style="width: 100%;font-size: 20px;" name="submit"><span><i class="fa-solid fa-message"></i></span> Send Message</button>
                </td>
            </tr>
        </table>
        </form>
        <hr class="w-100 bg-danger" style="color: #333333;">
        <div class="enquiryinformation">
        <h4>Contact Information</h4>
        <P style="color: #333333;" class="enquiryinformationp"><span><i class="fa-solid fa-location-dot"></i></span> Mangalwar Peth,Kolhapur.</P>
        <p style="color: #333333;" class="enquiryinformationp"><span><i class="fa-solid fa-mobile-screen"></i></span> +91 8329247172</p>
        <p style="color: #333333;" class="enquiryinformationp"><span><i class="fa-solid fa-envelope"></i></span> XYZ@gmail.com</p>
        </div>
    </div>
  <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
  <?php
  include 'connection.php';
  if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $mob=$_POST['mob'];
    $message=$_POST['message'];
    $InserQuery="insert into enquiry(FNAME,LNAME,EMAIL,MOB,MESSAGE) values ('$fname','$lname','$email','$mob','$message')";
    $res=mysqli_query($con,$InserQuery);
    if($res){
      ?>
      <script>
        Swal.fire({
        position: 'center',
        icon: 'question',
        title: 'Enquiry Send!',
        showConfirmButton: false,
        timer: 1500
      })
      </script>
      <?php
    }
    else
    {
  ?>
  <script>
     Swal.fire({
                title: 'Server Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: '<a href="Homepage.php" style="text-decoration:none;color:white;">Go Back</a>'
                })
  </script>
  <?php
    }
  }
  ?>
</body>
</html>