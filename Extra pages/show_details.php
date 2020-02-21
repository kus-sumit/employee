<?php
session_start();
include ('connection.php');

//echo $_SESSION["login"]; die();
if (isset($_SESSION["login"]))
	
	{

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<title>Employee List</title>
</head>
<body>

<?php include ('include/header.php') ?>
<div class="container-fluid">
  <div class="row content">
   <?php include ('left_panel.php'); ?>	
	<div class="col-sm-9">

<center>

<div>

<h2 >Employee Details List :-</h2>


<!------------SEARCH IN PHP END--------------->
<?php 



//$emp_id=$_GET['emp_id'];

$sql= "SELECT * FROM employee_insert ORDER BY emp_id";

$data= mysqli_query($conn,$sql);

echo "<table border= 1px>";
echo "<tr>";
echo "<td>&nbsp;Sl.No&nbsp;</td>";
//echo "<td>Company Name</td>";
echo "<td>&nbsp;Employee Name&nbsp;</td>";
//echo "<td>Department</td>";
echo "<td>&nbsp;Mobile&nbsp;</td>";
echo "<td>&nbsp;Email&nbsp;</td>";
echo "<td>&nbsp;Gender&nbsp;</td>";
echo "<td>&nbsp;Description&nbsp;</td>";
echo "<td>&nbsp;Image&nbsp;</td>";
echo "<td>&nbsp;Salary&nbsp;</td>";
echo "<td>&nbsp;Status&nbsp;</td>";
echo "<td colspan=2>&nbsp;Action</td>";
echo "</tr>";

while($row=mysqli_fetch_assoc($data))

{

	echo "<tr>";
	echo "<td>&nbsp;".$row['emp_id'].''."</td>";
	//echo "<td>".$row['company_name']."</td>";
	echo "<td>&nbsp;".$row['name']."&nbsp;</td>";
	//echo "<td>".$row['department']."</td>";
	echo "<td>&nbsp;".$row['mobile']."&nbsp;</td>";
	echo "<td>&nbsp;".$row['email']."&nbsp;</td>";
	echo "<td>&nbsp;".$row['gender']."&nbsp;</td>";
	echo "<td>&nbsp;&nbsp;".$row['description']."&nbsp;&nbsp;</td>";
	echo "<td>&nbsp;".'<img src="images/'.$row['image'].'"  style="border: 2px solid #23d423; border-radius: 50px; width: 70px; height: 70px;" />'."&nbsp;</td>";
	echo "<td>&nbsp;".$row['salary']."&nbsp;</td>";
	echo "<td>&nbsp;".$row['status']."&nbsp;</td>";
	echo "<td>".'<a class="update" onclick="return checkUpdate()" href="update.php?edit_id='.$row['emp_id'].'">Update</a>'."</td>";
	echo "<td>".'<a class="delete" onclick="return checkDelete()" href="delete.php?delete_id='.$row['emp_id'].'">Delete</a>'."</td>";
	
	
	echo "</tr>";


}

echo "</table>";

?>

</div>
</center>

</div></div>
<?php include ('include/footer.php') ?>

<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
function checkUpdate(){
    return confirm('Are you sure want to update?');
}
</script>


<style type="text/css">


.update {
	
	
	text-decoration: none;
    border: 0px;
    background: #f0f70b;
    padding: 1px 4px;
    color: #000;
	
}

.update:hover{
	
	color: #f30c0c;
	
	
}

.delete {
	
	
	text-decoration: none;
    border: 0px;
    background: #f30c0c;
    padding: 1px 4px;
    color: #fff;
	
}

.delete:hover{
	
	color: #0f00da;
	
	
}

.kus_emp{

		border: 0px;
		background:#0ee016;
		padding: 4px 8px;
		border-radius: 7px 0;
		color: #000;
		text-decoration: none;
    	transition: all 0.3s ease-in;

}

.kus_emp:hover{

		
		background: blue;
		color: #fff;
	
}

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
	
	.form-control.kus_input {
    width: 130% ;
}
	
	</style>

</body>
</html>

<?php
	}
	else
	{
		header('location: index.php');
	}
	
	?>