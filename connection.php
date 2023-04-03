<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="lib/sweetalert2/dist/sweetalert2.min.css">
    <script src="lib/sweetalert2/dist/sweetalert2.min.js"></script>
    <script src="lib/Jquery/jquery.min.js"></script>
    <title></title>
</head>

<body>
    <?php
    $username = 'root';
    $password = '';
    $server = 'localhost';
    $db = 'example';
    $con = mysqli_connect($server, $username, $password, $db);
    if ($con) {
    ?>
        <script>
        </script>
        </script>
    <?php
    } else {
    ?>
        <script>
            $(document).ready(function() {
                Swal.fire({
                    title: 'Server Error!',
                    text: 'Do you want to continue',
                    icon: 'error',
                    confirmButtonText: '<a href="Homepage.php" style="text-decoration:none;color:white;">Go Back</a>'
                })
            });
        </script>
    <?php
    }
    ?>
</body>

</html>