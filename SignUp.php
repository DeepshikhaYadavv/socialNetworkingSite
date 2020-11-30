<?php
session_start();
	if (isset($_POST['submit'])) {
		$con= mysqli_connect('127.0.0.1','root','','deepshikhaproject');
		if(!$con)
	    {
		echo "Connection failed";
	    }
		$ccount=0;
		$res1= mysqli_query($con,"select * from user where email ='$_POST[email]'");
		$ccount= mysqli_num_rows($res1);
		if ($ccount>0) {
			echo "<script>alert('This EMAIL already exists,choose other one :)')</script>";
		}
		else{
			$edu=implode(',',$_POST['edu']);
		   mysqli_query($con,"INSERT INTO user values('','$_POST[uname]',
			'$_POST[email]','$_POST[pass]','$_POST[age]','$edu','$_POST[gen]')");
			?>
			<script type="text/javascript">
			alert("Record inserted successfully");
			</script>
			<?php	
			header('location:login.php');
		}
		
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
	.container{
		padding: 20px 60px;
		width: 40%;
	}
	</style>
</head>
<body>
	<div class="container">
		<h2>SIGN UP</h2><br>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div class="form-group">
				<label for="fullname">FULLNAME</label>
				<input type="text" class="form-control" id="fullname" placeholder="Enter your full name" required name="uname">
			</div>
			<div class="form-group">
				<label for="email">EMAIL</label>
				<input type="email" class="form-control" id="email" placeholder="Enter your email address" required name="email">
			</div>
			<div class="form-group">
				<label for="pass">PASSWORD</label>
				<input type="password" class="form-control" id="pass" placeholder="Enter correct password" required name="pass">
			</div>
			<div class="form-group">
				<label for="age">AGE</label>
				<input class="form-control" id="age" placeholder="Enter your age" type="number" name="age">
			</div>
			<div class="form-group ">
				<label class="form-check-label">EDUCATION</label>
				<div class="custom-control custom-checkbox custom-control-inline mb-3">
						<input id="check1" class="custom-control-input" type="checkbox" name="edu[]" value="B.Sc">
					<label class="custom-control-label" for="check1">B.Sc</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mb-3">
						<input id="check2" class="custom-control-input" type="checkbox" name="edu[]" value="BTech">
					<label class="custom-control-label" for="check2">BTech</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mb-3">
					<input id="check3" class="custom-control-input" type="checkbox" name="edu[]" value="Pharmacy">
					<label class="custom-control-label" for="check3">Pharmacy</label>
				</div>
			</div>
			<div class="form-group">
				<label>GENDER</label>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" id="rad1" required name="gen" value="Female">
					<label for="rad1" class="custom-control-label">Female</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input id="rad2" type="radio" class="custom-control-input" required name="gen" value="Male">
					<label for="rad2" class="custom-control-label">Male</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input id="rad3" type="radio" class="custom-control-input" required name="gen" value="Others">
					<label for="rad3" class="custom-control-label">Others</label>
				</div>
			</div>
			<button type="submit" name="submit" value="submit" class="btn btn-primary">SUBMIT</button> 
		</form>
    </div>
</body>
</html>