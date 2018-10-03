<?php 
include('config.php');


if( isset($_FILES['file']) == 1 ){

	$img_file = $_FILES['file'];

	$filename = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualExt, $allowed )) {
		if ($fileError === 0) {
			if ($fileSize < 3000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'audioImg/'.$fileNameNew;
				chmod($fileTmpName, 0755);
				move_uploaded_file($fileTmpName, $fileDestination);	

				$title = $_POST['title'];
				$description = $_POST['description'];
				$type = $_POST['file_type'];
				$player = $_POST['player'];

				// UPLOAD PROJECT

				$sqlUploadProject = "INSERT INTO projects(title, summary, img_url, has_album, music_or_post) VALUES('".$title."', '".$description."', '".$fileNameNew."', '".$player."', '".$type."')";

				mysqli_query($connection, $sqlUploadProject);

				echo '<span class="success">&#x2713; File upload success!</span>';

			}else{
				echo '<span class="warning">&#x2718; Error: file is too big! Max size: 3MB</span>';	
			}
		}else{
			echo '<span class="warning">&#x2718; Error: unexpected error occurred uploading your file!</span>';	
		}
	}else{
		echo '<span class="warning">&#x2718; Error: cannot upload files of this type!</span>';
	}


}else{
		echo '<span class="warning">&#x2718; Error: something went wrong with the upload.</span>';

}

?>












