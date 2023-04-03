<?php
session_start();
$namess = $_SESSION['getmail'];
if (!isset($_SESSION['getmail'])) {
	header('location:CustomerLogin.php');
}
// $checkquery="select * from billing where Custmail='".$_SESSION['getmail']."'";
// $cquery=mysqli_query($con,$checkquery);
// if(mysqli_num_rows($cquery) !== 0){
//   header('location:404Notfound.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<?php include 'links.php' ?>
	<title>My Packages</title>
</head>
<style>
	.userpackage {
		margin: 0 auto;
		background-color: #FAF9F6;
		border-radius: 10px;
		/* box-shadow: 6px 4px 8px 0px rgba(0, 0, 0, 0.75); */
	}

	h5 {
		font-size: 1.5vw;
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
						<a class="nav-link" href="ChhosePackage.php"><label for="" class="homelink">Choose Packages</label></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="logout.php"><label for="" class="homelink">LOGOUT</label></a>
					</li>
				</ul>
			</div>
		</div>
	</nav>
	<!-- *********************** -->
	<?php
	include 'connection.php';
	$checkquery = "select * from billing where Custmail='" . $_SESSION['getmail'] . "'";
	$cquery = mysqli_query($con, $checkquery);
	if (mysqli_num_rows($cquery) == 0) {
	?>
		<script>
			location.replace('404Notfound.php');
		</script>
		<?php
	} else {
		$showquery = "select * from billing where Custmail='" . $namess . "'";
		$query = mysqli_query($con, $showquery);
		while ($res = mysqli_fetch_array($query)) {
			$todaysdate = new DateTime();
			$expdate = new DateTime($res['ExpiryDate']);
			// $expdate->diff($todaysdate)->format("%d days")
		?>
			<div class="userpackage w-50 mt-2 mb-2 shadow">
				<div class="first p-2">
					<h5 style="color: #999999;">Customer Name</h5>
					<h4 style="color: black;"><?php echo $res['CustNAME']; ?></h4>
					<hr class="">
				</div>
				<div class="second p-2">
					<h5><span style="color: black;font-weight: bolder;font-size: 35px;" id="leftdays"><?php echo $expdate->diff($todaysdate)->format("%d") ?></span><span style="color: black;font-weight: bolder;font-size: 35px;"> days</span><span style="color: #999999;"> left to expire</span></h5>
					<div class="progress">
						<div class="progress-bar progress-bar-striped progress-bar-animated bg-success" style="width:100%"></div>
					</div>

				</div>
				<div class="third p-2 d-flex justify-content-between">
					<div>
						<h5 style="margin-left: 20px;">plan</h5>
					</div>
					<div>
						<h5 class="text-info"><?php echo $res['Packagename']; ?></h5>
					</div>
					<div>
						<h5>Cost</h5>
					</div>
					<div>
						<h5 class="text-info">
							<?php echo $res['Packagecost']; ?>
						</h5>
					</div>
				</div>
				<div class="fourth p-2 d-flex justify-content-between">
					<div>
						<h5 style="margin-left: 20px;">Billing Date</h5>
					</div>
					<div>
						<h5 class="text-success">
							<?php echo $res['BillDate']; ?>
						</h5>
					</div>
				</div>
				<div class="fifth p-2 d-flex justify-content-between">
					<div>
						<h5 style="margin-left: 20px;">Expires on</h5>
					</div>
					<div>
						<h5 class="text-danger" id="exp">
							<?php echo $res['ExpiryDate']; ?>
						</h5>
					</div>
				</div>
			</div>
	<?php
		}
	}
	?>
	<!-- bootstrap script -->
	<script src="lib/Bootstrap/bootstrap.bundle.min.js"></script>

</body>

</html>