<?php
include 'connection.php';
$query="select MAX(PackageId) from package";
$result=mysqli_query($con,$query);
$row=mysqli_fetch_row($result);
$ids=$row[0]+1;  
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
        <h2 class="text-center">View And Add packages</h2>
        <form action="AddPackagelist.php" autocomplete="off" method="POST">
          <div class="form-floating mb-3 mt-3">
            <input type="text" class="form-control" id="email" placeholder="Package Id" name="pid" readonly style="background-color: #ffffff;" value="<?php echo $ids;?>">
            <label for="email">Package Id</label>
          </div>
          <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" id="pwd" placeholder="Package name" name="pname" required>
            <label for="pwd">Package name</label>
          </div>
          <div class="form-floating mt-3 mb-3">
            <input type="number" class="form-control" id="pwd" placeholder="Package Cost" name="pcost" required>
            <label for="pwd">Package Cost</label>
          </div>
          <div class="form-floating mt-3 mb-3">
            <input type="text" class="form-control" id="pwd" placeholder="Package Duration" name="pdur" required>
            <label for="pwd">Package Duration</label>
          </div>
          <button type="submit" class="btn w-100" name="submit" style="background-color: #00a6a6;color: #ffffff;font-size: 21px;">Add Package</button>
        </form>
    
      <div class="packagetable mt-2 table-responsive">
        <table class="custable1 table" style="width: 100%;">
          <thead>
              <tr class="text-center">
                  <th>Package Id</th>
                  <th>Package Name</th>
                  <th>Package Cost</th>
                  <th>Package Duration</th>
                  <th colspan="2">Operations</th>
              </tr>
          </thead>
          <tbody>
                    <?php
                    include 'connection.php';
                    $selectQuery="select * from package";
                    $query=mysqli_query($con,$selectQuery);
                    while($ress=mysqli_fetch_array($query)){
                    ?>
                      <tr class="text-center">
                        <td><?php echo $ress['PackageId'];?></td>
                        <td><?php echo $ress['PackageName'];?></td>
                        <td><?php echo $ress['PackageCost'];?></td>
                        <td><?php echo $ress['PackageDuration'];?></td>
                        <td><a href="UpdatePackage.php?idss=<?php echo $ress['PackageId'];?>&namess=<?php echo $ress['PackageName'];?>&costss=<?php echo $ress['PackageCost'];?>&durss=<?php echo $ress['PackageDuration'];?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title=""><button class="btn btn-success w-75">Update</button></a></td>
                        <td><a href="DeletePackage.php?idsss=<?php echo $ress['PackageId'];?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title=""><button class="btn btn-danger w-75">Delete</button></a></td>
                      </tr>
                      <?php
                       }
                      ?>
        </tbody>
      </table>
      </div>
    </div>>
    <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
  <?php
  include 'connection.php';
  if(isset($_POST['submit'])){
    $pid=$_POST['pid'];
    $pname=$_POST['pname'];
    $pcost=$_POST['pcost'];
    $pdur=$_POST['pdur'];
    $insertquery="insert into package(PackageId,PackageName,PackageCost,PackageDuration) values('$pid','$pname','$pcost','$pdur')";
    $packinsert=mysqli_query($con,$insertquery);
    if($packinsert){
      ?>
      <script>
        Swal.fire({
            title: 'Success',
            text: 'Package Inserted Successfuly',
            icon: 'success',
            confirmButtonText: '<a href="AddPackagelist.php" style="text-decoration:none;color:white;font-size:25px"><i class="fa-solid fa-thumbs-up"></i> Done</a>',
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
                confirmButtonText: '<a href="AddPackagelist.php" style="text-decoration:none;color:white;">Go Back</a>'
                })
      </script>
  <?php
    }
  }
  ?>
<script>
var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
  return new bootstrap.Tooltip(tooltipTriggerEl)
})
</script>
<!-- bootstrap script -->
<script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>