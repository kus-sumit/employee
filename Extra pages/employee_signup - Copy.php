<?php session_start(); ?>
<?php
//extract($_POST);

include ('connection.php');

if(isset($_POST['signup']))
{
//$user_id= $_POST['user_id'];
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$password= $_POST['password'];
$EncryptPassword = md5($password);

$confirmpassword= $_POST['confirmpassword'];

$rs=mysqli_query($conn,"select * from employee_signup where email='$name'");


$sql="INSERT INTO employee_signup (name, email, phone, password, confirmpassword) 
		VALUES ('".$name."', '".$email."', '".$phone."', '".$EncryptPassword."', '".$confirmpassword."')";
		
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
}




?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Employee Signup</title>
</head>
<body>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="css/login-style.css" rel="stylesheet" id="login-css" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------- Include the above in your HEAD tag ---------->



<style>
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
	<h2 class="kus_header">Employee Signup</h2>
		<form action="" name="signupform" id="signupform" method="post" onsubmit="return validate()">
		
	<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"> </i></span>
					<input type="text" class="form-control" name="name" id="name" onblur="this.value=removeSpaces(this.value);" placeholder="Employee Name" >

				</div>
				<span id="namelocation" style="color:red; font-size: 14px;"></span>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-envelope"> </i></span>
					<input type="text" class="form-control" name="email" id="email" onblur="validateEmail(this);" placeholder="Email Address" >
				</div>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-user"> </i></span>
					<input type="text" class="form-control"  maxlength="10" onkeypress="return isNumberKey(event)" name="phone" id="phone" placeholder="Phone" >
				</div>
				<span id="phonelocation" style="color:red; font-size: 14px;"></span>
			</div>
			
				<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key"> </i></span>
					<input type="password" class="form-control" name="password" id="password" placeholder="Password" >
					
				</div>
				<span id="passwordlocation" style="color:red; font-size: 14px;"></span>
			</div>
			
			
		
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key"> </i></span>
					<input type="password" class="form-control" name="confirmpassword" id="Confirmpassword"  placeholder="Confirm Password">
				</div>
			</div>
			  <button type="submit" name="signup" id="signup" class="btn btn-success btn-block">Signup</button>
			  <p>Already Register <a class="kus_sign" href="employee_login.php">Login here</a></p>
		</form>
	</article>
	</section>
</div>


<script type="text/javascript">  
function validate(){  
var name=document.signupform.name.value; 

var passwordlength=document.signupform.password.value.length; 

var phone=document.signupform.phone.value; 

var firstpassword=document.signupform.password.value;
var secondpassword=document.signupform.Confirmpassword.value;

//alert(phone);

 
var status=false;  
if(name==""){  
document.getElementById("namelocation").innerHTML= "Please enter your name";  
status=false;
}else{  
document.getElementById("namelocation").innerHTML="";  
status=true;
}  

if(phone==""){  
document.getElementById("phonelocation").innerHTML= "Please enter your phone no";  
status=false;
}else{  
document.getElementById("phonelocation").innerHTML="";  
status=true;
}  
  
if(passwordlength<6){  
document.getElementById("passwordlocation").innerHTML= "Password must be greater than 6";  
status=false; 
}else{  
document.getElementById("passwordlocation").innerHTML="";  
status=true;
} 
//return status;



if(firstpassword!=secondpassword){
status=false;
}
else{
alert("password matched");
//status=true;
}
 return status;
}

function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            alert('Invalid Email Address');
            return false;
        }

        return true;

}


 

</script>  

<script language="javascript" type="text/javascript">
function removeSpaces(string) {
 return string.split(' ').join('');
}


</script>

<script language="javascript" type="text/javascript">

function isNumberKey(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}



</script>

</body>
</html>