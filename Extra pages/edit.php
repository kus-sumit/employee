<?php include ('connection.php');  ?>


<form action="insert.php" method="get">

	<h2 >Insert Employee Informations</h2>

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
	<td>&nbsp;</td><td><input type="submit" name="update" id="update" value="Update" placeholder="" /></td>
</tr>


</table>



</form>