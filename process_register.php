<?php
  require_once("include/connection.php");
  if(isset($_POST['register'])){

  $query="INSERT INTO users (fullname,email,user_password,gender) Values(?,?,?,?)";
  $prepare_statement=mysqli_prepare($connect,$query);

  extract($_POST);
  mysqli_stmt_bind_param($prepare_statement,"ssss",$fullname,$email,$user_password,$gender);
  $result=mysqli_stmt_execute($prepare_statement);
  $last_insert_user_id=mysqli_insert_id($connect);



  $role_insert="INSERT INTO user_role (user_id,user_role) Values(?,?)";
  $prepare_statement=mysqli_prepare($connect,$role_insert);
  mysqli_stmt_bind_param($prepare_statement,"ii",$last_insert_user_id,$role_type);
  mysqli_stmt_execute($prepare_statement);
  if($result){
  header("Location:register.php?msg=Your account have been added successfully!..&color:green");
}
else{
  header("Location:register.php?msg=Your account have been not added..&color:green");

}

  

  }

?>