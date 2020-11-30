<?php
    session_start();
    if (!isset($_SESSION['id'])) {
	 	header('location:login.php');
     }
	if (isset($_POST['update'])) {
		$con= mysqli_connect('127.0.0.1','root','','deepshikhaproject');
		if(!$con)
	    {
		echo "Connection failed";
	    }    
	
	    $profile=$_SESSION['id'];
	    $name=$_POST['uname'];
	    $email=$_POST['email'];
	    $age=$_POST['age'];
	    $gender=$_POST['gen'];
	    $edu=implode(',',$_POST['edu']);
        $query="update user set fullname='$name', email ='$email',age='$age',education='$edu',gender='$gender'
         where id='$profile'";
		$res= mysqli_query($con,$query);
		header("location:welcome.php");
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
	.wrapper{
		width: 21%;
		float: left;
		height: 100%;
		background-color: black;
	}
	ul{
		margin-top: 50px;
	}
	li{
		margin: 30px 40px;
       font-size: 24px;
	}
	a:hover{
		text-decoration: none;
	}
	</style>
</head>
<body>
	<div class="wrapper">
		<nav id="slidebar">
		<ul class="list-unstyled components">
			<li>
				<a href="welcome.php">DASHBOARD</a>
			</li>
			<li>
				<a href="postlist.php">POST LIST</a>
			</li>
			<li>
				<a href="newpost.php">NEW POST</a>
			</li>
			<li class="active">
				<a href="editprofile.php">EDIT PROFILE</a>
			</li>
			<li>
				<a href="chgpwd.php">CHANGE PASSWORD</a>
			</li>
		</ul>
	</nav>
	</div>
	<div class="container">
		<h2>EDIT PROFILE</h2><br>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div class="form-group">
				<label for="fullname">FULLNAME</label>
				<input type="text" class="form-control" id="fullname" name="uname" value="<?php echo $_SESSION['username']; ?>">
			</div>
			<div class="form-group">
				<label for="email">EMAIL</label>
				<input type="email" class="form-control" id="email" name="email" value="<?php echo $_SESSION['email']; ?>">
			</div>
			<div class="form-group">
				<label for="age">AGE</label>
				<input class="form-control" id="age" type="number" name="age" value="<?php echo $_SESSION['age']; ?>">
			</div>
			<div class="form-group ">
				<label class="form-check-label">EDUCATION</label>
				<div class="custom-control custom-checkbox custom-control-inline mb-3">
						<input id="check1" class="custom-control-input" type="checkbox" name="edu[]" value="B.Sc"
						<?php
						if (in_array("B.Sc", $_SESSION['education'])) {
							echo "checked";
						}
						?>
						>
					<label class="custom-control-label" for="check1">B.Sc</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mb-3">
						<input id="check2" class="custom-control-input" type="checkbox" name="edu[]" value="BTech"
						<?php
						if (in_array("BTech", $_SESSION['education'])) {
							echo "checked";
						}
						?>
						>
					<label class="custom-control-label" for="check2">BTech</label>
				</div>
				<div class="custom-control custom-checkbox custom-control-inline mb-3">
					<input id="check3" class="custom-control-input" type="checkbox" name="edu[]" value="Pharmacy"
					<?php
						if (in_array("Pharmacy", $_SESSION['education'])) {
							echo "checked";
						}
					?>
					>
					<label class="custom-control-label" for="check3">Pharmacy</label>
				</div>
			</div>
			<div class="form-group">
				<label>GENDER</label>
				<div class="custom-control custom-radio custom-control-inline">
					<input type="radio" class="custom-control-input" id="rad1" name="gen" value="Female"
					<?php
					if ($_SESSION['gender']=='Female') {
						echo "checked";
					}
					?>
					>
					<label for="rad1" class="custom-control-label">Female</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input id="rad2" type="radio" class="custom-control-input" name="gen" value="Male"
					<?php
					if ($_SESSION['gender']=='Male') {
						echo "checked";
					}
					?>
					>
					<label for="rad2" class="custom-control-label">Male</label>
				</div>
				<div class="custom-control custom-radio custom-control-inline">
					<input id="rad3" type="radio" class="custom-control-input" name="gen" value="Others">
					<label for="rad3" class="custom-control-label">Others</label>
				</div>
			</div>
			<button type="submit" name="update" value="submit" class="btn btn-primary">UPDATE</button> 
		</form>
    </div>
</body>
</html>