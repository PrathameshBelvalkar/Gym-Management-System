<?php
session_start();
if (!isset($_SESSION['getmail'])) {
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
    <title>Check Your Payment Details</title>
</head>

<body>
    <h1 style="color: #ffffff;" class="invisible"><?php echo $_SESSION['getmail'] ?></h1>
    <script>
        $(document).ready(function() {
            swal.fire({
                title: 'Checking Your Payment Details',
                html: '<img src="images/rupee2.gif" alt="" srcset="" style="height:400px;width:450px;">',
                timer: 5000,
                timerProgressBar: true,
                didOpen: () => {
                    Swal.showLoading()
                },
                willClose: () => {
                    clearInterval(timerInterval)
                }
            }).then((result) => {
                if (result.dismiss === Swal.DismissReason.timer) {
                    console.log('I was closed by the timer')
                }
            })
            setTimeout(function() {
                location.replace('Recipt.php');
            }, 5000);
        });
    </script>
</body>

</html>