<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'?>
    <title>Date Dynamic Report</title>
</head>
<style>
    .datereport{
        margin: 0 auto;
        background-color: #91B2C7;
        border-radius: 5px;
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
                <a class="nav-link" href="dashboard3.php"><label for="" class="homelink">Billing Report</label></a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="datereport mt-5 p-3 container w-50">
        <form action="" method="post">
            <div class="form-floating mt-3 mb-3">
                <input type="date" class="form-control inputss" id="pwd" name="fromdate" value="">
                <label for="pwd">From Date</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="date" class="form-control inputss" id="pwd" name="todate" value="">
                <label for="pwd">To Date</label>
            </div>
            <button class="btn btn-success w-100" style="font-size: 25px;" name="submit">See Report</button>
        </form>
        <div class="datereport table-responsive w-100">
            <table class="table w-100">
                <thead class="text-center table-primary">
                    <th>
                        Customer Name
                    </th>
                    <th>
                        Bill Date
                    </th>
                    <th>
                        Package Expiry Date
                    </th>
                </thead>
                <tbody class="text-center table-success">
                    <?php
                    include 'connection.php';
                    if(isset($_POST['submit'])){
                      $fromdate=$_POST['fromdate'];
                      $todate=$_POST['todate'];
                      $showquery="select * from billing where BillDate between '".$fromdate."' and '".$todate."'";
                      $query=mysqli_query($con,$showquery);
                      while($result=mysqli_fetch_array($query))
                      {
                    ?>
                    <tr>
                        <td><?php echo $result['CustNAME'];?></td>
                        <td><?php echo $result['BillDate'];?></td>
                        <td><?php echo $result['ExpiryDate'];?></td>
                    </tr>
                    <?php
                      }
                    }
                    ?>
                </tbody>
            </table>
        </div>
      </div>
</body>
</html>