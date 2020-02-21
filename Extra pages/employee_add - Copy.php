<?php include ('connection.php'); ?>
<?php session_start(); 

if (isset($_SESSION["login"]))
	
	{


?>




 
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
 <!--------------editor------------>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
 <!--------------editor end------------>
  
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="js/jquery.form.js"></script> 
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--script> 
        
        $(document).ready(function() { 
            
            $('#employeeadd').ajaxForm(function() { 
                alert("Thank you for your comment!"); 
            }); 
        }); 
    </script--> 
<title>Employee Add</title>
</head>
<body>
<!--p ><a href="logout.php" class="kus_log">Logout</a></p-->
	
	
	
<?php include ('include/header.php') ?>
<div class="container-fluid">
  <div class="row content">
   <?php include ('left_panel.php'); ?>	
	<div class="col-sm-7">
<h2 >Employee Information Add:-</h2>
<form action="insert.php" method="post" name="employeeadd" id="employeeadd" onsubmit="return validate()" enctype= "multipart/form-data" >


<!--tr style="line-height: 3.5">
<td>Company Name &nbsp;</td><td><input type="text" class="form-control kus_input" name="company_name" id="company_name" onblur="this.value=removeSpaces1(this.value);" placeholder="" />
<span id="companyname" style="color:red; font-size: 14px;"></span>
</td>

</tr-->
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
	<input type="file" name="image[]" id="image"  placeholder="" />
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

/* if(description==""){  
document.getElementById("details").innerHTML= "Please write some details";  
return false;
}else{  
document.getElementById("details").innerHTML="";  
}  */



/* if(status==""){  
document.getElementById("statuslocation").innerHTML= "Please select status";  
return false;
}else{  
document.getElementById("statuslocation").innerHTML="";  
} */

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

<?php
	}
	else
	{
		header('location: index.php');
	}
	
	?>
	
	
	
	
		<style>
	
	.kus_log {
	
	border: 2px solid #f72e0e;
    background: #360ce0;
    padding: 4px 8px;
    border-radius: 7px 0;
    color: #fff2f2;
    text-decoration: none;
    transition: all 0.3s ease-in;
    font-weight: 600;
	
	
}

.kus_log:hover {
    background: #0ce0e0;
    color: #000;
}



/************CK EDITOR***********************/

div#cke_1_contents {
    height: 140px !important;
}

/************CK EDITOR END***********************/
     /* Set gray background color and 100% height */
 .row.content {height: 1500px} 
	
	/* .row.content {
    height: auto;
} */
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
    
    /* Set black background color, white text and some padding */
    footer {
      background-color: #555;
      color: white;
      padding: 15px;
    }
	
    
    /* On small screens, set height to 'auto' for sidenav and grid */
    @media screen and (max-width: 767px) {
      .sidenav {
        height: auto;
        padding: 15px;
      }
      

	 
	</style>
	
	
	<style>
	
	/*.form-control.kus_input {
    width: 130% ;
}*/
	
	</style>
	
<?php if (isset($_GET["alert"])): ?>
 <script type="text/javascript">
 alert("<?php echo htmlentities(urldecode($_GET["alert"])); ?>");
 </script>
 <?php endif; ?>



