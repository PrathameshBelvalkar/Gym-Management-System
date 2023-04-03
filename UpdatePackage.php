<?php
$idss=$_GET['idss'];
$namess=$_GET['namess'];
$costss=$_GET['costss'];
$durss=$_GET['durss'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
    <title>Add Packages</title>
</head>
<style>
  *{
    margin: 0;
    padding: 0;
  }
  .packageform{
    margin: 0 auto;
    background-color: #ffffff;
    padding: 10px;
    width: 90%;
    border-radius: 5px;
  }
</style>
<body style="background-color: #333333;">
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
      <div class="packageform mt-4">
        <h2 class="text-center" style="color: #999999;">Update Your Package</h2>
        <form action="" autocomplete="off" method="POST">
        <?php
  include 'connection.php';
  $showQuery="select * from package where PackageId={$idss}";
  $showdata=mysqli_query($con,$showQuery);
  $arrdata=mysqli_fetch_array($showdata);
  if(isset($_POST['upsubmit'])){
    $idupdate=$_GET['idss'];
    $pid=$_POST['pid'];
    $pname=$_POST['pname'];
    $pcost=$_POST['pcost'];
    $pdur=$_POST['pdur'];
    $updatequery="update package set PackageId='$pid',PackageName='$pname',PackageCost='$pcost',PackageDuration='$pdur' where PackageId='$idupdate'";
    $packupdate=mysqli_query($con,$updatequery);
    if($packupdate){
      ?>
      <script>
        Swal.fire({
            title: 'Success',
            text: 'Package Updated Successfuly',
            icon: 'success',
            confirmButtonText: '<a href="dashboard3.php" style="text-decoration:none;color:white;font-size:25px"><i class="fa-solid fa-thumbs-up"></i> Done</a>',
            })
      </script>
      <?php
    }
    else
    {
  ?>
      <script>
      </script>
  <?php
  echo mysqli_errno($con);
    }
  }
  ?>
          <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="email" placeholder="Package Id" name="pid" readonly style="background-color: #ffffff;" value="<?php echo $arrdata[0];?>">
            <label for="email">Package Id</label>
          </div>
          <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" id="pwd" placeholder="Package name" name="pname" required value="<?php echo $arrdata[1];?>">
            <label for="pwd">Package name</label>
          </div>
          <div class="form-floating mt-3 mb-3">
            <input type="number" class="form-control" id="pwd" placeholder="Package Cost" name="pcost" required value="<?php echo $arrdata[2];?>">
            <label for="pwd">Package Cost</label>
          </div>
          <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" id="pwd" placeholder="Package Duration" name="pdur" required value="<?php echo $arrdata[3];?>">
            <label for="pwd">Package Duration</label>
          </div>
          <button type="submit" class="btn w-100" name="upsubmit" style="background-color: #00a6a6;color: #ffffff;font-size: 21px;"> Update</button>
        </form>
    </div>
    <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
  
  <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>