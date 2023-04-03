<?php
$cid=$_GET['id'];
$cfname=$_GET['fname'];
$clname=$_GET['lname'];
$cage=$_GET['age'];
$cmob=$_GET['mob'];
$cweight=$_GET['weight'];
$cheight=$_GET['height'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
  <title>Update Customer</title>
</head>
<style>
    .updatecustomer{
        margin: 0 auto;
    }
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
                <a class="nav-link" href="dashboard3.php"><label for="" class="homelink">Dashboard</label></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="updatecustomer bg-light mt-3 p-3">
        <h4 style="color: #999999;">Update Your Customer Information</h4>
        <form action="" method="post">
          <?php 
          include 'connection.php';
          if(isset($_POST['uppackage'])){
            $updateid=$_GET['id'];
            $fname=$_POST['cfname'];
            $lname=$_POST['clname'];
            $age=$_POST['cage'];
            $mob=$_POST['cmob'];
            $weight=$_POST['cweight'];
            $height=$_POST['cheight'];
            $batch=$_POST['cbatch'];
            $uppackage="update customer set Fname='$fname',Lname='$lname',Age='$age',MOB='$mob',Weight='$weight',Height='$height',Batch='$batch' where CustId='$updateid'";
            $query=mysqli_query($con,$uppackage);
            if($query)
            {
              ?>
              <script>
                Swal.fire({
            title: 'Success',
            text: 'Customer information Updated Successfuly',
            icon: 'success',
            confirmButtonText: '<a href="dashboard3.php" style="text-decoration:none;color:white;font-size:25px"><i class="fa-solid fa-thumbs-up"></i> Done</a>',
            })
              </script>
              <?php
              }
              else
              {
                echo mysqli_error($con);
              }
            }
              ?>
              
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="" placeholder="Fisrt Name" name="cid"  style="background-color: #ffffff;" value="<?php echo $cid?>">
                <label for="email">Customer Id</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="" placeholder="Fisrt Name" name="cfname"  style="background-color: #ffffff;" value="<?php echo $cfname?>">
                <label for="email">Customer First Name</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="" placeholder="Last Name" name="clname"  style="background-color: #ffffff;" value="<?php echo $clname?>">
                <label for="email">Customer Last Name</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" id="" placeholder="Age" name="cage"  style="background-color: #ffffff;" value="<?php echo $cage?>">
                <label for="email">Age</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" id="" placeholder="Mobile Number" name="cmob"  style="background-color: #ffffff;" value="<?php echo $cmob?>">
                <label for="email">Mobile Number</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input type="number" class="form-control" id="" placeholder="Weight" name="cweight"  style="background-color: #ffffff;" value="<?php echo $cweight?>">
                <label for="email">Weight</label>
            </div>
            <div class="form-floating mb-3 mt-3">
                <input type="text" class="form-control" id="" placeholder="Height" name="cheight"  style="background-color: #ffffff;" value="<?php echo $cheight?>">
                <label for="email">Height</label>
            </div>
            <div class="form-floating mb-3 mt-3">
              <select class="form-select" id="sel1" name="cbatch">
                <option value="Morning">Morning(5AM-10AM)</option>
                <option value="Evening">Evening(5PM-10PM)</option>
              </select>
              <label for="sel1" class="form-label">Select Batch:</label>
            </div>
            <button class="btn btn-success w-100" style="font-size: 25px;" name="uppackage">Update</button>
        </form>
      </div>
      <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>