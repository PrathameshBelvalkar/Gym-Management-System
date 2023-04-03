<!-- Program to get highest id from database -->
<?php
include 'connection.php';
$query = "select MAX(CustId) from customer";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
$ids = $row[0] + 1;
?>
<!-- ************** -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'links.php' ?>
  <title>Homepage</title>
</head>
<script>
  $(document).ready(function($) {
    $('#custnumber').mask("9999999999",{placeholder: ""});
    $('#cheight').mask("9.99",{placeholder: ""});
    // $('#cweight').mask("999",{placeholder: ""});
  });
</script>
<style>
  input:invalid {
    color: red;
  }
</style>

<body style="background-image: url('images/CustomerLoginbody.jpg');">
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
            <a class="nav-link homelink" href="Homepage.php"><label for="" class="homelink">Home</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="CustomerLogin.php"><label for="" class="homelink">Log In</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="Enquiry.php"><label for="" class="homelink">Enquiry</label></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- navabar ends here -->
  <div class="signupbody">
    <div class="signupformbody container-fluid w-75 mb-3">
      <h1 style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;" class="text-center">Sign Up To <span style="color: #ffd700;">Max</span><span style="color: #00a6a6;"> Muscle</span></h1>
      <form action="SignUpPage.php" autocomplete="off" method="POST">
        <div class="form-floating mb-3 mt-3">
          <input type="text" class="form-control" id="email" placeholder="" name="custid" readonly style="background-color: #ffffff;" value="<?php echo $ids; ?>">
          <label for="email">Customer Id</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="Enter Your FULL NAME" name="fname" required pattern="[a-zA-Z]+" title="Plase Enter only letters">
          <label for="pwd">First Name</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="Enter Your FULL NAME" name="lname" required pattern="[a-zA-Z]+" title="Plase Enter only letters">
          <label for="pwd">Last Name</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="number" class="form-control" id="pwd" placeholder="Enter Your Age" name="age" required pattern="[0-9]+([\.][0-9]{0,2})?">
          <label for="pwd">Age</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="custnumber" placeholder="Enter Your mobile" name="mob" required title="Enter your 10 digits Mobile number" pattern="[1-9]{1}[0-9]{9}" maxlength="10" minlength="10">
          <label for="pwd">Enter Your Mobile Number</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="Tdate" placeholder="" name="todaydate" readonly style="background-color: #ffffff;" value="<?php echo date('d/m/Y'); ?>">
          <label for="pwd">Registration Date</label>
        </div>
        <div class="form-floating">
          <select class="form-select" id="sel1" name="gender">
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
          <label for="sel1" class="form-label">Select Gender:</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="cweight" placeholder="Weight" name="weight" required title="Enter Only Numbers">
          <label for="pwd">Enter Your Weight</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="cheight" placeholder="Height" name="height" required pattern="[0-9]+(\.[0-9]{1,2})?%?" title="Enter only numbers">
          <label for="number">Enter Your Height(in feet)</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <select class="form-select" id="sel1" name="batch">
            <option value="Morning">Morning(5AM-10Am)</option>
            <option value="Evening">Evening(5PM-10PM)</option>
          </select>
          <label for="sel1" class="form-label">Select Batch:</label>
        </div>
        <div class="form-floating">
          <textarea class="form-control" id="comment" name="address" placeholder="Your Adress" style="resize: none;" rows="3" required></textarea>
          <label for="comment">Enter Your Adress</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="Password" class="form-control" id="pwd" placeholder="Password" name="password" required>
          <label for="pwd">Enter Your Password</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="email" class="form-control" id="pwd" placeholder="Your Email Address" name="email" required pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="Please enter Valid Email Adress">
          <label for="pwd">Enter Your Email</label>
        </div>
        <div class="signupformbtn container-fluid">
          <button type="submit" class="signupbtn" name="submit"><span><i class="fa-solid fa-user-plus"></i></span> Sign Up</button>
          <button type="reset" class="signupbtn bg-danger"><span><i class="fa-solid fa-circle-xmark"></i></span> Cancel</button>
        </div>
      </form>
    </div>
  </div>
  <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
  <!-- insert into database php -->
  <?php
  include 'connection.php';
  if (isset($_POST['submit'])) {
    $custid = $_POST['custid'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $age = $_POST['age'];
    $mob = $_POST['mob'];
    $date = $_POST['todaydate'];
    $gender = $_POST['gender'];
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $batch = $_POST['batch'];
    $address = $_POST['address'];
    $passwords = $_POST['password'];
    $email = $_POST['email'];

    // insert query
    $insertquery = "insert into customer(CustId,Fname,Lname,Age,MOB,Date,Gender,Weight,Height,Batch,Address,Password, email)
    values('$custid','$fname','$lname','$age','$mob','$date','$gender','$weight','$height','$batch','$address','$passwords','$email')";
    $res = mysqli_query($con, $insertquery);
    if ($res) {
  ?>
      <script>
        Swal.fire({
          title: 'Success',
          text: 'Sign Up Successful',
          icon: 'success',
          confirmButtonText: '<a href="CustomerLogin.php" style="text-decoration:none;color:white;font-size:25px"><i class="fa-solid fa-thumbs-up"></i>Thank You</a>',
          footer: '<a href="" style="text-decoration:none;color:red;font-weight:bolder;">Please Remember Your Email And Password</a>'
        })
      </script>
    <?php
    } else {
      echo mysqli_error($con);
    ?>
      <script>
        Swal.fire({
            title: 'Server Error!',
            text: '<?php echo mysqli_error($con);?>',
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