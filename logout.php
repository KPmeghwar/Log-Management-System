<?php
        

session_start();
require_once("include/connection.php");

if(isset($_SESSION['user'])){
	

       //$end_time=$_SESSION['user']["logout_time"];

        date_default_timezone_set("Asia/Karachi");
    	$current_time    = date('Y-m-d h:i:s');

      $username=$_SESSION['user']['fullname'];
    	$user_id=$_SESSION['user']['user_id'];

        $filename= "Log/".$_SESSION['user']['fullname'].".txt";
    	$file=fopen($filename,"a+");
    	fwrite($file, "LogoutTime : ".$current_time);
        

		$query  = "UPDATE users SET logout_time = '".$current_time."' WHERE user_id =".$_SESSION['user']['user_id'];
		$result = mysqli_query($connect, $query);

	 session_destroy();
	header("Location:index.php?msg=Your account Logout Successfully!...");
}
?>