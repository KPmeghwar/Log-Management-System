<?php 
session_start();
require("session_maintain.php");
require("function.php");
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>..:: User ::..</title>
	<style type="text/css">
		.post{
			width: 80%;
			height: auto;
			padding: 20px;
			margin: 10px;
			background-color: skyblue;
			border: 2px solid black;
			border-radius: 30px;
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
		<h1 style="font-family: fantasy; color: blue">User Panel</h1>
		
	<center>
		<h3 class="center">
			Welcome User: <?php echo $_SESSION['user']['fullname']; ?>
			<span style="float:right;">
				<div class="log">
				<a href="../logout.php" >Logout</a>
			</div>
			</span>
			<span style="clear: both;"></span>
		</h3>
		<hr />
	
		<?php 
			$result  = getAllPosts();
				if($result->num_rows > 0){
					while($row = mysqli_fetch_assoc($result)){
							?>
								<div class="post">
									<h4 style="color:red"><b style="color: black">Post Title:</b><?php echo $row['post_title']; ?></h4>
									<p style="color:white"><b style="color: black">Post Summary:</b><?php echo $row['post_summary']; ?></p>
									
									<br />
									<span style="float:right">
										<a href="posts_details.php?post_id=<?php echo $row['post_id']; ?>" style="margin: 10px;">Read More </a>
									</span>
									<span style="clear:both;"></span>
		
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