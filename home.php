<?php
    session_start();
		$con= mysqli_connect('127.0.0.1','root','','deepshikhaproject');
		if(!$con)
	    {
		echo "Connection failed";
	    }
	    $res=mysqli_query($con ,"select * from title order by post_date DESC");
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
	img{
		width: 49%;
	}
	.navbar-nav{
		padding-left: 76%;
	}
	.post img{
		width: 20%;
		border-radius: 50%;
	}
	.post {
	margin: 20px auto;
    width: 50%;
    height:20%;
    border: 7px solid;
    padding-top: 12px;
    padding-left: 6px;
    border-radius: 10px;
    border-top-right-radius: 50px;
	}
	span{
		font-size: 30px;
        font-weight: bold;
	}
	p{
		margin-top: -40px;
        margin-left: 164px;
	}
	</style>
</head>
<body>
	<div>
		<nav class="navbar navbar-expand-lg  bg-dark navbar-dark">
			<a href="#" class="navbar-brand"><img src="images/blog3.jpg"></a>
			<ul class="navbar-nav">
				<li class="nav-item">
					<a href="SignUp.php" class="nav-link">SIGNUP</a>
				</li>
				<li class="nav-item ">
					<a href="login.php" class="nav-link">LOGIN</a>
				</li>
			</ul>
		</nav>
	</div>
	<div>
		<?php  while($row= mysqli_fetch_assoc($res)): ?>
		<div class="post">
			<?php  echo '<img src= "images/'.$row['image'].'">';?>
			<span><?php  echo $row['titlee']?></span>
			<p><?php echo $row['discription'] ?></p>
		</div>
	    <?php endwhile; ?>
	</div>
</body>
</html>