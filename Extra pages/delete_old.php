<?php 
include ('connection.php'); 
include ('auth.php');
$delete_id=$_GET['delete_id'];

$sql= "DELETE FROM employee_insert WHERE emp_id='".$delete_id."'";
//echo $sql;

$data=mysqli_query($conn,$sql);

if($data>0)

{

	//echo "Data is deleted";
	header('location: show_data.php');

}

else {


	//echo "Data is not deleted". mysqli_error($conn);

}
//mysqli_close($conn);
?>

<?php
/* if(isset($_GET['delete_id']) && $_GET['delete_id']!=""){
$delete_id=$_GET['delete_id'];
echo $delete_id; die();
$sql= "DELETE FROM employee_insert WHERE emp_id='".$delete_id."'";

$data=mysqli_query($conn,$sql);
header('location: show_data.php');
 */
}
?>