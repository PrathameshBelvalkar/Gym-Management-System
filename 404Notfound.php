<?php
session_start();
if (!isset($_SESSION['firstnames'])) {
    header('location:CustomerLogin.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php' ?>
    <title>404 Not Found</title>
</head>
<style>
    .errorbody {
        height: 100%;
    }

    .erbtn {
        width: 25%;
        padding: 7px;
        color: white;
        background-color: black;
        font-size: 1.2vw;
    }
</style>
<script>
    $(document).ready(function($) {
        $("#erbtn").click(function() {
            location.replace("ChhosePackage.php");
        });
    });
</script>

<body style="background-color: #ffffff;">
    <div class="notfoundheader container-fluid clearfix ms-2 mt-1">
        <div class="float-start" id="erbtn">
        <i class="fa-solid fa-arrow-left fa-2x" id="back"></i>
        </div>
        <div></div>
    </div>
    <div class="errorbody d-flex flex-column justify-content-center align-content-center container">
        <div class="errorimage">
            <img src="images/404Not.PNG" alt="" srcset="" class="img-fluid">
        </div>
        <div class="errortext text-center">
            <h1 style="font-family: 'Arvo', serif;font-size:2.5vw">OOPS! <span style="color: #00a6a6;"><?php echo $_SESSION['firstnames'] ?></span> don't have any Active Packages</h1>
            <button class="erbtn" id="erbtn"><i class="fa-solid fa-arrow-left" id="back"></i> Back To Packages</button>
        </div>
    </div>
</body>

</html>