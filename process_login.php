 <?php
session_start();
require_once("include/connection.php");
if (isset($_POST['login'])) {


	Extract($_POST);
    $show_query = "SELECT * FROM `users`, `user_role`,`roles`
	WHERE `user_role`.`user_id` = `users`.`user_id`
	AND `user_role`.`role_id` = `roles`.`role_id`
	AND `users`.`email` = '".$email."' AND `users`.`user_password` = '".$user_password."'";

   $result=mysqli_query($connect,$show_query);
   $data=mysqli_fetch_array($result);

     


   if($result->num_rows > 0){

				$_SESSION['user'] = $data;

		 date_default_timezone_set("Asia/Karachi");
    	$current_time    = date('Y-m-d h:i:s');
    	$username=$_SESSION['user']['fullname'];
    	$user_id=$_SESSION['user']['user_id'];

        $filename= "Log/".$_SESSION['user']['fullname'].".txt";
    	$file=fopen($filename,"a+");
    	fwrite($file, ' Userid : '.$user_id.' Username : '.$username." LoginTime : ".$current_time);
    	
		$query2  = "UPDATE users SET login_time = '".$current_time."' WHERE user_id =".$_SESSION['user']['user_id'];
		$result2 = mysqli_query($connect, $query2);


				if($data['role_id'] == 1){
						
					header("location:Admin/index.php");

				}
				elseif($data['role_id'] == 2)
				{

					header("location:Contributor/index.php");
				
				}
				elseif($data['role_id'] == 3)
				{
					
					header("location:User/index.php");
				}

	     	}
		else{

			header("location:index.php?msg= Email And Password Incorrect!...");
		}



	
}

?>