<?php include ('connection.php'); ?>
<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>Employee Add</title>
</head>
<body>
<p ><a href="logout.php" class="kus_log">Logout</a></p>
	<h2 >Employee Information Add:-</h2>
	
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
	</style>

<form action="insert.php" method="get" enctype= multipart/form-data >



<table>

<tr>
<td>Company Name</td><td><input type="text" name="company_name" id="company_name" placeholder="" /></td>
</tr>	

<tr>
<td>Employee Name</td><td><input type="text" name="name" id="name" placeholder="" /></td>
</tr>

<tr>
	<td>Department</td><td><input type="text" name="department" id="department" placeholder="" /></td>
</tr>

<tr>
	<td>Mobile</td><td><input type="text" name="mobile" id="mobile" placeholder="" /></td>
</tr>

<tr>
	<td>Email</td><td><input type="email" name="email" id="email" placeholder="" /></td>
</tr>

<tr>
	<td>Gender</td>

	<td>
  		<select name="gender" id="gender" >
  			<option value="">---Select---</option>
  				<option value="Male">Male</option>
  				<option value="Female">Female</option>
  				<option value="Other">Other</option>

  		</select>

	</td>
</tr>

<tr>
	<td>Salary</td><td><input type="number" name="salary" id="salary" placeholder="" /></td>
</tr>

<tr>
	<td>&nbsp;</td><td><input type="submit" name="save" id="save" value="Save" placeholder="" /></td>
</tr>


</table>
</form>
</body>
</html>