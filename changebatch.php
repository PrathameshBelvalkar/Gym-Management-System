<?php
$batchid=$_GET['batchid'];
$custname=$_GET['batchname'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
    <title>Change Customer Batch</title>
</head>
<style>
    .changebatch{
        margin: 0 auto;
    }
</style>
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
                <a class="nav-link" href="dashboard3.php"><label for="" class="homelink">Dashboard</label></a>
              </li>
             
            </ul>
          </div>
        </div>
      </nav>
      <div class="changebatch mt-2 p-2 container bg-light">
        <h4>Change Your Batch</h4>
        <form action="" method="post">
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="pwd" placeholder="" name="batchid" readonly value="<?php echo $batchid?>">
                <label for="pwd">Customer Id</label> 
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="pwd" placeholder="" name="batchname" readonly value="<?php echo $custname?>">
                <label for="pwd">Customer Name</label> 
            </div>
            <div class="form-floating mt-3 mb-3">
                <select class="form-select" id="sel1" name="batchchange">
                  <option value="Morning">Morning(5AM-10Am)</option>
                  <option value="Evening">Evening(5PM-10PM)</option>
                </select>
                <label for="sel1" class="form-label text-danger">Change Batch:</label>
            </div>
            <button class="btn btn-success w-100" style="font-size: 25px;" name="upbatch">Change Batch</button>
        </form>
      </div>
      <!-- update php -->
      <?php
      include 'connection.php';
      if(isset($_POST['upbatch'])){
        $custid=$_GET['batchid'];
        $batchchange=$_POST['batchchange'];
        $updatequery="update billing set Batch='$batchchange' where CustID='$custid'";
        $query=mysqli_query($con,$updatequery);
        if($query){
          ?>
          <script>
            Swal.fire({
            title: 'Success',
            text: 'Batch Updated',
            icon: 'success',
            confirmButtonText: '<a href="" style="text-decoration:none;color:white;font-size:25px">Done</a>'
            })
          </script>
          <?php
            }else{
              echo mysqli_error($con);
            }
          }
          ?>
  <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>