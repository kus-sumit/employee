if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>EmailId Already Exists</div>";
	exit;
}

var firstpassword=document.signupform.password.value;
var secondpassword=document.signupform.Confirmpassword.value;

if(firstpassword==secondpassword){
return true;
}
else{
alert("password must be same!");
return false;
}

<?php echo $_SERVER['PHP_SELF']."?id=$id"?>

var x=document.signupform.email.value;  
var atposition=x.indexOf("@");  
var dotposition=x.lastIndexOf(".");  
if (atposition<1 || dotposition<atposition+2 || dotposition+2>=x.length){  
  alert("Please enter a valid e-mail address \n atpostion:"+atposition+"\n dotposition:"+dotposition);  
  return false;  
  }  

$join1 = "SELECT t_customer.*, t_cost.* FROM 
t_customer INNER JOIN t_cost ON t_customer.custom_id = t_cost.custom_id";
<select name="gender" id="gender"  >
								<?php
					if ($rows['gender']=='Male') {
					echo '<option value="Male">Male</option>
							<option value="Female">Female</option>
							<option value="Other">Other</option>';
					}
					if ($rows['gender']=='Female') {
					echo '<option value="Female">Female</option>
							<option value="Male">Male</option>
							<option value="Other">Other</option>';
					}
					if ($rows['gender']=='Other') {
					echo '<option value="Other">Other</option>
							<option value="Male">Male</option>
							<option value="Other">Other</option>';
					}
					?>
					
					<option class="table table-striped" value="Designer" <?php if ($title=='Designer') { echo "SELECTED"; } ?>>Designer</option>

					<option value="Programmer" <?php if ($title=='Programmer') { echo "SELECTED"; } ?>>Programmer</option>

					<option value="Writer" <?php if ($title=='Writer') { echo "SELECTED"; } ?>>Writer</option>

  		</select>
		
		<?php
		
if ($password != $confirmpassword) {

	echo "Password does not match";

	}

	else {

	echo "Do something like process the form";

	}
	
	
/* $ImageName = $_FILES['image']['name'];
$ImageName_new = explode(".", $ImageName);
$ImageName_newimage = end($ImageName_new);
$ImageNew_name = uniqid().".".$ImageName_newimage;
$fileElementName = 'image';
$path = 'images/'; 
$location = $path . $ImageNew_name; 
move_uploaded_file($_FILES['image']['tmp_name'], $location); */
?>		
		
<script  type="text/javascript">
 var frmvalidator = new Validator("signup_form");
 frmvalidator.addValidation("username","req","Please enter Username");
 frmvalidator.addValidation("username","maxlen=40",
        "Max length for Username is 40");
 
 frmvalidator.addValidation("password","req","Please enter Password");
 frmvalidator.addValidation("password","maxlen=20");
 
 frmvalidator.addValidation("email","maxlen=50");
 frmvalidator.addValidation("email","req","Please enter valid email");
 frmvalidator.addValidation("email","email");
 
 //frmvalidator.addValidation("Phone","maxlen=50");
 //frmvalidator.addValidation("Phone","numeric");
 
 //frmvalidator.addValidation("Address","maxlen=50");
 //frmvalidator.addValidation("Country","dontselect=000");

</script>

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
	
	if (mysqli_num_rows($rs)>0)
{
	echo "<br><br><br><div class=head1>EmailId Already Exists</div>";
	exit;
}

extract($_POST);
if(isset($_POST['submit']))
{

//$user_id= $_POST['user_id'];
$name= $_POST['name'];
$email= $_POST['email'];
$phone= $_POST['phone'];
$password= $_POST['password'];
$confirmpassword= $_POST['confirmpassword'];

$rs=mysqli_query($conn,"select * from employee_signup where email='$name'");

echo $rs;

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

	


}
<script type="text/javascript">  
function validate(){  
var name=document.signupform.name.value;  
var passwordlength=document.signupform.password.value.length; 
 
var status=false;  
if(name==""){  
document.getElementById("namelocation").innerHTML=  
" <img src='http://www.javatpoint.com/javascriptpages/images/unchecked.gif'/> Please enter your name";  
status=false;
}else{  
document.getElementById("namelocation").innerHTML=" <img src='http://www.javatpoint.com/javascriptpages/images/checked.gif'/>";  
status=true;
}  
  
if(passwordlength<6){  
document.getElementById("passwordlocation").innerHTML=  
" <img src='http://www.javatpoint.com/javascriptpages/images/unchecked.gif'/> Password must be greater than 6";  
status=false; 
}else{  
document.getElementById("passwordlocation").innerHTML=" <img src='http://www.javatpoint.com/javascriptpages/images/checked.gif'/>";  
}  
  
return status;  
}  
</script>  



<?php

$time = $_SERVER['REQUEST_TIME'];

/**
* for a 30 minute timeout, specified in seconds
*/
$timeout_duration = 1800;

/**
* Here we look for the user's LAST_ACTIVITY timestamp. If
* it's set and indicates our $timeout_duration has passed,
* blow away any previous $_SESSION data and start a new one.
*/
if (isset($_SESSION['LAST_ACTIVITY']) && 
   ($time - $_SESSION['LAST_ACTIVITY']) > $timeout_duration) {
    session_unset();
    session_destroy();
    session_start();
	header("location: employee_signup.php"); 
}

/**
* Finally, update LAST_ACTIVITY so that our timeout
* is based on it and not the user's login time.
*/
$_SESSION['LAST_ACTIVITY'] = $time;

?>




<script language="javascript" type="text/javascript">

function validate(){  
var company_name=document.employeeadd.company_name.value;

var name=document.employeeadd.name.value;

var department=document.employeeadd.department.value;

var mobile=document.employeeadd.mobile.value;
//var mobilelength=document.employeeadd.mobile.value;
 

var email=document.employeeadd.email.value;

var salary=document.employeeadd.salary.value;

var gender=document.employeeadd.gender.value;


var status=false;  
if(company_name==""){  
document.getElementById("companyname").innerHTML= "Please enter company name";  
status=false;
}else{  
document.getElementById("companyname").innerHTML="";  
status=true;
}


if(name==""){  
document.getElementById("namelocation").innerHTML= "Please enter employee name";  
status=false;
}else{  
document.getElementById("namelocation").innerHTML="";  
status=true;
}

if(department==""){  
document.getElementById("departmentlocation").innerHTML= "Please enter depertment name";  
status=false;
}else{  
document.getElementById("departmentlocation").innerHTML="";  
status=true;
}

if(mobile==""){  
document.getElementById("mobilelocation").innerHTML= "Please enter mobile number";  
status=false;
}else{  
document.getElementById("mobilelocation").innerHTML="";  
status=true;
}

if(mobile.length!=10){  
document.getElementById("mobilelocation").innerHTML= "Enter Valid Mobile Number";  
status=false; 
}else{  
document.getElementById("mobilelocation").innerHTML="";  
status=true;
}


if(email==""){  
document.getElementById("emaillocation").innerHTML= "Please enter emailid";  
status=false;
}else{  
document.getElementById("emaillocation").innerHTML="";  
status=true;
}

if(salary==""){  
document.getElementById("salarylocation").innerHTML= "Please enter salary";  
status=false;
}else{  
document.getElementById("salarylocation").innerHTML="";  
status=true;
}

if(gender==""){  
document.getElementById("genderlocation").innerHTML= "Please select gender";  
status=false;
}else{  
document.getElementById("genderlocation").innerHTML="";  
status=true;
}

return status;
}


</script>

