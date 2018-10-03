<?php 
include('config.php');


if( isset($_FILES['img_file']) == 1 ){

	$img_file = $_FILES['img_file'];

	$filename = $_FILES['img_file']['name'];
	$fileTmpName = $_FILES['img_file']['tmp_name'];
	$fileSize = $_FILES['img_file']['size'];
	$fileError = $_FILES['img_file']['error'];
	$fileType = $_FILES['img_file']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');

	if (in_array($fileActualExt, $allowed )) {
		if ($fileError === 0) {
			if ($fileSize < 3000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'artistsImg/'.$fileNameNew;
				chmod($fileTmpName, 0755);
				move_uploaded_file($fileTmpName, $fileDestination);	

				$name = $_POST['artistName'];
				$description = $_POST['description'];

				// UPLOAD ARTIST

				$sqlUploadArtist = "INSERT INTO artists (name, summary, img_url) VALUES ('".$name."', '".$description."', '".$fileNameNew."')";

				mysqli_query($connection, $sqlUploadArtist);

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
