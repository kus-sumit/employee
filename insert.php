<?php
include ('connection.php'); 
include('auth.php');
include_once("functions.php");
?>

<?php
//$uploaded_images = array();
$thumb_width = 60;
$thumb_height = 60;
$upload_dir = 'uploads/';
$upload_dir_thumbs = 'uploads/thumbs/';
$filename = $_FILES['image']['name'];

$file_tmpname = $_FILES['image']['tmp_name'];
$extension = explode(".", $filename);
$extension_new = end($extension);
$filename_new = "demo_image".uniqid().".".$extension_new;

$upload_file = $upload_dir.$filename_new;

if(move_uploaded_file($file_tmpname,$upload_file)){
createThumbnail($filename_new, $thumb_width, $thumb_height, $upload_dir, $upload_dir_thumbs);
}

	$name= addslashes($_POST['name']);
	$department= addslashes($_POST['department']);
	$mobile= addslashes($_POST['mobile']);
	$email= addslashes($_POST['email']);
	$gender= addslashes($_POST['gender']);
	$description= addslashes($_POST['description']);
	$image= addslashes($_FILES['image']);
	$salary= addslashes($_POST['salary']);
	$status= addslashes($_POST['status']);
	
	
	$sql="INSERT INTO employee_insert 
		(name, department, mobile, email, gender, description, image, salary, status) VALUES 
		('".$name."', '".$department."', '".$mobile."', '".$email."', '".$gender."', '".$description."', '".$filename_new."', '".$salary."', '".$status."')";

		$data=mysqli_query($conn,$sql);

		if($data>0)
		{
			header( 'Location: employee_add.php?alert='.
			urlencode("Data inserted successfully !!")) ;
			
		}	
			
		else {
	
				header( 'Location: employee_add.php?alert='.
				urlencode("Data is not inserted !!")) ;

			}
	
/* $echeck="select email from employee_insert where email='".$email."'";
$echk=mysqli_query($conn, $echeck);
$ecount=mysqli_num_rows($echk);

if($ecount > 0)
	{
		echo "<script>alert('Email already exists');</script>";
	}	
	
	else{
		
		$sql="INSERT INTO employee_insert 
		(name, department, mobile, email, gender, description, image, salary, status) VALUES 
		('".$name."', '".$department."', '".$mobile."', '".$email."', '".$gender."', '".$description."', '".$filename_new."', '".$salary."', '".$status."')";

		$data=mysqli_query($conn,$sql);

		if($data>0)
		{
			header( 'Location: employee_add.php?alert='.
			urlencode("Data inserted successfully !!")) ;
			
		}	
			
		else {
	
				header( 'Location: employee_add.php?alert='.
				urlencode("Data is not inserted !!")) ;

			}
		
	} */
	
?>