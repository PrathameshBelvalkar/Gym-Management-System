
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
    *{
        margin: 0;
        padding: 0;
    }
    .custtable{
        background-color: #ffffff;
        
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
      <div class="custtable w-100 container-fluid p-3 table-responsive mt-4" style="border-radius: 10px;">
        <h2 class="text-center">Customer List Report</h2>
        <table class="custable1 table" style="width: 100%;">
            <thead class="table-primary">
                <tr class="text-center">
                    <th>Customer ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Age</th>
                    <th>Mobile Number</th>
                    <th>Registration Date</th>
                    <th>Gender</th>
                    <th>Weight</th>
                    <th>Height</th>
                    <th>Batch</th>
                    <th>Address</th>
                    <!-- <th>Password</th> -->
                    <th>Email</th>
                    <th>Operations</th>
                </tr>
            </thead>
            <tbody class="table-success">
            <?php
                    include 'connection.php';
                    $selectQuery="select * from customer";
                    $query=mysqli_query($con,$selectQuery);
                    while($res=mysqli_fetch_array($query)){
                      ?>
                  <tr class="text-center">
                    <td><?php echo $res['CustId'];?></td>
                    <td><?php echo $res['Fname'];?></td>
                    <td><?php echo $res['Lname'];?></td>
                    <td><?php echo $res['Age'];?></td>
                    <td><?php echo $res['MOB'];?></td>
                    <td><?php echo $res['Date'];?></td>
                    <td><?php echo $res['Gender'];?></td>
                    <td><?php echo $res['Weight'];?></td>
                    <td><?php echo $res['Height'];?></td>
                    <td><?php echo $res['Batch'];?></td>
                    <td><?php echo $res['Address'];?></td>
                    <!-- <td><?php echo $res['Password'];?></td> -->
                    <td><?php echo $res['email'];?></td>
                    <td><a href="UpdateCustomer.php?id=<?php echo $res['CustId']?>&fname=<?php echo $res['Fname']?>&lname=<?php echo $res['Lname']?>&age=<?php echo $res['Age']?>&mob=<?php echo $res['MOB']?>&weight=<?php echo $res['Weight']?>&height=<?php echo $res['Height']?>&batchs=<?php echo $res['Batch'];?>">
                    <button class="btn btn-success w-100">Update</button>
                    </a></td>
                </tr>
                <?php
                    }
                    ?>
                
            </tbody>
        </table>
      </div>
      <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>