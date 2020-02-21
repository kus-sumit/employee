<?php
session_start();
include ('connection.php');
include ('auth.php');
?>
 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 
 <link rel="stylesheet" href="css/button-css-others.css" >
 
 <!-----Date Picker--->
 
		<!-----Date Picker end--->
 <!--------------editor------------>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>


 <!--------------editor end------------>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/jquery.form.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

<title>Employee Add</title>
</head>
<body>

	

	
<?php include ('include/header.php') ?>
<div class="container-fluid">
  <div class="row content">
   <?php include ('left_panel.php'); ?>	

<div class="col-sm-6">

</div>

<div class="col-sm-6">
<p class="but_add" ></p>
</div>

 
	<div class="col-sm-8">
<h2 >Consumer information:-</h2>



<form action="insert.php" method="post" name="employeeadd" id="employeeadd" onsubmit="return validate();" enctype= "multipart/form-data" >


<div class="container">
<div class="col-sm-1">
<h5>Name</h5>
</div>

<div class="col-sm-6">
<input type="text" name="name" id="name" class="form-control kus_input" onblur="this.value=removeSpaces2(this.value);" placeholder="" />
<span id="namelocation" style="color:red; font-size: 14px;"></span>
</div>
</div>

<br/>

<div class="container">

<div class="col-sm-1">
<h5>Department</h5>
</div>

<div class="col-sm-6">
	<input type="text" name="department" id="department" class="form-control kus_input" onblur="this.value=removeSpaces3(this.value);"  placeholder="" />
<span id="departmentlocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">

<div class="col-sm-1">
<h5>Mobile</h5>
</div>

<div class="col-sm-6">
	<input type="text" name="mobile" id="mobile" class="form-control kus_input" onkeypress="return isNumberKey1(event)"  placeholder="" />
	<span id="mobilelocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">

<div class="col-sm-1">
<h5>Email</h5>
</div>

<div class="col-sm-6">
	<input type="text" name="email" id="email"  class="form-control kus_input" onblur="validateEmail(this);" placeholder="" />
	<span id="emaillocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">

<div class="col-sm-1">
<h5>Gender</h5>
</div>

<div class="col-sm-6">
	<select name="gender" id="gender" class="form-control kus_input" >
  			<option value="">---Select---</option>
  				<option value="Male">Male</option>
  				<option value="Female">Female</option>
  				<option value="Other">Other</option>

  		</select>
<span id="genderlocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">

<div class="col-sm-1">
<h5>Description</h5>
</div>

<div class="col-sm-6">
	<textarea class="form-control kus_input" name="description"  id="description" ></textarea>
	<span id="details" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">

<div class="col-sm-1">
<h5>Photo</h5>
</div>

<div class="col-sm-6">
	<input type="file" name="image" id="image"  placeholder=""  />
	<span id="imagelocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">

<div class="col-sm-1">
<h5>Salary</h5>
</div>

<div class="col-sm-6">
	<input type="text" name="salary" id="salary" class="form-control kus_input" onkeypress="return isNumberKey2(event)" placeholder="" />
	<span id="salarylocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>


<div class="container">

<div class="col-sm-1">
<h5>Status</h5>
</div>

<div class="col-sm-6">
	<input type="radio" name="status" id="status" value="y" checked > Active
	<input type="radio" name="status" id="status" value="n"> Deactive
</div>
</div><br/>


<div class="container">

<div class="col-sm-1"></div>
<div class="col-sm-6"><input type="submit" name="save" id="save" value="Save" class="btn btn-success btn-block" placeholder="" /></div>
</div>

</form>

</div>



</div></div>

<?php include ('include/footer.php') ?>

<!--------------editor------------>


<script type="text/javascript">
        CKEDITOR.replace( 'description' );
</script>

<!--------------editor end------------>
<script language="javascript" type="text/javascript">


function validate(){  
//var company_name=document.employeeadd.company_name.value;

var name=document.employeeadd.name.value;

var department=document.employeeadd.department.value;

var mobile=document.employeeadd.mobile.value; 

var email=document.employeeadd.email.value;
var image=document.employeeadd.image.value;
var salary=document.employeeadd.salary.value;

var gender=document.employeeadd.gender.value;


if(name==""){  
document.getElementById("namelocation").innerHTML= "Please enter employee name";  
return false;
}else{  
document.getElementById("namelocation").innerHTML="";  
}

if(department==""){  
document.getElementById("departmentlocation").innerHTML= "Please enter depertment name";  
return false;
}else{  
document.getElementById("departmentlocation").innerHTML=""; 
}

if(mobile.length==0){  
document.getElementById("mobilelocation").innerHTML= "Please enter mobile number";  
return false;
}
else if(mobile.length!=10)
{
document.getElementById("mobilelocation").innerHTML= "Enter Valid Mobile Number";  
return false; 
}else{  
document.getElementById("mobilelocation").innerHTML="";  
}
if(email==""){  
document.getElementById("emaillocation").innerHTML= "Please enter emailid";  
return false;
}else{  
document.getElementById("emaillocation").innerHTML="";  
}

if(gender==""){  
document.getElementById("genderlocation").innerHTML= "Please select gender";  
return false;
}else{  
document.getElementById("genderlocation").innerHTML="";  
} 



if(image==""){  
document.getElementById("imagelocation").innerHTML= "Please select image";  
return false;
}else{  
document.getElementById("imagelocation").innerHTML="";  
}



if(salary==""){  
document.getElementById("salarylocation").innerHTML= "Please enter salary";  
return false;
}else{  
document.getElementById("salarylocation").innerHTML="";  
}

return true;
}


</script>

<script language="javascript" type="text/javascript">
function removeSpaces1(string) {
 return string.split(' ').join('');
}

function removeSpaces2(string) {
 return string.split(' ').join('');
}

function removeSpaces3(string) {
 return string.split(' ').join('');
}

function isNumberKey1(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
}


function isNumberKey2(evt)
{
var charCode = (evt.which) ? evt.which : event.keyCode
if (charCode > 31 && (charCode < 48 || charCode > 57))
return false;
return true;
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



</body>
</html>
<?php if (isset($_GET["alert"])): ?>
 <script type="text/javascript">
 alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");
 </script>
 <?php endif; ?>


