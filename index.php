<!DOCTYPE html>
<html>
<head>
	<title>..::BML-Login::..</title>
	<style type="text/css">
	.add{
		width: 40%;
		background: gray;
		border-radius: 50px;
		
		height: 200px;
		/*font-size: 20px;*/
	}
	</style>
</head>
<body>
	
	<center>
		<h1>Blog Management System</h1>
		<hr />
		<h4 style="color:red"><?php if(isset($_REQUEST['msg'])){
	       echo $_REQUEST['msg'];}
     ?>
	 
    </h4>
        <div class="add">   
		<fieldset style="width:60%">
			     <legend>Login Here</legend>
			     <form action="process_login.php" method="POST">
			     	<table border="2" width="70%">
			     		<tr>
			     		   	<td>Email:</td>
			     		   	<td><input type="email" name="email"  placeholder="Enter an email" style="width:97%"></td>
			     		</tr>

			     	    <tr>
			     		    <td>Password:</td>
			     		    <td><input type="password" name="user_password" placeholder="Enter a password" style="width:97%"></td>
			     	    </tr>
			     	    <tr>
			     	    	<td colspan="2" align="center"><input type="submit" name="login" value="Login">
                                <input type="submit" name="cancel" value="Cancel">
			     	    	</td>
			     	    </tr>
			     	</table>
			     </form>

		</fieldset>

		Don't Have An Account
		<a href="register.php">Register	</a>
    </div>
	</center>
</body>
</html>