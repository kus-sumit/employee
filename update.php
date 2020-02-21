<?php
session_start();
include ('auth.php');

?>

<?php 

include ('connection.php');
$edit_id=$_REQUEST['edit_id'];
$sql= "SELECT * FROM employee_insert WHERE emp_id='".$edit_id."'";

$result= mysqli_query($conn,$sql);

$rows=mysqli_fetch_assoc($result);
//print_r($rows);die();
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
  <meta charset="utf-8">
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<!--------------editor------------>
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
 <!--------------editor end------------>
<title>Employee Edit</title>
</head>
<body>
<?php include ('include/header.php') ?>
<div class="container-fluid">
  <div class="row content">
   <?php include ('left_panel.php'); ?>	
<div class="col-sm-7">

<h2>Update Employee Informations:-</h2>

<form action="update_code.php" method="post" name="employeeedit" id="employeeedit" onsubmit="return validate()" enctype= "multipart/form-data">


<input type="hidden" name="edit_id" id="edit_id" value="<?php echo $rows['emp_id']; ?>">


<div class="container">
<div class="col-sm-1">
<h5>Name</h5>
</div>

<div class="col-sm-5">
<input type="text" name="name" id="name" class="form-control kus_input" value="<?php echo $rows['name']; ?>" onblur="this.value=removeSpaces2(this.value);" placeholder="" />
<span id="namelocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">
<div class="col-sm-1">
<h5>Department</h5>
</div>

<div class="col-sm-5">
<input type="text" name="department" id="department" class="form-control kus_input" onblur="this.value=removeSpaces3(this.value);" value="<?php echo $rows['department']; ?>" placeholder="" />
	<span id="departmentlocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">
<div class="col-sm-1">
<h5>Mobile</h5>
</div>

<div class="col-sm-5">
<input type="text" name="mobile" id="mobile" class="form-control kus_input" value="<?php echo $rows['mobile']; ?>" maxlength="10" onkeypress="return isNumberKey1(event)" placeholder="" />
	
	<span id="mobilelocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">
<div class="col-sm-1">
<h5>Email</h5>
</div>

<div class="col-sm-5">
<input type="email" name="email" id="email" class="form-control kus_input" value="<?php echo $rows['email']; ?>" onblur="validateEmail(this);" placeholder="" />
	<span id="emaillocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">
<div class="col-sm-1">
<h5>Gender</h5>
</div>

<div class="col-sm-5">
<select name="gender" id="gender" class="form-control kus_input" >
								
					
		<option value="Male" <?php if ($rows['gender']=='Male') { echo "SELECTED"; } ?>>Male</option>

		<option value="Female" <?php if ($rows['gender']=='Female') { echo "SELECTED"; } ?>>Female</option>

		<option value="Other" <?php if ($rows['gender']=='Other') { echo "SELECTED"; } ?>>Other</option>

  		</select>
		<span id="genderlocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>


<div class="container">
<div class="col-sm-1">
<h5>Description</h5>
</div>

<div class="col-sm-7">
<textarea class="form-control kus_input" name="description" id="description" ><?php echo $rows['description']; ?> </textarea>
	<span id="details" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">
<div class="col-sm-1">
<h5>Photo</h5>
</div>

<div class="col-sm-7">
<div class="col-md-4">
	<input type="file" name="image" id="image"  placeholder="" />
	</div>
	<div class="col-md-6">
	<image class="up_img" src="uploads/thumbs/<?php echo $rows['image']; ?>" name="image" id="image" />
	</div>
	
	<span id="imagelocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">
<div class="col-sm-1">
<h5>Salary</h5>
</div>

<div class="col-sm-5">
<input type="text" class="form-control kus_input" name="salary" id="salary" value="<?php echo $rows['salary']; ?>" onkeypress="return isNumberKey2(event)" placeholder="" />
	<span id="salarylocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">
<div class="col-sm-1">
<h5>Status</h5>
</div>

<div class="col-sm-6">
<input type="radio" name="status" id="status" <?php if($rows['status']=="y") {echo "checked";} ?> value="y"> Active
<input type="radio" name="status" id="status" <?php if($rows['status']=="n") {echo "checked";} ?> value="n"> Deactive
			

  		
<span id="statuslocation" style="color:red; font-size: 14px;"></span>
</div>
</div><br/>

<div class="container">
<div class="col-sm-1">

</div>

<div class="col-sm-6">
<input type="submit" class="btn btn-success btn-block" name="update" id="update" value="Update" />
</div>
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
var company_name=document.employeeedit.company_name.value;

var name=document.employeeedit.name.value;

var department=document.employeeedit.department.value;

var mobile=document.employeeedit.mobile.value; 

var email=document.employeeedit.email.value;

//var image=document.employeeadd.image.value;

var salary=document.employeeedit.salary.value;

var gender=document.employeeedit.gender.value;

//var description=document.employeeadd.description.value;

//var status=document.employeeadd.status.value;




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

<style>
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
      
	 tr {
    line-height: 2;
} 
	 
	</style>
	
	
	<style>
	
	.form-control.kus_input {
    width: 130% ;
}
	.up_img {
    border: 2px solid #23d423;
    border-radius: 50px;
	width: 70px;
	
	height: 70px;
}


	</style>

