<?php 
session_start();
require("session_maintain.php");
require("function.php");

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>..:: Admin ::..</title>	
	<style type="text/css">
		th{
			height: 30px;
			padding: 10px;
			background-color: red;
			color: white;
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
		<img src="img.png" width="70px" height="50" style="float: left;">
		<h1 style="color: blue; font-family: fantasy;">Admin Panel</h1>
		
	<center>
		<h3 class="center">
			Welcome Admin: <?php echo $_SESSION['user']['fullname']; ?>
			<span style="float:right;">
			<div class="log">
				<a href="show.php">Show Times</a>
				<a href="../logout.php" >Logout</a>
			</div>
			</span>
			<span style="clear: both;"></span>
		</h3>
		</hr>
		<p style="color:<?php echo isset($_REQUEST['color'])?$_REQUEST['color']:'';?>">
			<?php echo isset($_REQUEST['message'])?$_REQUEST['message']:""; ?>
		</p>
		<br />
		<?php 
				
				if(isset($_REQUEST['post_id'])){
					getEditPostForm($_REQUEST['post_id']);
				}else{
					getAddPostForm();
				}
		?>
		<hr />
		<h4 style="background: red;height: 50px;border-radius: 40px; color: white">Over All Posts</h4>
		
		<table border="2" >
			<tr>
				<th width="10%">Post Title</th>
				<th width="30%">Post Summary</th>
				<th width="40%">Post Description</th>
				<th>Author</th>
				<th>Actions</th>
			</tr>
			<?php
				$result  = getAllPosts();
				if($result->num_rows > 0){
					while($row = mysqli_fetch_assoc($result)){
							?>
							<tr>
								<td>
									<?php echo $row['post_title']; ?>
								</td>
								<td>
									<?php echo $row['post_summary']; ?>
								</td>
								<td>
									<?php echo $row['post_description']; ?>
								</td>
								<td>
									<?php 
									$author_info = getUserInformationByUserRoleId($row['user_role_id']);

									?>
									<?php echo $author_info['fullname']; ?>
								</td>
								<td>
									<a href="index.php?post_id=<?php echo $row['post_id']; ?>">Edit</a> | <a href="process_post.php?action=delete&post_id=<?php echo $row['post_id']; ?>">Delete</a>
								</td>

							</tr>	
							<?php
					}
				}else{
						?>
						<tr>
							<td colspan="4">Post Not Avaiable</td>
						</tr>
						<?php
				}

			?>
		</table>	
	</center>



</body>
</html>