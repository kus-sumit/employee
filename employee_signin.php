<?php session_start(); ?>
<?php
//extract($_POST);

include ('connection.php');

if(isset($_POST['signup']))
{

//FILE UPLOAD START	

//print_r($_FILES);	
$ImageName = $_FILES['photo']['name'];
$ImageName_new = explode(".", $ImageName);
$ImageName_new_name = end($ImageName_new);
$ImageNew_name = uniqid().".".$ImageName_new_name;
$fileElementName = 'photo';
$path = 'images/'; 
$location = $path . $ImageNew_name; 
move_uploaded_file($_FILES['photo']['tmp_name'], $location);

		
//$user_id= $_POST['user_id'];
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$password= $_POST['password'];
$EncryptPassword = md5($password);

$confirmpassword= $_POST['confirmpassword'];

$photo= $ImageName;

$echeck="select email from employee_signup where email='".$email."'";
$echk=mysqli_query($conn, $echeck);
$ecount=mysqli_num_rows($echk);

if($ecount > 0)
   {
      echo "<script>alert('Email already exists');</script>";
   }
else {
		$sql="INSERT INTO employee_signup (name, email, phone, password, confirmpassword, photo) 
		VALUES ('".$name."', '".$email."', '".$phone."', '".$EncryptPassword."', '".$confirmpassword."', '".$ImageNew_name."')";
		$rs= mysqli_query($conn,$sql);
		if($rs>0)
		{
			 //echo "Values are inserted";
			
			header('location: index.php');
		}

		else 
		{
			//echo "Values are not inserted";
			
			header('location: employee_signin.php');
			
		}
	}

//$rs=mysqli_query($conn,"select * from employee_signup where email='$name'");

   

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
		<form action="" name="signupform" id="signupform" method="post" enctype="multipart/form-data" onsubmit="return validate()">
		
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
				<span id="emaillocation" style="color:red; font-size: 14px;"></span>
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
				<span id="passwordlocation2" style="color:red; font-size: 14px;"></span>
			</div>
			
			<div class="form-group">
				<div class="input-group">
					<span class="input-group-addon"><i class="fa fa-key"> </i></span>
					<input type="file" class="form-control" name="photo" id="photo"   />
					
					
				</div>
				<span id="photolocation" style="color:red; font-size: 14px;"></span>

			</div>
			  <button type="submit" name="signup" id="signup" class="btn btn-success btn-block">Signup</button>
			  <p>Already Register <a class="kus_sign" href="index.php">Login here</a></p>
		</form>
	</article>
	</section>
</div>


<script type="text/javascript"> 

function validate () {

var name=document.signupform.name.value;	
var email=document.signupform.email.value;
var phone=document.signupform.phone.value;


var firstpassword=document.signupform.password.value;
var secondpassword=document.signupform.confirmpassword.value;

var photo=document.signupform.photo.value;

	
if(name==""){  
document.getElementById("namelocation").innerHTML= "Please enter your name";  
return false;
}else{  
document.getElementById("namelocation").innerHTML="";  
}

if(email==""){  
document.getElementById("emaillocation").innerHTML= "Please enter emailid";  
return false;
}else{  
document.getElementById("emaillocation").innerHTML="";  
} 

if(phone==""){  
document.getElementById("phonelocation").innerHTML= "Please enter phoneno";  
return false;
}else{  
document.getElementById("phonelocation").innerHTML="";  
}

if(firstpassword==""){  
document.getElementById("passwordlocation").innerHTML= "Please enter password";  
return false;
}else{  
document.getElementById("passwordlocation").innerHTML="";  
}

if(firstpassword.length<6){  
document.getElementById("passwordlocation").innerHTML= "Password must be greater than 6";  
return false;
}else{  
document.getElementById("passwordlocation").innerHTML="";  

} 

if(firstpassword!=secondpassword){
	document.getElementById("passwordlocation2").innerHTML= "Password Miss match";
return false;
}
else{
document.getElementById("passwordlocation2").innerHTML= "";
//status=true;
}

if(phone==""){  
document.getElementById("phonelocation").innerHTML= "Please enter emailid";  
return false;
}else{  
document.getElementById("phonelocation").innerHTML="";  
}

if(photo==""){  
document.getElementById("photolocation").innerHTML= "Please select image";  
return false;
}else{  
document.getElementById("photolocation").innerHTML="";  
}

return true;
}

	


function validateEmail(emailField){
        var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

        if (reg.test(emailField.value) == false) 
        {
            //alert('Invalid Email Address');
			document.getElementById("emaillocation").innerHTML= "Invalid Email Address";
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