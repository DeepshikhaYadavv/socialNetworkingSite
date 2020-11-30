<?php
session_start();
if (!isset($_SESSION['id'])) {
	header('location:login.php');
}
$con = mysqli_connect('127.0.0.1', 'root', '', 'deepshikhaproject');
if (!$con) {
	echo "Connection failed";
}
$id = $_SESSION['id'];
$res = mysqli_query($con, "select * from user where id ='$id'");
if (mysqli_num_rows($res) > 0) {
	$row = mysqli_fetch_assoc($res);
	$uname = $row['fullname'];
	$email1 = $row['email'];
	$age1 = $row['age'];
	$a = $row['education'];
	$edu1 = explode(",", $a);
	$gen1 = $row['gender'];
	$_SESSION['username'] = $uname;
	$_SESSION['email'] = $email1;
	$_SESSION['age'] = $age1;
	$_SESSION['education'] = $edu1;
	$_SESSION['gender'] = $gen1;
}
if (isset($_REQUEST['LOGOUT'])) {
	session_unset();
	session_destroy();
	header('location:login.php');
}
?>
<!DOCTYPE>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
	<style type="text/css">
		button {
			position: absolute;
			top: 1%;
			left: 90%;
		}

		h1 {

			text-align: center;
		}

		.wrapper {
			width: 21%;
			float: left;
			height: 100%;
			background-color: black;
		}

		ul {
			margin-top: 50px;
		}

		li {
			margin: 30px 40px;
			font-size: 24px;
		}

		a:hover {
			text-decoration: none;
		}

		.dash {
			float: left;
			width: 70%;
			margin-top: 10%;
		}
	</style>
</head>

<body>
	<div class="wrapper">
		<nav id="slidebar">
			<ul class="list-unstyled components">
				<li class="active">
					<a href="welcome.php">DASHBOARD</a>
				</li>
				<li>
					<a href="postlist.php">POST LIST</a>
				</li>
				<li>
					<a href="newpost.php">NEW POST</a>
				</li>
				<li>
					<a href="editprofile.php">EDIT PROFILE</a>
				</li>
				<li>
					<a href="chgpwd.php">CHANGE PASSWORD</a>
				</li>
			</ul>
		</nav>
	</div>
	<div class="dash">
		<h1><?php echo "Welcome To Dashboard " . $uname . "!"; ?></h1>
		<form class="form-group">
			<button type="submit" name="LOGOUT" value="LOGOUT" class="btn btn-primary">LOGOUT</button>
		</form>
	</div>
</body>

</html>