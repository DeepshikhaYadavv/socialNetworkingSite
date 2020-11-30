<?php
session_start();
	 if (!isset($_SESSION['id'])) {
	 	header('location:login.php');
     }
if (isset($_POST['submit'])) {
		$con= mysqli_connect('127.0.0.1','root','','deepshikhaproject');
		if(!$con)
	    {
		echo "Connection failed";
	    }
	    $profile=$_SESSION['id'];
	    $oldpwd=$_REQUEST['oldpwd'];
	    $newpwd=$_REQUEST['newpass'];
	    $cnfpwd=$_REQUEST['cnfpass'];
	    $res=mysqli_query($con,"select password from user where id='$profile'");
	    $row=mysqli_fetch_assoc($res);
	    if ($oldpwd==$row['password']) {
	    	if ($newpwd==$cnfpwd) {
	    		$update=mysqli_query($con,"update user set password='$cnfpwd' where id='$profile' ");
	    		if ($update) {
	    			echo "<script>alert('YOUR PASSWORD IS SUCCESSFULLY UPDATED')</script>";
	    		}
	    		
	    	}
	    	else{
	    		echo "<script>alert('NEW PASSWORD AND CONFIRM PASSWORD DO NOT MATCH')</script>";
	    	}
	    }
	    else{
	    	echo "<script>alert('OLD PASSWORD DOES NOT MATCH')</script>";
	    }
	}
?>
<!DOCTYPE>
<html>
<head>
</head>
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
			<li>
				<a href="editprofile.php">EDIT PROFILE</a>
			</li>
			<li class="active">
				<a href="chgpwd.php">CHANGE PASSWORD</a>
			</li>
		</ul>
	</nav>
	</div>
	<div class="container">
		<h2>CHANGE PASSWORD</h2><br>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div class="form-group">
				<label for="oldpwd">OLD PASSWORD</label>
				<input type="password" class="form-control" id="oldpwd" placeholder="Old password" required name="oldpwd">
			</div>
			<div class="form-group">
				<label for="newpass">NEW PASSWORD</label>
				<input type="password" class="form-control" id="newpass" placeholder="New password" required name="newpass">
			</div>
			<div class="form-group">
				<label for="cnfpass">CONFIRM PASSWORD</label>
				<input type="password" class="form-control" id="cnfpass" placeholder="Comfirm password" required name="cnfpass">
			</div>
			<button  type="submit" class="btn btn-primary" value="submit" name="submit">SUBMIT</button>
		</form>
	</div>
</body>
</html>