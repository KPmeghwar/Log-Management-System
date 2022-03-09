<!DOCTYPE html>
<html>
<head>
	<title>..::BMS-Register::..</title>
	<style type="text/css">
	.add{
		width: 50%;
		background: gray;
		border-radius: 50px;
		
		height: 250px;
		/*font-size: 20px;*/
	}
	</style>
</head>
<body>

	<center>
		<h1>Blog Management System</h1>
		<hr />
		<h3 style="color: green">
		<?php if(isset($_REQUEST['msg'])){
	       echo $_REQUEST['msg'];}?></h3>
	       <div class="add">
		<fieldset style="width:60%">
			     <legend>Register Here</legend>
			     <form action="process_register.php" method="POST">
			     	<table border="2" width="70%">
			     		<tr>
			     		   	<td>Fullname:</td>
			     		   	<td><input type="text" name="fullname" required="" placeholder="Enter a fullname" style="width:98%"></td>
			     		</tr>
			     		<tr>
			     		   	<td>Email:</td>
			     		   	<td><input type="email" name="email" required="" placeholder="Enter an email" style="width:98%"></td>
			     		</tr>

			     	    <tr>
			     		    <td>Password:</td>
			     		    <td><input type="password" name="user_password" required="" placeholder="Enter a password" style="width:98%"></td>
			     	    </tr>
			     	    
			     	    <tr>
			     		    <td>Gender:</td>
			     		    <td><input type="radio" name="gender" value="Male" checked="">Male
			     		        <input type="radio" name="gender" value="Female">Female
                                
			     		    </td>
                         </tr> 
       
                         <tr>
                         	<td>Select Role</td>
                         		<?php
                                require_once("include/connection.php");
                                $query="SELECT*FROM `roles` WHERE role_id <> 1";
                                $result=mysqli_query($connect,$query);
                         		?>
                         		<td><select name="role_type">
                         		<?php
                                while($row=mysqli_fetch_assoc($result)){     
                         		?>
                         		<option value="<?php echo $row['role_id'];?>"><?php echo $row['role_type'];?></option>

	                           <?php
                                 }
                         		?>
                         		</select>
                         		</td>
                         			                         	 
                         </tr>                        
			     	    
-			     	    <tr>
			     	    	<td colspan="2" align="center"><input type="submit" name="register" value="Register">
                                <input type="submit" name="cancel" value="Cancel">
			     	    	</td>
			     	    </tr>


			     	</table>
			     </form>

		</fieldset>
		 You Have Already An Account
		<a href="index.php">Login</a>
	</div>
	</center>

</body>
</html>