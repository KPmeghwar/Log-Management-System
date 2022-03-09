<?php 
session_start();
require("session_maintain.php");
require("function.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>..::User::..</title>
	<style type="text/css">
		.post{
			width: 80%;
			height: auto;
			padding: 20px;
			margin: 10px;
			background-color: skyblue;
			border: 2px solid black;
			border-radius: 40px;
			text-align: left;
		}
		.center{
			background: red;
			width: 100%;
			height: 50px;
			border-radius: 50px;
			color: white;
		}
		.log a{
			color: white;
			margin-right: 50px;
		}
	</style>
</head>
<body>
		<img src="img.jpg"  width="70px" height="50" style="float: left;">

		<h1 style="font-family: fantasy;color: blue">User Panel</h1>
		
	<center>
		<h3 class="center">
			Wellcome User: <?php echo $_SESSION['user']['fullname']; ?>
			<span style="float:right;">
				<div class="log">
				<a href="../logout.php" >Logout</a>
			</div>
			</span>
			<span style="clear: both;"></span>
		</h3>
		<hr />
	
		<?php 
			$result  = getPostByPostId($_REQUEST['post_id']);
				if($result->num_rows > 0){
					while($row = mysqli_fetch_assoc($result)){
							?>
								<div class="post" style="text-align: center;">
									<h4><b style="color: red">Post Title:</b><?php echo $row['post_title']; ?></h4>
									<p><b b style="color: red">Post Summary:</b><?php echo $row['post_summary']; ?></p>
									<p><b b style="color: red">Post Description:</b><?php echo $row['post_description']; ?></p>
									<br />
									<br />
									<a href="index.php">View All Posts </a>
								</div>
							<?php
					}
			    }else{
			    	?>
			    		<div class="post">
								<h2>Post Not Avaiable</h2>
						</div>
			    	<?php
			    }
		?>
			</center>
		</body>
</html>