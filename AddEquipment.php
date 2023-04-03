<?php
include 'connection.php';
$query="select MAX(eid) from equipment";
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
    <title>Add Equipment</title>
</head>
<style>
    .addequipment{
        margin: 0 auto;
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
      <div class="addequipment mt-3 p-2 bg-light container">
        <h4 style="color: #999999;">Add Your Gym Equipments</h4>
        <form action="" method="post" autocomplete="off">
            <div class="form-floating mb-3 mt-3">
              <input type="text" class="form-control" id="email" name="eid" value="<?php echo $ids?>" required>
              <label for="email">Equipment Id</label>
            </div>
            <div class="form-floating mt-3 mb-3">
              <input type="text" class="form-control" id="pwd" name="ename" required>
              <label for="pwd">Equipment Name</label>
            </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="pwd" name="edate" value="<?php echo date('d/m/Y');?>" required>
                <label for="pwd">Date</label>
              </div>
            <div class="form-floating mt-3 mb-3">
                <input type="text" class="form-control" id="pwd" name="equantity" required>
                <label for="pwd">Equipment Quantity</label>
            </div>
            <button type="submit" class="btn btn-success w-100" style="font-size: 25px;" name="addequip">Add Equipment</button>
          </form>
          <div class="equiptable table-responsive mt-2">
            <table class="table">
                <thead class="text-center table-primary">
                    <th>
                        Equipment Id
                    </th>
                    <th>
                        Equipment Name
                    </th>
                    <th>
                      Date
                    </th>
                    <th>
                        Equipment Quantity
                    </th>
                    <th>
                        Operations
                    </th>
                </thead>
                <tbody class="text-center table-success">
                  <?php
                  include 'connection.php';
                  $showequip="select * from equipment";
                  $show=mysqli_query($con,$showequip);
                  while($showdata=mysqli_fetch_array($show)){
                  ?>
                    <tr>
                        <td><?php echo $showdata[0]?></td>
                        <td><?php echo $showdata[1]?></td>
                        <td><?php echo $showdata[2]?></td>
                        <td><?php echo $showdata[3]?></td>
                        <td><a href="updateequipment.php?eqid=<?php echo $showdata[0]?>&eqname=<?php echo $showdata[1]?>&eqdate=<?php echo $showdata[2]?>&eqquan=<?php echo $showdata[3]?>"><button class="btn btn-info w-100">Update</button></a></td>
                    </tr>
                    <?php
                  }
                    ?>
                </tbody>
            </table>
          </div>
      </div>
      <?php
      include 'connection.php';
      if(isset($_POST['addequip'])){
        $eid=$_POST['eid'];
        $ename=$_POST['ename'];
        $edate=$_POST['edate'];
        $equantity=$_POST['equantity'];
        $addquipment="insert into equipment(eid,ename,edate,equantity) 
        values ('$eid','$ename','$edate','$equantity')";
        $equery=mysqli_query($con,$addquipment);
        if($equery){
          ?>
          <script>
            Swal.fire({
            title: 'Success',
            text: 'Equpment Added Successful',
            icon: 'success',
            confirmButtonText: '<a href="" style="text-decoration:none;color:white;font-size:25px"><i class="fa-solid fa-thumbs-up"></i>Ok</a>',
            })
          </script>
          <?php
          }else
          {
          ?>
          <script>
             Swal.fire({
                title: 'Server Error!',
                text: 'Do you want to continue',
                icon: 'error',
                confirmButtonText: '<a href="" style="text-decoration:none;color:white;">Go Back</a>'
                })
          </script>
          <?php
          }
          }
          ?>
          <!-- bootstrap script -->
  <script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>
</body>
</html>