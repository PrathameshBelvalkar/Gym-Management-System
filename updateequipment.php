<?php
$eqid=$_GET['eqid'];
$eqname=$_GET['eqname'];
$eqdate=$_GET['eqdate'];
$eqquan=$_GET['eqquan'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
    <title>Document</title>
</head>
<style>
    .addequipment{
        margin: 0 auto;
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
      <div class="addequipment mt-3 p-2 bg-light container">
        <h4 style="color: #999999;">Update Your Gym Equipments</h4>
        <form action="" method="post" autocomplete="off">
            <div class="form-floating mb-3 mt-3">
              <input type="text" class="form-control inputss" id="email" name="eid" value="<?php echo $eqid?>" readonly style="background-color: #ffffff;">
              <label for="email">Equipment Id</label>
            </div>
            <div class="form-floating mt-3 mb-3">
              <input type="text" class="form-control inputss" id="pwd" name="ename" value="<?php echo $eqname?>">
              <label for="pwd">Equipment Name</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control inputss" id="pwd" name="edate" value="<?php echo date('d/m/Y');?>" readonly style="background-color: #ffffff;">
                <label for="pwd">Date</label>
              </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control inputss" id="pwd" name="equantity" value="<?php echo $eqquan?>">
                <label for="pwd">Equipment Quantity</label>
            </div>
            <button type="submit" class="btn btn-success w-100" style="font-size: 25px;" name="upequip">Update Equipment</button>
          </form>
      </div>
    <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
  <?php
  include 'connection.php';
  if(isset($_POST['upequip'])){
  $eid=$_POST['eid'];
  $ename=$_POST['ename'];
  $edate=$_POST['edate'];
  $equantity=$_POST['equantity'];
  $upquery="update equipment set eid='$eid',ename='$ename',edate='$edate',equantity='$equantity' where eid='$eid'";
  $runquery=mysqli_query($con,$upquery);
  if($runquery){
    ?>
    <script>
      Swal.fire({
            title: 'Success',
            text: 'Your Equpment is Updated',
            icon: 'success',
            confirmButtonText: '<a href="dashboard3.php" style="text-decoration:none;color:white;font-size:25px"><i class="fa-solid fa-thumbs-up"></i>Done</a>'
            })
    </script>
    <?php
    }
    else
    {
      echo mysqli_error($con);
      ?>
      <script>
      
      </script>
      <?php
    }
    }
  ?>
</body>
</html>