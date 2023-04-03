
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
      margin: 0 auto;
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
      <div class="custtable w-100 container p-3 table-responsive mt-4">
        <h2 class="text-center">Enquiry List Report</h2>
        <table class="custable1 table" style="width: 100%;">
            <thead>
                <tr class="text-center">
                    <th>Customer Name</th>
                    <th>Email</th>
                    <th>Mobile Number</th>
                    <th>Message</th>
                    
                </tr>
            </thead>
            <tbody>
            <?php
                    include 'connection.php';
                    $selectQuery="select * from enquiry";
                    $query=mysqli_query($con,$selectQuery);
                    while($res=mysqli_fetch_array($query)){
                      ?>
                  <tr class="text-center">
                    <td><span><?php echo $res['FNAME'];?></span><span> <?php echo $res['LNAME'];?></span></td>
                    <td><?php echo $res['EMAIL'];?></td>
                    <td><?php echo $res['MOB'];?></td>
                    <td><?php echo $res['MESSAGE'];?></td>
                    
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