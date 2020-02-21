<?php
include ('connection.php');


if(isset($_POST['save']))
{
	$c_name = $_POST['c_name'];
	$cost = $_POST['cost'];
	$sql1 = "INSERT INTO t_customer (c_name) VALUES ('".$c_name."')";
	
	if (mysqli_query($conn,$sql1))
	{
		
		$last_id = mysqli_insert_id($conn);
		//echo $last_id; die();(for inner join)
	}
	
	$sql2 = "INSERT INTO t_price (custom_id, cost) VALUES ('".$last_id."', '".$cost."')";
	
	mysqli_query($conn,$sql2);
	//mysqli_close($conn);
	
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<link rel="stylesheet" href="css/button-css-others.css" >
<center>
<div class="col-md-12" >
<br/><br/><br/>
<form action="" method="post" name="customer" id="customer" enctype="multipart/form-data">
<table>
<tr>
<td>

<input type="text" class="form-control" name="c_name" placeholder="Customer Name" required><br/><br/></td></tr>
<tr>
<td>
<input type="text" class="form-control" name="cost" placeholder="Price" required><br/><br/></td></tr>
<tr>
<td>
<input type="submit" name="save" id="save" value="Save" />
</td>
</tr></table>

</form>

</div></center>

<div class="col-md-12">
<div class="col-md-6">
<?php


//$custom_id = $_POST['custom_id'];


$query1 = "SELECT * FROM t_customer ORDER BY custom_id";
$data1 = mysqli_query($conn,$query1);
?>
<h2>Customer Name:-</h2>
<table class="table table-striped" border= "1px solid" width="50%" style="text-align: center;">
<thead>
<tr>
<th style="text-align: center;">SL.No</th>
<th style="text-align: center;">Customer Name</th>

</tr>
</thead>
<tbody>
<?php while($row1= mysqli_fetch_assoc($data1)): ?>
<tr>
<td><?php echo $row1['custom_id'] ?></td>
<td><?php echo $row1['c_name'] ?></td>

</tr>
<?php 
endwhile;
?>
</tbody>

</table>

</div>
<div class="col-md-6">

<?php


//$custom_id = $_POST['custom_id'];
$query2 = "SELECT * FROM t_price ORDER BY cost_id";
$data2 = mysqli_query($conn,$query2);

?>
<h2>Customer Price:-</h2>
<table class="table table-striped" border= 1px solid; width="50%" style="text-align: center;">
<thead>
<tr>
<th style="text-align: center;">SL.No</th>
<th style="text-align: center;">Customer Id</th>
<th style="text-align: center;">Customer Cost</th>

</tr>
</thead>
<tbody>

<?php 



while($row2= mysqli_fetch_assoc($data2)): ?>
<tr>

<td><?php echo $row2['cost_id']; ?></td>
<td><?php echo $row2['custom_id']; ?></td>
<td><?php echo $row2['cost']; ?></td>

</tr>
<?php

endwhile; 
?>

</tbody>

</table>

</div>
</div>

<div class="col-md-12">
<div class="col-md-6">
<h2>Full Details(Inner Join):-</h2>
<table class="table table-striped" border= 1px solid; width="50%" style="text-align: center;">
<thead>
<tr>
<th style="text-align: center;">SL.No</th>
<th style="text-align: center;">Customer Name</th>
<th style="text-align: center;">Customer Cost</th>


</tr>
</thead>

<?php
		  
$join1 = "SELECT * FROM t_customer 
			INNER JOIN t_price 
			ON t_customer.custom_id = t_price.custom_id";
	
		  
$res1 = mysqli_query($conn,$join1);

?>
<tbody>
<?php  
	  //if(mysqli_num_rows($res1) != 0)
		if(mysqli_num_rows($res1) > 0)
	  {  
		   while($row3 = mysqli_fetch_array($res1))  
		   {  
	  ?>  
	  <tr>  
	  <td><?php echo $row3["cost_id"];?></td>
		   <td><?php echo $row3["c_name"];?></td>  
		   <td><?php echo $row3["cost"]; ?></td>  
	  </tr>  
	  <?php  
		   }  
	  }  
	  ?>  

</tbody>

</table>


</div>
<!--div class="col-md-6">
<h2>Full Details(Left Join):-</h2>
<table class="table table-striped" border= 1px solid; width="50%" style="text-align: center;">
<thead>
<tr>
<th style="text-align: center;">SL.No</th>
<th style="text-align: center;">Customer Name</th>
<th style="text-align: center;">Customer Cost</th>


</tr>
</thead>

<?php
		  
$join1 = "SELECT * FROM t_customer 
			LEFT JOIN t_price 
			ON t_customer.custom_id = t_price.custom_id";
	
		  
$res1 = mysqli_query($conn,$join1);

?>
<tbody>
<?php  
	  //if(mysqli_num_rows($res1) != 0)
		if(mysqli_num_rows($res1) > 0)
	  {  
		   while($row3 = mysqli_fetch_array($res1))  
		   {  
	  ?>  
	  <tr>  
	  <td><?php echo $row3["cost_id"];?></td>
		   <td><?php echo $row3["c_name"];?></td>  
		   <td><?php echo $row3["cost"]; ?></td>  
	  </tr>  
	  <?php  
		   }  
	  }  
	  ?>  

</tbody>

</table>


</div>
</div>



<!--div class="col-md-12">
<div class="col-md-6">
<h2>Full Details(Right Join):-</h2>
<table class="table table-striped" border= 1px solid; width="50%" style="text-align: center;">
<thead>
<tr>
<th style="text-align: center;">SL.No</th>
<th style="text-align: center;">Customer Name</th>
<th style="text-align: center;">Customer Cost</th>


</tr>
</thead>

<?php
		  
$join1 = "SELECT * FROM t_customer 
			RIGHT JOIN t_price 
			ON t_customer.custom_id = t_price.custom_id";
	
		  
$res1 = mysqli_query($conn,$join1);

?>
<tbody>
<?php  
	  //if(mysqli_num_rows($res1) != 0)
		if(mysqli_num_rows($res1) > 0)
	  {  
		   while($row3 = mysqli_fetch_array($res1))  
		   {  
	  ?>  
	  <tr>  
	  <td><?php echo $row3["cost_id"];?></td>
		   <td><?php echo $row3["c_name"];?></td>  
		   <td><?php echo $row3["cost"]; ?></td>  
	  </tr>  
	  <?php  
		   }  
	  }  
	  ?>  

</tbody>

</table>


</div-->

