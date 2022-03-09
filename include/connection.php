

<?php
$connect=mysqli_connect("localhost","root","","blog_management_system");

if(mysqli_connect_errno())
{
	die("Error Message:".mysql_connect_error());
    echo"Database connection Failed";
}

?>