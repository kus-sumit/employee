<?php
 
	include ('connection.php');
	include ('upload.php');
	
	?>
	
	
<script src="form_submit.js"></script>	


<form method="post" name="upload_form" id="upload_form" enctype="multipart/form-data" action="upload.php">
<label>Choose Multiple Images to Upload</label>
<br>
<br>
<input type="file" name="upload_images[]" id="image_file" multiple >
<input type="submit" value="Upload" name="upload" />
<div class="file_uploading hidden">
<label> </label>
<img src="uploading.gif" alt="Uploading......"/>
</div>
</form>
<div id="uploaded_images_preview"></div>