<style type="text/css">
	.add{
		width: 70%;
		background: gray;
		border-radius: 50px;
		color: white;
		/*font-size: 20px;*/
	}
<?php

	require_once("../include/connection.php");


	
	function getAddPostForm(){
		?>
		    <div class="add">
			<fieldset style="width: 50%;">
					<legend>Add Post</legend>
			<form action="post_process.php" method="POST">
				<table border="2" style="width:100%" >
					<tr>
						<td>Post Title: </td>
						<td><input type="text" name="post_title" required="" placeholder="Enter a post title" style="width:100%"></td>
					</tr>
					<tr>
						<td>Post Summary: </td>
						<td>
							<textarea rows="10" cols="65" name="post_summary" required=""></textarea>
						</td>
					</tr>
					<tr>
						<td>Post Description: </td>
						<td>
							<textarea rows="10" cols="65" name="post_description" required=""></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;">
							<input type="submit" name="add_post" value="Add Post" />
							<input type="reset" name="reset" value="Cancel" />
						</td>
					</tr>
					
				</table>
			</form>
			</fieldset>
		</div>
		<?php
	}

	function getAllPosts(){
		global $connect;
		$query = "SELECT * FROM `posts` where user_role_id=2 ORDER BY post_id DESC";
		 $result = mysqli_query($connect,$query) or die("Error Message".mysqli_error($connect));
		return $result ;
	}


	function getUserInformationByUserRoleId($user_role_id){
			global $connect;
			$query = "SELECT `users`.* FROM `users`,`user_role`
			WHERE `user_role`.`user_id` = `users`.`user_id`
			AND `user_role`.`user_role_id` = ".$user_role_id;
			$result = mysqli_query($connect,$query);
			return mysqli_fetch_assoc($result);


	}

	function getPostByPostId($post_id){
		global $connect;
			$query = "SELECT * FROM `posts` WHERE `posts`.`post_id` = ".$post_id;
			$result = mysqli_query($connect,$query);
			return mysqli_fetch_assoc($result);
	}

	function getEditPostForm($post_id){
		?>
			<fieldset style="width: 50%;">
					<legend>Edit Post</legend>
			<?php  
				$post_data = getPostByPostId($post_id);
			?>
			<form action="post_process.php" method="POST">
				<input type="hidden" name="post_id" value="<?php echo $post_id; ?>">
				<table border="2" style="width:100%" >
					<tr>
						<td>Post Title: </td>
						<td><input type="text" name="post_title" required="" value="<?php echo $post_data['post_title'] ?>" style="width:98%"></td>
					</tr>
					<tr>
						<td>Post Summary: </td>
						<td>
							<textarea rows="10" cols="65" name="post_summary" required=""><?php echo $post_data['post_summary'] ?></textarea>
						</td>
					</tr>
					<tr>
						<td>Post Description: </td>
						<td>
							<textarea rows="10" cols="65" name="post_description" required=""><?php echo $post_data['post_description'] ?></textarea>
						</td>
					</tr>
					<tr>
						<td colspan="2" style="text-align: center;">
							<input type="submit" name="update_post" value="Update Post" />
							<input type="reset" name="reset" value="Cancel" />
						</td>
					</tr>
					
				</table>
			</form>
			</fieldset>
		<?php
	}

	


	




?>