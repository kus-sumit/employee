<?php session_start(); ?>
<?php 
//extract($_POST);

include ('connection.php');

if(isset($_POST['submit']))
{	

$email= $_POST['email']; 
$password= $_POST['password'];

$EncryptPassword = md5($password);
$rs=mysqli_query($conn,"select * from employee_signup where email='$email' and password='$EncryptPassword'");

if(mysqli_num_rows($rs)<1)
	{
		$found="N";
	}
	else
	{
		$_SESSION["login"]=$email;
		header('location: dashboard.php');
	}
}	
/* if (isset($_SESSION["login"])) 
{
	
	
	
	header('location: dashboard.php');
exit();
	
}
 */



?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Employee Login</title>
</head>
<body>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/login-style.css" rel="stylesheet" id="login-css" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------- Include the above in your HEAD tag ---------->

<style>
/* .btn-block {
    display: block;
    width: 50%;
} */
a.kus_sign {
    color: #cc0eb4;
    border: 0;
    text-decoration: none;
    font-weight: 600;
    font-size: 18px; text-transform: uppercase;
}
a.kus_sign:hover {
    text-decoration: none;
    color: #000;
}

</style>

<div class="col-md-4 col-md-offset-4" id="login">
	<section id="inner-wrapper" class="login">
	<article>
	<h2 class="kus_header">Employee Login</h2>
	
		<form action="" name="login_form" id="login_form" method="post" enctype= "multipart/form-data" >
		
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"> </i></span>
					<input type="text" class="form-control" name="email" id="email" onblur="validateEmail(this);" placeholder="Email" >
				</div>
				<span id="emaillocation" style="color:red; font-size: 14px;"></span>
			</div>
			
				<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key"> </i></span>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password" >
				</div>
				<span id="passwordlocation" style="color:red; font-size: 14px;"></span>
			</div>
			<button type="submit" name="submit" id="submit" class="btn btn-success btn-block">Login</button>
			<p>New User <a class="kus_sign" href="employee_signin.php">Signup</a></p>
			
			<?php
		  if(isset($found))
		  {
		  	echo '<p class="kus_red">Invalid Email Id or Password<br><a href="employee_signin.php">Please try again</a></p>';
		  }
		  ?>
			  
			  
		</form>
	</article>
	</section>
</div>

<script language="javascript" type="text/javascript">
function validate(){ 

var passwordlength=document.login_form.password.value.length;

var email=document.login_form.email.value;

if(passwordlength<6){  
document.getElementById("passwordlocation").innerHTML= "Write Currect Password.";  
return false; 
}else{  
document.getElementById("passwordlocation").innerHTML="";  
} 
if(email==""){  
document.getElementById("emaillocation").innerHTML= "Please enter emailid";  
return false;
}else{  
document.getElementById("emaillocation").innerHTML="";  
} 
return true;

}



</script>

<script language="javascript" type="text/javascript">


function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            //alert('Invalid Email Address');
			document.getElementById("emaillocation").innerHTML= "Invalid Email Address";
            return false;

</script>

</body>
</html>


