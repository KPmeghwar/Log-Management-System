<?php
	// session_start();
	if(!isset($_SESSION['user'])){
		header("location:../index.php?message=Kindly first login into your account!..&color=red");
	}

	if(isset($_SESSION['user'])){
		if($_SESSION['user']['role_id'] != 1){
			header("location:../index.php");
		}
	}




?>