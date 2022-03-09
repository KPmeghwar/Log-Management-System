<style type="text/css">
	
.center{
			background: red;
			width: 100%;
			height: 50px;
			border-radius: 50px;
			color: white;
		}
</style>
<?php
session_start();
require("session_maintain.php");
require_once("../include/connection.php");

	
	if(isset($_POST['add_post'])){
			
		$query = "INSERT INTO `posts`(user_role_id,post_title,post_summary,post_description) VALUES(?,?,?,?)";
		$prepared_stmt = mysqli_prepare($connect,$query) or die("Error Message : ".mysqli_error($connect));
		extract($_POST);

		mysqli_stmt_bind_param($prepared_stmt,"isss",$_SESSION['user']['user_role_id'],$post_title,$post_summary,$post_description);
		if(mysqli_stmt_execute($prepared_stmt)){
				header("location:index.php?message=New post has been added successfully!...&color=green");
		}else{
			header("location:index.php?message=New post has not been added!...&color=red");	
		}



	}

	
	if(isset($_REQUEST['update_post'])){

		$query = "Update posts set post_title=?, post_summary=?, post_description = ? where post_id = ?";
		$prepared_stmt = mysqli_prepare($connect,$query) or die("Error Message : ".mysqli_error($connect));
		extract($_POST);

		mysqli_stmt_bind_param($prepared_stmt,"sssi",$post_title,$post_summary,$post_description,$post_id);
		if(mysqli_stmt_execute($prepared_stmt)){
				header("location:index.php?message=Post has been updated successfully!...&color=green");
		}else{
			header("location:index.php?message=Post has not been updated!...&color=red");	
		}

	}

	if(isset($_REQUEST['action']) && $_REQUEST['action'] == "delete" ){

		$query = "Delete From posts where post_id = ?";
		$prepared_stmt = mysqli_prepare($connect,$query) or die("Error Message : ".mysqli_error($connect));
		extract($_GET);

		mysqli_stmt_bind_param($prepared_stmt,"i",$post_id);
		if(mysqli_stmt_execute($prepared_stmt)){
				header("location:index.php?message=Post has been deleted successfully!...&color=green");
		}else{
			header("location:index.php?message=Post  has not been deleted!...&color=red");	
		}


	}
		


?>