<style type="text/css">
     .center{
     	
     	background: gray;

       border-radius: 30px;
     }
     table tr th{
     	background: goldenrod;
     	color: green;
     	font-weight: bold;
     	height: 50px;
     	border-radius: 30px;
     }
     table tr td{
     	text-align: center;

     }
     a {
       background: black;
       color: white;     
       border-radius: 20px;
       text-decoration: none;


     }
</style>
<h1 align="center" style="color: red">Admin Show Login & Logout Time</h1>
<hr>
<?php
require_once("../include/connection.php");
$query="SELECT * FROM users";
$result=mysqli_query($connect,$query);
?>
   <center>
   	
	<table   style="width: 90%;color: white" class="center" cellpadding="10px" >
	  <tr>
			<th >POSTID</th>
			<th>Fullname</th>
			<th>Email</th>
			<th>Passowrd</th>
			<th>Gender</th>
			<th>Logintime</th>
			<th>Logouttime</th>
		</tr>
	

<?php
if($result->num_rows >0){

	while ($row=mysqli_fetch_assoc($result)) {
	?>
    


   
    	<tr>
		<td style="width: 10%" ><?php echo $row['user_id'];?></td>
		<td style="width: 10%"><?php echo $row['fullname'];?></td>
		<td style="width: 10%"><?php echo $row['email'];?></td>
		<td style="width: 10%"><?php echo $row['user_password'];?></td>
		<td style="width: 10%"><?php echo $row['gender'];?></td>
		<td style="width: 10%"><?php echo $row['login_time'];?></td>	
		<td style="width: 10%" ><?php echo $row['logout_time'];?></td>
	</tr>
	<?php
	}
	}	
	?>
    </table>
    <a href="index.php">Back To Admin</a>
    </center>
	