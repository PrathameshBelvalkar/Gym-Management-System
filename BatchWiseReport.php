<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
    <title>Batch Wise Customer</title>
</head>
<style>
    .packasewise{
        margin: 0 auto;
        background-color: #91B2C7;
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
              <li class="nav-item">
                <a class="nav-link" href="BillingReports.php"><label for="" class="homelink">Billing Report</label></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    <div class="packasewise mt-2 p-4 container w-50">
      <form action="" method="post">
        <h3 class="text-center text-danger">Batch Wise Customer</h3>
        <div class="form-floating">
            <select class="form-select" id="sel1" name="packages">
                <option value="Morning">Morning</option>
                <option value="Evening">Evening</option>
            </select>
            <label for="sel1" class="form-label">Select Batch:</label>
        </div>
        <button class="btn btn-success mt-1 w-100" name="submit">See Report</button>
        <div class="packagetable table-responsive mt-2">
            <table class="table">
                <thead class="text-center table-primary">
                    <th>Customer Name</th>
                    <th>Selected package</th>
                    <th>Bill Date</th>
                    <th>Expiry Date</th>
                </thead>
                <tbody class="text-center table-success">
                  <?php
                  include 'connection.php';
                  if(isset($_POST['submit'])){
                    $getpackage=$_POST['packages'];
                    $showtable="select * from billing where Batch='$getpackage'";
                    $shows=mysqli_query($con,$showtable);
                    while($result=mysqli_fetch_array($shows)){
                  ?>
                    <tr>
                        <td><?php echo $result['CustNAME']?></td>
                        <td><?php echo $result['Packagename']?></td>
                        <td><?php echo $result['BillDate']?></td>
                        <td><?php echo $result['ExpiryDate']?></td>
                    </tr>
                    <?php
                    }
                  }
                    ?>
                </tbody>
            </table>
      </form>
        </div>
    </div>
    <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>