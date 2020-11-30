<?php
session_start();
if (isset($_SESSION['id'])) {
	header('location:welcome.php');
	}
if (isset($_POST['submit'])) {
		$con= mysqli_connect('127.0.0.1','root','','deepshikhaproject');
		if(!$con)
	    {
		echo "Connection failed";
	    }
		$res= mysqli_query($con,"select id from user where email ='$_POST[email]'&& password='$_POST[pass]'");
		if (mysqli_num_rows($res) > 0) {
            $row= mysqli_fetch_assoc($res);
		    $_SESSION['id']=$row['id'];
			header('location: welcome.php');
		}
		else{
			echo "<script>alert('Incorrect email or password')</script>";
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
		<h2>LOGIN</h2><br>
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
			<div class="form-group">
				<label for="email">EMAIL</label>
				<input type="email" class="form-control" id="email" placeholder="Enter your email address" required name="email">
			</div>
			<div class="form-group">
				<label for="pass">PASSWORD</label>
				<input type="password" class="form-control" id="pass" placeholder="Enter correct password" required name="pass">
			</div>
			<button  type="submit" class="btn btn-primary" value="submit" name="submit">LOGIN</button>
		</form>
	</div>
</body>
</html>