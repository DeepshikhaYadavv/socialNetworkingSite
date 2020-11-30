<?php
session_start();
$con= mysqli_connect('127.0.0.1','root','','deepshikhaproject');
		if(!$con)
	    {
		echo "Connection failed";
	    }
	    $id= $_SESSION['id'];
		$res= mysqli_query($con,"select * from title where userTitle='$id'");
		if (isset($_GET['delete'])){
		    echo "<script>alert('DATA UPDATED SUCCESSFULLY')</script>";
			$userTitle=$_GET['delete'];
			$post=mysqli_query($con,"delete from title where ide='$userTitle'");
				header('location:postlist.php');
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
	.row{
		width: 58%;
        margin: auto;
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
	<div class="row justify-content-center">
		<table class="table">
			<thead>
				<tr>
					<th>Title</th>
					<th colspan="2">Action</th>
				</tr>
			</thead>
			<?php
		        while($row= mysqli_fetch_assoc($res)):?>
		        <tr>
		        	<td><?php echo $row['titlee'];?></td>
		        	<td><a href="newpost.php?edit=<?php echo $row['ide']; ?>" class="btn btn-info">EDIT</a>
		        		<a href="postlist.php?delete=<?php echo $row['ide']; ?>" class="btn btn-danger" onclick="return confirm ('Are you sure you want to delete!!')">DELETE</a>
		        	</td>
		        </tr>
		    <?php endwhile;?>
		</table>
	</div>
</body>
</html>