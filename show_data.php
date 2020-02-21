<?php
session_start();
include ('connection.php');
include('auth.php');
include('pagination.php');

if(isset($_GET['delete_id']))
{
$delete_id=$_GET['delete_id'];
$sql= "DELETE FROM employee_insert WHERE emp_id='".$delete_id."'";

$data=mysqli_query($conn,$sql);
header('location: show_data.php');

}
?>






<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  
  <link rel="stylesheet" href="css/button-css-others.css" >
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
<script src="https://rawgit.com/unconditional/jquery-table2excel/master/src/jquery.table2excel.js"></script>  
 
<title>Employee List</title>
</head>
<body>
<?php include ('include/header.php') ?>
<div class="container-fluid">
  <div class="row content">
   <?php include ('left_panel.php'); ?>	
	<div class="col-sm-9">

<h2 >Employee Details List :-</h2>



<form action="" method="post" >
<div class="col-md-12">
<div class="col-md-6">
<input class="form-control kus_input" type="text" name="valuetosearch" id="myInput"  value="" placeholder="Search for names.." /> 
</div>

<div class="col-md-6">
<p class="but_add" ><a href="employee_add.php" >Add</a></p>
</div>

</div>

<br/><br/>


<div class="col-md-12" id="tab">
<input type="button" id="btnExport" value=" Excel " />


<input type="button" value="Create PDF" 
            id="btPrint" onclick="createPDF()" />
<div class="divclass">			
<table >
<thead>
<tr >
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
</thead>
<tbody id="myTable">
<?php while($row=mysqli_fetch_assoc($nquery)):?>


	<tr>
	<td>&nbsp;<?php echo $row['emp_id'] ?></td>
	<td>&nbsp;<?php echo $row['name'] ?></td>
	<td>&nbsp;<?php echo $row['mobile'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['email'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['gender'] ?></td>
	<td>&nbsp;&nbsp;<?php echo $row['description'] ?>&nbsp;&nbsp;</td>
	<td>&nbsp;<?php echo '<img src="uploads/thumbs/'.$row['image'].'"  style="border: 2px solid #23d423; border-radius: 50px; width: 70px; height: 70px;" />' ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['salary'] ?>&nbsp;</td>
	<td>&nbsp;<?php echo $row['status'] ?></td>
	<td class="td_update">
	<?php echo '<a class="update" onclick="return checkUpdate()" href="update.php?edit_id='.$row['emp_id'].'">Update</a>' ?></td>
	<td class="td_delete">
	<?php echo '<a class="delete" onclick="return checkDelete()" href="?delete_id='.$row['emp_id'].'">Delete</a>' ?></td>

	</tr>



<?php 
endwhile; 
?>
</tbody>
</table>

</div>
 <div class="col-md-8" id="pagination_controls"><?php echo $paginationCtrls; ?></div>
 </div>
</form>

</div>
</div>
</div>
<?php include ('include/footer.php') ?>

<!----------------------------------PDF GENERATE-------------->

<script>
/* $("#table2excel").table2excel({
  exclude: ".noExl",
  name: "Worksheet Name",
  filename: "SomeFile",
  fileext: ".xls",
  exclude_img: true,
  exclude_links: true,
  exclude_inputs: true
});  */

$("#btnExport").click(function(e) {
  let file = new Blob([$('.divclass').html()], {type:"application/vnd.ms-excel"});
let url = URL.createObjectURL(file);
let a = $("<a />", {
  href: url,
  download: "filename.xls"}).appendTo("body").get(0).click();
  e.preventDefault();
});


</script>
<script>
    function createPDF() {
        var sTable = document.getElementById('tab').innerHTML;

        var style = "<style>";
        style = style + "table {width: 100%;font: 17px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";

        // CREATE A WINDOW OBJECT.
        var win = window.open('', '', 'height=700,width=700');

        win.document.write('<html><head>');
        win.document.write('<title>Profile</title>');   // <title> FOR PDF HEADER.
        win.document.write(style);          // ADD STYLE INSIDE THE HEAD TAG.
        win.document.write('</head>');
        win.document.write('<body>');
        win.document.write(sTable);         // THE TABLE CONTENTS INSIDE THE BODY TAG.
        win.document.write('</body></html>');

        win.document.close(); 	// CLOSE THE CURRENT WINDOW.

        win.print();    // PRINT THE CONTENTS.
    }
</script>

<!----------------------------------PDF GENERATE END-------------->	
<script>
$(document).ready(function(){
  $("#myInput").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script>
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
        table
        {
            width: 100%;
            font: 17px Calibri; border: 1px solid black;
        }
        table, th, td 
        {
            border: solid 1px #000;
            border-collapse: collapse;
            padding: 2px 3px;
            text-align: center; font-family: initial;
        }
		
		input#btPrint {
    float: right;
}
    </style>