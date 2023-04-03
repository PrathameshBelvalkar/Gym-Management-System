<?php
session_start();
$monthdate = date("Y-m-d", strtotime(date("Y-m-d", strtotime(date("Y-m-d"))) . "+1 month"));
if (!isset($_SESSION['getmail'])) {
  header('location:CustomerLogin.php');
}
// $costs = $_GET['costss'];
// $namess = $_GET['namess'];
if(isset($_GET['costss'])){
  $costs = $_GET['costss']; 
}
if(isset($_GET['namess'])){
  $namess = $_GET['namess']; 
}
?>
<?php
include 'connection.php';
$query = "select MAX(BillId) from billing";
$resultss = mysqli_query($con, $query);
$row = mysqli_fetch_row($resultss);
$ids = $row[0] + 1;
?>
<?php
include 'connection.php';
if (isset($_POST['selection'])) {
  include 'connection.php';
  $getpacakgename = $_POST['packagename'];
  $querys = "select * from package where PackageName='" . $getpacakgename . "'";
  $showcost = mysqli_query($con, $querys);
  while ($pcost = mysqli_fetch_array($showcost)) {
    $pcosts = $pcost['PackageCost'];
    $pnames = $pcost['PackageName'];
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include 'links.php' ?>
  <title>Billing</title>
</head>
<style>

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
            <a class="nav-link" href="ChhosePackage.php"><label for="" class="homelink">Packages</label></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"><label for="" class="homelink">LOGOUT</label></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <div class="billingform container w-100 bg-light mt-3 p-3" style="border-radius: 5px;">
    <h4 style="color: #00a6a6;">Billing Information</h4>
    <?php
    include 'connection.php';
    $custmail = $_SESSION['getmail'];
    $showdata = "select * from customer where email='" . $custmail . "'";
    $squery = mysqli_query($con, $showdata);
    
    while ($rus = mysqli_fetch_array($squery)) {
    ?>
      <form action="Billing.php" method="post" autocomplete="off">
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="" name="bid" required readonly style="background-color: #ffffff;" value="<?php echo $ids ?>">
          <label for="pwd">Bill Id</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="" name="cid" required readonly style="background-color: #ffffff;" value="<?php echo $rus['CustId']; ?>">
          <label for="pwd">Customer Id</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="" name="cname" required readonly style="background-color: #ffffff;" value="<?php echo $rus['Fname'] . " " . $rus['Lname']; ?>">
          <label for="pwd">Customer name</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="" name="cmail" required readonly style="background-color: #ffffff;" value="<?php echo $_SESSION['getmail']; ?>">
          <label for="pwd">Customer mail</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="" name="cbatch" required readonly style="background-color: #ffffff;" value="<?php echo $rus['Batch']; ?>">
          <label for="pwd">Selected Batch</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="" name="bdate" required style="background-color: #ffffff;" value="<?php echo date('Y-m-d'); ?>" readonly>
          <label for="pwd">Bill Date</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pwd" placeholder="" name="expdate" required style="background-color: #ffffff;" value="<?php echo $monthdate; ?>" readonly>
          <label for="pwd">Expiry Date</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pselect" placeholder="" name="selectedpackage" required style="background-color: #ffffff;" value="<?php echo $namess ?>" readonly>
          <label for="pwd">Your Selected Package is</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="pcost" placeholder="" name="pacost" required style="background-color: #ffffff;" value="<?php echo $costs; ?>" readonly>
          <label for="pwd">Package Cost</label>
        </div>
        <div class="form-floating mt-3 mb-3">
          <input type="text" class="form-control" id="ptotal" placeholder="" name="total" required style="background-color: #ffffff;" readonly value="<?php echo $costs; ?>&#8377">
          <label for="pwd">Total</label>
        </div>
        <a href="payment.php"><button type="submit" class="btn btn-success" style="width: 100%;font-size: 20px;" name="submits" id="subbtn" data-bs-toggle="modal" data-bs-target="#myModal">Make A Way To Billing!</button></a>
      </form>
    <?php
    }
    ?>
  </div>

  
  <?php
  // include 'connection.php';
  if (isset($_POST['submits'])) {
    // i don't know
  
    // ************************
    $bid = $_POST['bid'];
    $cid = $_POST['cid'];
    $cname = $_POST['cname'];
    $cmail = $_POST['cmail'];
    $cbatch = $_POST['cbatch'];
    $bdate = $_POST['bdate'];
    $expdate = $_POST['expdate'];
    $selected = $_POST['selectedpackage'];
    $pacost = $_POST['pacost'];
    $totals = $_POST['total'];
    // sessions
    $_SESSION['billids'] = $bid;
    $_SESSION['custids'] = $cid;
    $_SESSION['custsname'] = $cname;
    $_SESSION['custmails'] = $cmail;
    $_SESSION['batches'] = $cbatch;
    $_SESSION['bdates'] = $bdate;
    $_SESSION['expdatess'] = $expdate;
    $_SESSION['packagenamess'] = $selected;
    $_SESSION['packagecosts'] = $pacost;
    $_SESSION['totalss'] = $pacost;
      
    ?>
    <script>
       window.location.href="payment.php";
    </script>
    <?php
  }
    ?>
</body>

</html>