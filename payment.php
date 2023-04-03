<?php

session_start();
// if (!isset($_SESSION['getmail'])) {
//     header('location:CustomerLogin.php');
// }
$tranid = rand(1111111111, 9999999999);
$billingid = $_SESSION['billids'];
$customerid = $_SESSION['custids'];
$Customernames = $_SESSION['custsname'];
$Customermails = $_SESSION['custmails'];
$batches = $_SESSION['batches'];
$billdate = $_SESSION['bdates'];
$expdate = $_SESSION['expdatess'];
$packagename = $_SESSION['packagenamess'];
$packagecost = $_SESSION['packagecosts'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include 'links.php'; ?>
    <title>Payment Gateway</title>
    <style>
        .paymentbody {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @media screen and (max-width:800px) {
            .cardimage {
                display: none !important;
            }
        }
    </style>
    <script>
        $(document).ready(function($) {
            $('#cnumber').mask("9999 9999 9999 9999", {
                placeholder: ""
            });
            $('#ccvv').mask("999", {
                placeholder: ""
            });
            $("#back").click(function() {
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top',
                    showConfirmButton: false,
                    timer: 1500,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        // toast.addEventListener('mouseenter', Swal.stopTimer)
                        // toast.addEventListener('mouseleave', Swal.resumeTimer)
                    }
                })

                Toast.fire({
                    icon: 'error',
                    title: 'Payment Failed'
                })
                setTimeout(function() {
                    // window.location.href = '';
                    location.replace('ChhosePackage.php');
                }, 1500);
            });
        });
    </script>
</head>

<body style="background-color: #FAF9F6;" class="p-4">
    <div class="paymentheader clearfix">
        <span class="float-start"><i class="fa-solid fa-arrow-left fa-2x" id="back"></i></span>
    </div>
    <div>
        <div class="clearfix container">
            <div class="float-start">
                <h4>Payment Details</h4>
            </div>
            <div class="float-end">
                <img src="images/visa (1).png" alt="visa card">
                <img src="images/paypal.png" alt="paypal" srcset="" style="margin-left: 5px;">
            </div>
        </div>
        <div class="paymentbody d-flex container flex-row rounded shadow justify-content-around p-3 align-items-center">
            <div class="cardimage">
                <img src="images/card.png" alt="card" srcset="" style="height: 250px;width: 400px;" class="img-fluid">
            </div>
            <div class="paymentformbody">
                <form action="" autocomplete="off" method="POST">
                    <table class="">
                        <tr>
                            <td colspan="3" class="">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="" placeholder="" name="" required readonly value="<?php echo $tranid ?>" style="background-color: #ffffff;">
                                    <label for="email">Transaction ID</label>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3" class="">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="cnumber" placeholder="CARD NUMBER" name="cnumber" required>
                                    <label for="email">CARD NUMBER</label>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="3">
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="cname" placeholder="CARD HOLDER NAME" name="cname" required value="<?php echo $_SESSION['custsname'] ?>">
                                    <label for="email">CARD HOLDER NAME</label>
                                </div>
                            </td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>
                                <div class="form-floating mb-3 mt-3" id="datetimepicker">
                                    <input type="month" class="form-control" id="cmonth" placeholder="" name="cmonth" value="" required min="<?php echo date('Y-m') ?>">
                                    <label for="email">Validate Through</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-floating mb-3 mt-3 invisible">
                                    <input type="text" class="form-control" id="cnumber" placeholder="" name="cnumber">
                                    <label for="email">CARD NUMBER</label>
                                </div>
                            </td>
                            <td>
                                <div class="form-floating mb-3 mt-3">
                                    <input type="text" class="form-control" id="ccvv" placeholder="CARD NUMBER" name="ccvv" required>
                                    <label for="email">CVV</label>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <button class="btn btn-success w-75 me-1" name="confirm">Confirm And Pay &#8377 <?php echo $_SESSION['packagecosts'] ?></button>
                            </td>

                            <td>
                                <input type="reset" value="Cancel" class="btn btn-danger w-100">
                            </td>
                        </tr>
                    </table>
                </form>
            </div>

        </div>
    </div>
</body>

</html>
<?php
include 'connection.php';
if (isset($_POST['confirm'])) {
    $billinginsertquery = "insert into billing(BillId,CustID,CustNAME,Custmail,Batch,BillDate,ExpiryDate,Packagename,Packagecost,TOTAL) 
values('$billingid','$customerid','$Customernames','$Customermails','$batches','$billdate','$expdate','$packagename','$packagecost','$packagecost')";
    $runquery = mysqli_query($con, $billinginsertquery);
    if ($runquery) {
?>
        <script>
            location.replace('pblank.php');
        </script>
<?php
    } else {
        echo mysqli_error($con);
    }
}
?>