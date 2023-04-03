<?php
session_start();
if (!isset($_SESSION['getadmin'])) {
    header('location:Adminlogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php' ?>
    <title>Dashboard3</title>
</head>
<style>
.dashbox {
    border-radius: 5px;
}

.custwise {
    background-color: #ff9933;
    color: white;
}

.packagewise {
    background-color: #ffffff;
    color: #000080;
}

.datewise {
    background-color: #138808;
    color: white;
}
</style>

<body style="background-color: #088F8F;">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <div class="container-fluid navcontainer">
            <a class="navbar-brand" href="#">
                <img src="images/MaxHealthLogo.png" alt="MaxHealthLogo" class="Maxhealthlogo" />
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="adminlogout.php"><label for="" class="homelink">LOGOUT</label></a>
                    </li>
                </ul>
                <div class="d-flex">
                    <h4 style="color: #ffffff;" class="me-2">Welcome <span><?php echo $_SESSION['getadmin'] ?></span>
                    </h4>
                </div>
            </div>
        </div>
    </nav>
    <div class="p-5">
        <ul class="nav nav-pills text-center" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-bs-toggle="pill" href="#home"><i class="fa-solid fa-people-group"></i>
                    Customer Information</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#menu1"><i class="fa-solid fa-dumbbell"></i> Add
                    Equipments</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#menu2"><i class="fa-solid fa-box"></i> Add Packages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#menu3"><i class="fa-solid fa-indian-rupee-sign"></i>
                    See Bilings</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-bs-toggle="pill" href="#menu4"><i class="fa-solid fa-circle-question"></i> See
                    Enquiries</a>
            </li>
        </ul>

        <!-- Tab panes -->

        <!-- ************************************************** -->
        <!-- Customer inforamtion -->
        <div class="tab-content bg-light mt-1 p-1 dashbox">
            <div id="home" class="container tab-pane active"><br>
                <div class="custtable w-100 container-fluid p-1 table-responsive mt-4" style="border-radius: 10px;">
                    <h2 class="text-center"><i class="fa-solid fa-people-group"></i>Customer List Report</h2>
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
                        <tbody class="table-success" style="font-family: 'Questrial', sans-serif;">
                            <?php
                            include 'connection.php';
                            $selectQuery = "select * from customer ORDER BY CustId ASC";
                            $query = mysqli_query($con, $selectQuery);
                            while ($res = mysqli_fetch_array($query)) {
                            ?>
                            <tr class="text-center">
                                <td><?php echo $res['CustId']; ?></td>
                                <td><?php echo $res['Fname']; ?></td>
                                <td><?php echo $res['Lname']; ?></td>
                                <td><?php echo $res['Age']; ?></td>
                                <td><?php echo $res['MOB']; ?></td>
                                <td><?php echo $res['Date']; ?></td>
                                <td><?php echo $res['Gender']; ?></td>
                                <td><?php echo $res['Weight']; ?></td>
                                <td><?php echo $res['Height']; ?></td>
                                <td><?php echo $res['Batch']; ?></td>
                                <td><?php echo $res['Address']; ?></td>
                                <td><?php echo $res['email']; ?></td>
                                <td><a
                                        href="UpdateCustomer.php?id=<?php echo $res['CustId'] ?>&fname=<?php echo $res['Fname'] ?>&lname=<?php echo $res['Lname'] ?>&age=<?php echo $res['Age'] ?>&mob=<?php echo $res['MOB'] ?>&weight=<?php echo $res['Weight'] ?>&height=<?php echo $res['Height'] ?>&batchs=<?php echo $res['Batch']; ?>">
                                        <button class="btn btn-success w-100">Update</button>
                                    </a></td>
                            </tr>
                            <?php
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
            <!-- ********************************************************************************** -->
            <div id="menu1" class="container tab-pane fade"><br>
                <?php
                include 'connection.php';
                $query = "select MAX(eid) from equipment";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_row($result);
                $ids = $row[0] + 1;
                ?>
                <h4 style="color: #999999;">Add Your Gym Equipments</h4>
                <form action="" method="post" autocomplete="off">
                    <div class="form-floating mb-3 mt-3">
                        <input type="text" class="form-control" id="email" name="eid" value="<?php echo $ids ?>"
                            required>
                        <label for="email">Equipment Id</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="pwd" name="ename" required>
                        <label for="pwd">Equipment Name</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="pwd" name="edate"
                            value="<?php echo date('d/m/Y'); ?>" required>
                        <label for="pwd">Date</label>
                    </div>
                    <div class="form-floating mt-3 mb-3">
                        <input type="text" class="form-control" id="pwd" name="equantity" required>
                        <label for="pwd">Equipment Quantity</label>
                    </div>
                    <button type="submit" class="btn btn-success w-100" style="font-size: 25px;" name="addequip">Add
                        Equipment</button>
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
                        <tbody class="text-center table-success" style="font-family: 'Questrial', sans-serif;">
                            <?php
                            include 'connection.php';
                            $showequip = "select * from equipment";
                            $show = mysqli_query($con, $showequip);
                            while ($showdata = mysqli_fetch_array($show)) {
                            ?>
                            <tr>
                                <td><?php echo $showdata[0] ?></td>
                                <td><?php echo $showdata[1] ?></td>
                                <td><?php echo $showdata[2] ?></td>
                                <td><?php echo $showdata[3] ?></td>
                                <td><a
                                        href="updateequipment.php?eqid=<?php echo $showdata[0] ?>&eqname=<?php echo $showdata[1] ?>&eqdate=<?php echo $showdata[2] ?>&eqquan=<?php echo $showdata[3] ?>"><button
                                            class="btn btn-info w-100">Update</button></a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    include 'connection.php';
                    if (isset($_POST['addequip'])) {
                        $eid = $_POST['eid'];
                        $ename = $_POST['ename'];
                        $edate = $_POST['edate'];
                        $equantity = $_POST['equantity'];
                        $addquipment = "insert into equipment(eid,ename,edate,equantity) 
        values ('$eid','$ename','$edate','$equantity')";
                        $equery = mysqli_query($con, $addquipment);
                        if ($equery) {
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
                        } else {
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
                </div>
            </div>
            <!-- ******************************************************************************** -->
            <div id="menu2" class="container tab-pane fade"><br>
                <?php
                include 'connection.php';
                $query = "select MAX(PackageId) from package";
                $result = mysqli_query($con, $query);
                $row = mysqli_fetch_row($result);
                $ids = $row[0] + 1;
                ?>
                <div class="packageform mt-4">
                    <h2 class="text-center">View And Add packages</h2>
                    <form action="AddPackagelist.php" autocomplete="off" method="POST">
                        <div class="form-floating mb-3 mt-3">
                            <input type="text" class="form-control" id="email" placeholder="Package Id" name="pid"
                                readonly style="background-color: #ffffff;" value="<?php echo $ids; ?>">
                            <label for="email">Package Id</label>
                        </div>
                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="pwd" placeholder="Package name" name="pname"
                                required>
                            <label for="pwd">Package name</label>
                        </div>
                        <div class="form-floating mt-3 mb-3">
                            <input type="number" class="form-control" id="pwd" placeholder="Package Cost" name="pcost"
                                required>
                            <label for="pwd">Package Cost</label>
                        </div>
                        <div class="form-floating mt-3 mb-3">
                            <input type="text" class="form-control" id="pwd" placeholder="Package Duration" name="pdur"
                                required>
                            <label for="pwd">Package Duration</label>
                        </div>
                        <button type="submit" class="btn w-100" name="submit"
                            style="background-color: #00a6a6;color: #ffffff;font-size: 21px;">Add Package</button>
                    </form>

                    <div class="packagetable mt-2 table-responsive">
                        <table class="custable1 table" style="width: 100%;">
                            <thead>
                                <tr class="text-center">
                                    <th>Package Id</th>
                                    <th>Package Name</th>
                                    <th>Package Cost</th>
                                    <th>Package Duration</th>
                                    <th colspan="2">Operations</th>
                                </tr>
                            </thead>
                            <tbody style="font-family: 'Questrial', sans-serif;">
                                <?php
                                include 'connection.php';
                                $selectQuery = "select * from package";
                                $query = mysqli_query($con, $selectQuery);
                                while ($ress = mysqli_fetch_array($query)) {
                                ?>
                                <tr class="text-center">
                                    <td><?php echo $ress['PackageId']; ?></td>
                                    <td><?php echo $ress['PackageName']; ?></td>
                                    <td><?php echo $ress['PackageCost']; ?></td>
                                    <td><?php echo $ress['PackageDuration']; ?></td>
                                    <td><a href="UpdatePackage.php?idss=<?php echo $ress['PackageId']; ?>&namess=<?php echo $ress['PackageName']; ?>&costss=<?php echo $ress['PackageCost']; ?>&durss=<?php echo $ress['PackageDuration']; ?>"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""><button
                                                class="btn btn-success w-75">Update</button></a></td>
                                    <td><a href="DeletePackage.php?idsss=<?php echo $ress['PackageId']; ?>"
                                            data-bs-toggle="tooltip" data-bs-placement="bottom" title=""><button
                                                class="btn btn-danger w-75">Delete</button></a></td>
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
                if (isset($_POST['submit'])) {
                    $pid = $_POST['pid'];
                    $pname = $_POST['pname'];
                    $pcost = $_POST['pcost'];
                    $pdur = $_POST['pdur'];
                    $insertquery = "insert into package(PackageId,PackageName,PackageCost,PackageDuration) values('$pid','$pname','$pcost','$pdur')";
                    $packinsert = mysqli_query($con, $insertquery);
                    if ($packinsert) {
                ?>
                <script>
                Swal.fire({
                    title: 'Success',
                    text: 'Package Inserted Successfuly',
                    icon: 'success',
                    confirmButtonText: '<a href="AddPackagelist.php" style="text-decoration:none;color:white;font-size:25px"><i class="fa-solid fa-thumbs-up"></i> Done</a>',
                })
                </script>
                <?php
                    } else {
                    ?>
                <script>
                Swal.fire({
                    title: 'Server Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: '<a href="AddPackagelist.php" style="text-decoration:none;color:white;">Go Back</a>'
                })
                </script>
                <?php
                    }
                }
                ?>
            </div>
            <!-- ********************************************** -->
            <div id="menu3" class="container tab-pane fade"><br>
                <div class="billingreport w-100 mt-5 table-responsive p-3" style="background-color: #91B2C7;">
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
                        <tbody class="text-center table-success" style="font-family: 'Questrial', sans-serif;">
                            <?php
                            include 'connection.php';
                            $showbillquery = "select * from billing";
                            $bQuery = mysqli_query($con, $showbillquery);
                            while ($fquery = mysqli_fetch_array($bQuery)) {
                            ?>
                            <tr>
                                <td><?php echo $fquery['BillId']; ?></td>
                                <td><?php echo $fquery['CustID']; ?></td>
                                <td><?php echo $fquery['CustNAME']; ?></td>
                                <td><?php echo $fquery['Batch']; ?></td>
                                <td><?php echo $fquery['BillDate']; ?></td>
                                <td><?php echo $fquery['ExpiryDate']; ?></td>
                                <td><?php echo $fquery['Packagename']; ?></td>
                                <td><?php echo $fquery['Packagecost']; ?>&#8377</td>
                                <td><a
                                        href="changebatch.php?batchid=<?php echo $fquery['CustID']; ?>&batchname=<?php echo $fquery['CustNAME']; ?>"><button
                                            class="btn btn-danger">Change batch</button></a></td>
                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div class="dynamicreports row w-100">
                        <div class="customerwise col-lg-4 col-md-12">
                            <a href="CustomerWiseBilling.php"><button class="btn custwise w-100">Customer Wise
                                    Report</button></a>
                        </div>
                        <div class="customerwise col-lg-4 col-md-12">
                            <a href="PackageWiseBilling.php"><button class="btn packagewise w-100">Package Wise
                                    Report</button></a>
                        </div>
                        <div class="customerwise col-lg-4 col-md-12">
                            <a href="DateDynamicReports.php"><button class="btn datewise w-100">Date Dynamic
                                    Report</button></a>
                        </div>
                    </div>
                    <div class="batchwise w-100 container mt-2">
                        <a href="BatchWiseReport.php"><button class="btn btn-primary w-100">Batch Wise
                                Customers</button></a>
                    </div>
                </div>
            </div>
            <!-- ************************************ -->
            <div id="menu4" class="container tab-pane fade"><br>
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
                        <tbody style="font-family: 'Questrial', sans-serif;">
                            <?php
                            include 'connection.php';
                            $selectQuery = "select * from enquiry";
                            $query = mysqli_query($con, $selectQuery);
                            while ($res = mysqli_fetch_array($query)) {
                            ?>
                            <tr class="text-center">
                                <td><span><?php echo $res['FNAME']; ?></span><span> <?php echo $res['LNAME']; ?></span>
                                </td>
                                <td><?php echo $res['EMAIL']; ?></td>
                                <td><?php echo $res['MOB']; ?></td>
                                <td><?php echo $res['MESSAGE']; ?></td>

                            </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>


        </div>
    </div>
</body>

</html>