<?php
include 'connection.php';
$idss=$_GET['idsss'];
$deletequery="delete from package where PackageId='".$idss."'";
$Dquery=mysqli_query($con,$deletequery);
if($Dquery){
    ?>
    <script>
        // Swal.fire({
        //     title: 'Success',
        //     text: 'Package Deleted Succesfully',
        //     icon: 'success',
        //     confirmButtonText: '<a href="AddPackagelist.php" style="text-decoration:none;color:white;font-size:25px"><i class="fa-solid fa-thumbs-up"></i>Thank You</a>'  
        //     })
        location.replace('dashboard3.php');     
    </script>
    <?php
    }else{
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
    ?>