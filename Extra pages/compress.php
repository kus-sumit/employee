<?php

	include ('connection.php');
	
		$name= $_POST['name'];
		$department= $_POST['department'];
		$mobile= $_POST['mobile'];
		$email= $_POST['email'];
		$gender= $_POST['gender'];
		$description= $_POST['description'];
		$image= $_FILES['image'];
		$salary= $_POST['salary'];
		$status= $_POST['status'];
	session_start();
	if(is_array($_FILES)) {

	for($i=0; $i<count($_FILES['image']['tmp_name']); $i++){


	if(is_uploaded_file($_FILES['image']['tmp_name'][$i])) {
	$sourcePath = $_FILES['image']['tmp_name'][$i];
	$upload_dir = "images/";
	$targetPath = "images/".basename($_FILES['image']['name'][$i]);
	$source_image = "images/".basename($_FILES['image']['name'][$i]);
	$imageName =$_FILES['image']['name'][$i];


			$imageFileType = strtolower(pathinfo($targetPath,PATHINFO_EXTENSION)); 

			$check = getimagesize($_FILES["image"]["tmp_name"][$i]);



			if (file_exists($targetPath)) {
			   // echo "<span style='color:red;'> file already exists</span> ";

			}

				  if($check !== false) {
				   // echo "File is an image - " . $check["mime"] . ".";
					$uploadOk = 1;
				} else {
					echo "<span style='color:red;'>File is not an image.</span><br>";
					$uploadOk = 0;
				}


			if($imageFileType == "jpg" || $imageFileType == "png" || $imageFileType == "jpeg"
			||  $imageFileType =="gif" ) {



			if(move_uploaded_file($sourcePath,$targetPath)) 
			//if(1) 
			{

				$image_destination = $upload_dir."rxn-".$imageName;
				$compress_images = compressImage($source_image, $image_destination);

				$emp_id=$_SESSION['emp_id'];

				//$sql="insert into image(p_id,img_path) values('$pId','$compress_images')";
				
				$sql="INSERT INTO employee_insert 
	(name, department, mobile, email, gender, description, image, salary, status) VALUES 
	('".$name."', '".$department."', '".$mobile."', '".$email."', '".$gender."', '".$description."', '".$compress_images."', '".$salary."', '".$status."')";


				
				
				$result = mysql_query($sql);
				echo "
				<div class='col-sm-3' id='randomdiv' style='padding-bottom: 15px;'>  
				<div class='bg_prcs uk-height-small uk-flex uk-flex-center uk-flex-middle   uk-background-cover uk-light   uk-card-default uk-card-hover imgt'   data-src='$image_destination' uk-img>
				 </div>
				</div>


				";  


			}

			}
			else{ echo "<span style='color:red;'> only JPG, JPEG, PNG & GIF files are allowed.</span>";
				 }






			}

	}

	}

	// created compressed JPEG file from source file
	function compressImage($source_image, $compress_image) {
	$image_info = getimagesize($source_image);
	if ($image_info['mime'] == 'image/jpeg') {
	$source_image = imagecreatefromjpeg($source_image);
	imagejpeg($source_image, $compress_image, 75);
	} elseif ($image_info['mime'] == 'image/gif') {
	$source_image = imagecreatefromgif($source_image);
	imagegif($source_image, $compress_image, 75);
	} elseif ($image_info['mime'] == 'image/png') {
	$source_image = imagecreatefrompng($source_image);
	imagepng($source_image, $compress_image, 6);
	}
	return $compress_image;
	}


	?>