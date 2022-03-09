
<?php
		require_once("../include/connection.php");
		function getAllPosts(){
		global $connect;
		$query = "SELECT * FROM `posts` ORDER BY `posts`.`post_id` DESC";
		return mysqli_query($connect,$query);
		}

		function getPostByPostId($post_id){
		global $connect;
		$query = "SELECT * FROM `posts` WHERE `posts`.`post_id` = ".$post_id;
		return mysqli_query($connect,$query);
		}


		function getUserInformationByUserRoleId($user_role_id){
			global $connect;
			$query = "SELECT `users`.* FROM `users`,`user_role`
			WHERE `user_role`.`user_id` = `users`.`user_id`
			AND `user_role`.`user_role_id` = ".$user_role_id;
			$result = mysqli_query($connect,$query);
			return mysqli_fetch_assoc($result);
		}


?>