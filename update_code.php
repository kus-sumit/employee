<?php 
include ('connection.php');
include_once("functions.php");
include('auth.php');

//$uploaded_images = array();
$thumb_width = 60;
$thumb_height = 50;
$upload_dir = 'uploads/';
$upload_dir_thumbs = 'uploads/thumbs/';
 
$filename = $_FILES['image']['name'];
$file_tmpname = $_FILES['image']['tmp_name'];
$extension = explode(".", $filename);
$extension_new = end($extension);

$filename_new = "thumb_image".uniqid().".".$extension_new;

$upload_file = $upload_dir.$filename_new;


if(move_uploaded_file($file_tmpname,$upload_file)){
createThumbnail($filename_new, $thumb_width, $thumb_height, $upload_dir, $upload_dir_thumbs);
}


$edit_id=addslashes($_POST['edit_id']);
$name= addslashes($_POST['name']);
$department= addslashes($_POST['department']);
$mobile= addslashes($_POST['mobile']);
$email= addslashes($_POST['email']);
$gender= addslashes($_POST['gender']);
$description= addslashes($_POST['description']);
$image= addslashes($_FILES['image']);
$salary= addslashes($_POST['salary']);
$status= addslashes($_POST['status']);

$sql= "UPDATE employee_insert SET
		
		name='".$name."', 
		department='".$department."',
		mobile='".$mobile."',
		email='".$email."',
		gender='".$gender."',
		description='".$description."',
		image='".$filename_new."',
		salary='".$salary."',
		status='".$status."' 
		WHERE emp_id='".$edit_id."'";
		
		
	
	  
$data=mysqli_query($conn,$sql);

if($data>0)

{

	header('location: show_data.php');


}

else {

	header('location: update.php');

}

?>