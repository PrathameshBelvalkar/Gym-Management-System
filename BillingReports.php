<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
  <title>Billing Reports</title>
</head>
<style>
    .billingreport{
        margin: 0 auto;
    }
    .custwise{
      background-color: #ff9933;
      color: white;
    }
    .packagewise{
      background-color: #ffffff;
      color: #000080;
    }
    .datewise{
      background-color: #138808;
      color: white;
    }
    .custwise:hover{
      color: white;
      transform: scale(1.1);
    }
    .packagewise:hover{
      color: #000080;
      transform: scale(1.1);
    }
    .datewise:hover{
      color: white;
      transform: scale(1.1);
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
      <div class="billingreport w-75 mt-5 table-responsive p-3" style="background-color: #91B2C7;">
        <h3 style="color: #6E4D38;">Billing Report</h3>
        <table class="table">
            <thead class="text-center table-primary">
                <th>Bill Id</th>
                <th>Customer Id</th>
                <th>Customer Name</th>
                <th>Batch</th>
                <th>Bill Date</th>
                <th>Expiry Date</th>
                <th>Package Name</th>
                <th>Package Cost</th>
                <th>Operation</th>
            </thead>
            <tbody class="text-center table-success">
            <?php
            include 'connection.php';
            $showbillquery="select * from billing";
            $bQuery=mysqli_query($con,$showbillquery);
            while($fquery=mysqli_fetch_array($bQuery)){
            ?>
                <tr>
                    <td><?php echo $fquery['BillId'];?></td>
                    <td><?php echo $fquery['CustID'];?></td>
                    <td><?php echo $fquery['CustNAME'];?></td>
                    <td><?php echo $fquery['Batch'];?></td>
                    <td><?php echo $fquery['BillDate'];?></td>
                    <td><?php echo $fquery['ExpiryDate'];?></td>
                    <td><?php echo $fquery['Packagename'];?></td>
                    <td><?php echo $fquery['Packagecost'];?>&#8377</td>
                    <td><a href="changebatch.php?batchid=<?php echo $fquery['CustID'];?>&batchname=<?php echo $fquery['CustNAME'];?>"><button class="btn btn-danger">Change batch</button></a></td>
                </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
        <div class="dynamicreports row w-100">
                <div class="customerwise col-lg-4 col-md-12">
                  <a href="CustomerWiseBilling.php"><button class="btn custwise w-100">Customer Wise Report</button></a>
                </div>
                <div class="customerwise col-lg-4 col-md-12">
                  <a href="PackageWiseBilling.php"><button class="btn packagewise w-100">Package Wise Report</button></a>
                </div>
                <div class="customerwise col-lg-4 col-md-12">
                  <a href="DateDynamicReports.php"><button class="btn datewise w-100">Date Dynamic Report</button></a>
                </div>
        </div>
        <div class="batchwise w-100 container mt-2">
          <a href="BatchWiseReport.php"><button class="btn btn-primary w-100">Batch Wise Customers</button></a>
        </div>
      </div>
      <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>