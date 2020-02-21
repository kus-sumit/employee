<?php 
include ('connection.php'); 
extract($_POST);

$username= $_POST['username'];
$password= $_POST['password'];

if(isset($submit)) 
	
{
		$rs=mysqli_query($conn,"select * from employee_signup where username='$username' and password='$password'");
		
		echo $rs; die();
		if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION["login"]=$username;
	}
		
}

if (isset($_SESSION["login"])) 
{
	
	echo "<h1 align=center>Hye you are sucessfully login!!!</h1>";
exit;
	
}





?>