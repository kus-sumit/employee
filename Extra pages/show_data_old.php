<?php
session_start();
include ('connection.php');
include('pagination.php');

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

<h2 >Employee Details List :-</h2>
<?php
if(isset($_POST['valuesearch']))
	{
		//$val_check = $_POST['search_check'];
		
		$valuetosearch= $_POST['valuetosearch'];
		$query= "SELECT * FROM employee_insert WHERE CONCAT 
				(emp_id, name, salary) LIKE '%".$valuetosearch."%'";
		//$search_result = filterTable($query);
		$filter_result= mysqli_query($conn,$query);
		//$row=mysqli_fetch_assoc($filter_result);
	}
	else
	{
		
		//$query= "SELECT * FROM employee_insert ORDER BY emp_id";
		//$filter_result= mysqli_query($conn,$query);
		//$row=mysqli_fetch_assoc($nquery);
		//echo "<script>alart('No Record Found!!')</script>";
		
	}
?>



<form action="" method="post" >
<input type="text" name="valuetosearch" value="" placeholder="Type a value" /> 

<!--<input type="hidden" name="search_check" value="search_run" /> -->
<input type="submit" name="valuesearch" value="search"  /><br/><br/>




<table>
<tr>
<th>&nbsp;Sl.No&nbsp;</th>
<th>&nbsp;Employee Name&nbsp;</th>
<th>&nbsp;Mobile&nbsp;</th>
<th>&nbsp;Email&nbsp;</th>
<th>&nbsp;Gender&nbsp;</th>
<th>&nbsp;Description&nbsp;</th>
<th>&nbsp;Image&nbsp;</td>
<th>&nbsp;Salary&nbsp;</th>
<th>&nbsp;Status&nbsp;</th>
<th colspan=2 style="text-align: center;">&nbsp;Action</th>
</tr>
<?php
//$row=mysqli_fetch_assoc($nquery);
if(isset($_POST['valuesearch']))
{
	while($row=mysqli_fetch_assoc($filter_result)):?>


	<tr>
	<td>&nbsp;<?php echo $row['emp_id'] ?></td>

	<td>&nbsp;<?php echo $row['name'] ?></td>
	
	<td>&nbsp;<?php echo $row['mobile'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['email'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['gender'] ?></td>
	<td>&nbsp;&nbsp;<?php echo $row['description'] ?>&nbsp;&nbsp;</td>
	<td>&nbsp;<?php echo '<img src="images/'.$row['image'].'"  style="border: 2px solid #23d423; border-radius: 50px; width: 70px; height: 70px;" />' ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['salary'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['status'] ?></td>
	<td><?php echo '<a class="update" onclick="return checkUpdate()" href="update.php?edit_id='.$row['emp_id'].'">Update</a>' ?></td>
	<td><?php echo '<a class="delete" onclick="return checkDelete()" href="delete.php?delete_id='.$row['emp_id'].'">Delete</a>' ?></td>

	</tr>



<?php 
endwhile; 
}
else{
	while($row=mysqli_fetch_assoc($nquery)):?>


	<tr>
	<td>&nbsp;<?php echo $row['emp_id'] ?></td>
	<!---td><?php echo $row['company_name'] ?></td-->
	<td>&nbsp;<?php echo $row['name'] ?></td>
	<!--td><?php echo $row['department'] ?></td-->
	<td>&nbsp;<?php echo $row['mobile'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['email'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['gender'] ?></td>
	<td>&nbsp;&nbsp;<?php echo $row['description'] ?>&nbsp;&nbsp;</td>
	<td>&nbsp;<?php echo '<img src="images/'.$row['image'].'"  style="border: 2px solid #23d423; border-radius: 50px; width: 70px; height: 70px;" />' ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['salary'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['status'] ?></td>
	<td><?php echo '<a class="update" onclick="return checkUpdate()" href="update.php?edit_id='.$row['emp_id'].'">Update</a>' ?></td>
	<td><?php echo '<a class="delete" onclick="return checkDelete()" href="delete.php?delete_id='.$row['emp_id'].'">Delete</a>' ?></td>

	</tr>



<?php 
endwhile; 
}?>

</table>
 <div class="col-md-8" id="pagination_controls"><?php echo $paginationCtrls; ?></div>
</form>

</div>
</div>
</div>
<?php include ('include/footer.php') ?>
<?php
	}
	else
	{
		header('location: index.php');
	}
	
	?>
	
	
<script language="JavaScript" type="text/javascript">
function checkDelete(){
    return confirm('Are you sure?');
}
function checkUpdate(){
    return confirm('Do you want to edit?');
}
</script>	
	
</body>	
</html>


<style>

table, tr, th, td{
	
	
	border: 1px solid green;
}

div#pagination_controls {
    float: right;
    line-height: 4;
}

.btn-default {
    color: #333;
    background-color: #fff;
    border-color: #2e43dc;
}
a.btn.btn-default:hover {
    background-color: #3db8cc;
    color: #fff;
}
</style>
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