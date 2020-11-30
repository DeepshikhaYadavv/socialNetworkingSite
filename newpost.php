<?php
session_start();
$myimg="";
$mytitle=$mydes="";
$hid=0;
$update="";
$con= mysqli_connect('127.0.0.1','root','','deepshikhaproject');
if(!$con)
{
    echo "Connection failed";
    }
if(isset($_POST['submit'])){
	$id= $_SESSION['id'];
	$update='false';
	$title= $_POST['title'];
	$dis= $_POST['dis'];
	$profileImage= $_FILES['profileimg']['name'];
	$res= mysqli_query($con,"insert into title (titlee,discription,image,userTitle) values ('$title','$dis','$profileImage','$id')");
	if ($res) {
		echo "<script>alert('YOUR POST IS SUCCESSFULLY INSERTED')</script>";
	}
	else{
		echo "<script>alert('NOT UPDATED')</script>";
	}
	
}
if (isset($_GET['edit'])) {
	  $ide= $_GET['edit'];
	  $_SESSION['ide']=$ide;
	  $res=mysqli_query($con,"select * from title where ide='$ide'");
	  $update="true";
	  if ($res) {
	  	$row= mysqli_fetch_assoc($res);
	  	$mytitle= $row['titlee'];
	  	$mydes= $row['discription'];
	  	$myimg= $row['image'];
	  }
	 
	}
	/* if (isset($_POST['update'])) {
		$hid=$_POST['hid'];
		$title= $_POST['title'];
		$des=$_POST['dis'];
		$img= $_FILES['profileimg']['name'];
		$res=mysqli_query($con,"update title set titlee='$title',discription='$des',image='$img' where ide='$_SESSION[ide]' ");

	    /*if ($res) {
			header("location:postlist.php");
			echo "<script>alert('DATA updated SUCCESSFULLY');</script>";
		}
		else{
			echo "<script>alert('DATA NOT UPDATED')</script>";
		}
	}*/
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
	 .container{
		padding: 20px 60px;
		width: 40%;
	  }
	#profiledisplay{
		display: block;
		width: 30%;
		height: 20%;
		border-radius: 50%;
		margin: 10px auto 0;
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
	<div id="display"></div>
	<div class="container">
		<form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" enctype="multipart/form-data">
			<input type="hidden" name="hid" value="<?php echo $hid; ?>">
			<div class="form-group text-center">
				<img src="images/placeholder.jpg" onclick="triggerClick()" id="profiledisplay" >
				<label for="profileimg">PROFILE IMAGE</label>
				<input type="file" id="profileimg" onchange="displayimg(this)" style="display:none;" required name="profileimg">
			</div>
			<div class="form-group">
				<label for="title">TITLE</label>
				<input type="text" class="form-control" id="title" value="<?php echo $mytitle ?>" required placeholder="Title" name="title">
			</div>
			<div class="form-group">
				<label for="dis">DISCRIPTION</label>
				<textarea id="dis" class="form-control" rows="5" placeholder="<?php echo $mydes ?>" required name="dis"></textarea>
			</div>
			<?php if ($update=="true"):?>
			<button  type="submit" id="update" class="btn btn-primary" value="update" name="update">UPDATE</button>
		    <?php else: ?>
			<button  type="submit" class="btn btn-primary" value="submit" name="submit">SUBMIT</button>
		    <?php endif;?>
		</form>
	</div>
	<script type="text/javascript">
	function triggerClick(){
		document.querySelector("#profileimg").click();
	}
	function displayimg(e){
		if (e.files[0]) {
           var reader= new FileReader();

           reader.onload= function(e){
           	document.querySelector("#profiledisplay").setAttribute("src", e.target.result);
           }
           reader.readAsDataURL(e.files[0]);
		};
	}</script>
	<script type="text/javascript">
        $("#update").click(function(){
    		var title = $('#title').val();
    		var dis = $('#dis').val();
    		var img= $('#profileimg').val();
    		var datastring= 'title1='+ title + '&dis1=' +dis+ '&img1=' +img;
    		if (title==""|| dis=="") {
    			alert("please fill all fields");
    		}
    		else{
    		$.ajax({
    			type: "POST",
    			url: "demo.php",
    			data: datastring,
    			success: function(result){
    				alert(result);
    			}
    		  });
    	    }
    	    return false;
        });
	</script>	
</body>
</html>