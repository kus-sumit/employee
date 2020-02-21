<?php

extract($_POST);
include ('connection.php');

//$user_id= $_POST['user_id'];
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$password= $_POST['password'];
$confirmpassword= $_POST['confirmpassword'];

$rs=mysqli_query($conn,"select * from employee_signup where email='$name'");
if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>EmailId Already Exists</div>";
	exit;
}


$sql="INSERT INTO employee_signup (name, email, phone, password, confirmpassword) 
		VALUES ('".$name."', '".$email."', '".$phone."', '".$password."', '".$confirmpassword."')";
		
$rs= mysqli_query($conn,$sql);	
//echo "<br><br><br><div class=head1>Your Login ID  $username Created Sucessfully</div>";
//echo "<br><div class=head1>Please Login using your EmailId.</div>";
//echo "<br><div class=head1><a href='employee_login.php'>Login</a></div>";

if($rs>0)
	{
		
		//echo "Values are inserted";
		
		header('location: employee_login.php');
	}

	else 
	{
		//echo "Values are not inserted";
		
		header('location: employee_signup.php');
		
	}

	




?>