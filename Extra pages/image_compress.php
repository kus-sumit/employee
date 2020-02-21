<?php include ('connection.php'); ?>
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
	<input type="file" name="image" id="image"  placeholder="" />
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
