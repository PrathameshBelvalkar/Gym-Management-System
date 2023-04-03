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
  <title>Choose Package</title>
</head>
<style>
 *{
  margin: 0;
  padding: 0;
 }
 .pname,.pdur{
  border: none;
  text-align: center;
 }
 .pname:focus{
  outline: none;
 }
  .pdur:focus{
    outline: none;
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
                <a class="nav-link" href="Enquiry.php"><label for="" class="homelink">Enquiry</label></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="mypackages.php"><label for="" class="homelink">My Packages</label></a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="logout.php"><label for="" class="homelink">LOGOUT</label></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="customerinformation container-fluid w-100 bg-light p-2">
      <?php
        include 'connection.php';
        $namess=$_SESSION['getmail'];
        $showquery="Select Fname,Lname from customer where email='".$namess."'";
        $namequery=mysqli_query($con,$showquery);
        while($rus=mysqli_fetch_array($namequery)){
        $_SESSION['firstnames']=$rus['Fname'];
        ?>
        <h4>Name:<span> <?php echo $rus['Fname'];?></span><span> <?php echo $rus['Lname'];?></span></h4>
          <?php
        }
          ?>
        <h4>Email:<span style="color: #00a6a6;"> <?php echo $_SESSION['getmail'];?></span></h4>

      </div>

      <div class="choosepackage container w-100 bg-light p-2 mt-3 table-responsive" style="border-radius: 5px;">
      <h4 class="text-center">See Our Available Packages</h4>
      <form action="" method="post">
        <table class="table w-100">
            <thead>
                <tr class="text-center">
                    <th>Package Name</th>
                    <th>Package Duration</th>
                    <th>Package Cost</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
            <?php
                    include 'connection.php';
                    $selectQuery="select * from package";
                    $query=mysqli_query($con,$selectQuery);
                    while($ress=mysqli_fetch_array($query))
                    {
                      
                    ?>
                <tr class="text-center">
                    <td>
                      <input type="text" value="<?php echo $ress['PackageName'];?>" name="pname" class="pname bg-light" readonly>
                    </td>
                    <td>
                      <input type="text" value="<?php echo $ress['PackageDuration'];?>" name="pdur" class="pdur bg-light" readonly>
                    </td>
                    <td><input type="text" value="<?php echo $ress['PackageCost'];?>" name="pcos" class="pdur bg-light" readonly></td>
                    <td><a href="" class="btn-btn-success"><a href="Billing.php?costss=<?php echo $ress['PackageCost'];?>&namess=<?php echo $ress['PackageName'];?>" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" class="btn btn-success"><i class="fa-solid fa-cart-shopping"></i> Buy</a></td>
                </tr>
                <?php
                $_SESSION['packname']=$ress['PackageName'];
                $_SESSION['packcosts']=$ress['PackageCost'];
                    }
              ?>
              
            </tbody>
        </table>
      </form>
      <div class="knowbtn">
        <a href="KnowPackage.php"><button class="btn btn-danger w-100">Know Your Package!</button></a>
      </div>
      </div>
      <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>

  <script>
    // $(document).ready(function(){
    //   Swal.fire({
    //   position: 'center',
    //   icon: 'success',
    //   title: 'Log In Successful',
    //   showConfirmButton: false,
    //   timer: 1500
    // })
    // });
  </script>
  <?php
  if(isset($_POST['ses'])){
    session_destroy();
    header("Location:CustomerLogin.php")
    ?>
    <?php
  }
  ?>
</body>
</html>