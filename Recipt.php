<?php
session_start();
if(!isset($_SESSION['getmail'])){
  header('location:CustomerLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
  <title>Recipt</title>
</head>
<style>
    *{
        margin: 0;
        padding: 0;
    }
    .reciptbody{
        background-color: white;
        border-radius: 5px;
        width: 75%;
        height: auto;
        margin: 0 auto;
        padding: 7px;
    }
</style>
<body style="background-color: #FF9899;">
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
                <a class="nav-link" href="ChhosePackage.php"><label for="" class="homelink">Packages</label></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"><label for="" class="homelink">LOGOUT</label></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="reciptbody mt-2 table-responsive" id="DivIdToPrint">
        <div class="reciptheder">
            <div class="reciptimage">
                <img src="images/MaxHealthLogo.png" alt="Logo" srcset="" style="height: 150px;width: 250px;">
            </div>

            <hr style="background-color: #00a6a6;">
        </div>
        <div class="custname">
            <h3 style="margin-left: 20px;color: #00a6a6;"><?php echo $_SESSION['custsname'];?></h3>
        </div>
        <div class="billtable table-responsive">
            <table class="table table-bordered text-center">
                <thead class="table-active">
                    <th>Package Name</th>
                    <th>Package cost</th>
                    <th>Package Duration</th>
                    <th>Batch</th>
                    <th>Billing date</th>
                    <th>Expiry Date</th>
                </thead>
                <tbody>
                    <tr>
                        <td><?php echo $_SESSION['packagenamess'];?></td>
                        <td><?php echo $_SESSION['packagecosts'];?></td>
                        <td>1 Month</td>
                        <td><?php echo $_SESSION['batches'];?></td>
                        <td><?php echo $_SESSION['bdates'];?></td>
                        <td><?php echo $_SESSION['expdatess'];?></td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="billtotal d-flex justify-content-end">
            <h3 style="color: royalblue;">Total:- &#8377 <?php echo $_SESSION['packagecosts'];?></h3>
        </div>
        <!-- <div class="printbtn">
          <button class="btn btn-success w-100" style="font-size:25px;">Print Your Recipt</button>
        </div> -->
      </div>
</body>
</html>
<script>
  $(document).ready(function(){
    Swal.fire({
    position: 'center',
    icon: 'success',
    title: 'Billing Successful',
    showConfirmButton: false,
    timer: 1500
  })
  })
</script>
<!-- bootstrap script -->
<script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>