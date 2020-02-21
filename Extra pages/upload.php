<?php
include ('connection.php'); ?>

<?php
include_once("functions.php");

/* $ImageName = $_FILES['image']['name'];
$ImageName_new = explode(".", $ImageName);
$ImageName_newimage = end($ImageName_new);
$ImageNew_name = uniqid().".".$ImageName_newimage;
$fileElementName = 'image';
$path = 'images/'; 
$location = $path . $ImageNew_name; 
move_uploaded_file($_FILES['image']['tmp_name'], $location); */

$uploaded_images = array();
$thumb_width = 70;
$thumb_height = 70;
$upload_dir = 'uploads/';
$upload_dir_thumbs = 'uploads/thumbs/';
//foreach($_FILES['image']['name'] as $key=>$val){
//$filename = $_FILES['image']['name'][$key];
$filename = $_FILES['image']['name'];
$file_tmpname = $_FILES['image']['tmp_name'];
$extension = explode(".", $filename);
$extension_new = end($extension);
$filename_new = "demo_image".uniqid().".".$extension_new;
//echo $filename; die();
$upload_file = $upload_dir.$filename_new;
//echo $upload_file; die();
if(move_uploaded_file($file_tmpname,$upload_file)){
createThumbnail($filename_new, $thumb_width, $thumb_height, $upload_dir, $upload_dir_thumbs);
}

	$name= $_POST['name'];
	$department= $_POST['department'];
	$mobile= $_POST['mobile'];
	$email= $_POST['email'];
	$gender= $_POST['gender'];
	$description= $_POST['description'];
	$image= $_FILES['image'];
	$salary= $_POST['salary'];
	$status= $_POST['status'];
	
$sql="INSERT INTO employee_insert 
	(name, department, mobile, email, gender, description, image, salary, status) VALUES 
	('".$name."', '".$department."', '".$mobile."', '".$email."', '".$gender."', '".$description."', '".$filename_new."', '".$salary."', '".$status."')";


$data=mysqli_query($conn,$sql);

if($data>0)	

{

	//echo "<script> alert('')</script>";
	//echo "Data Inserted";

	//header('location: show_data.php');
	
	header( 'Location: employee_add.php?alert='.
        urlencode("Data inserted successfully !!")) ;
}

else {
	
	
	header( 'Location: employee_add.php?alert='.
        urlencode("Data is not inserted !!")) ;
	//echo "Data Not Inserted";

	//header('location: index.php');

}
	
//}
?>