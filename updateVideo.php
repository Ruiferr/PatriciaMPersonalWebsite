<?php 
include('config.php');


if((isset($_FILES['file']) && $_FILES['file']['size'] > 0) == true){

	$mus_file = $_FILES['file'];

	$filename = $_FILES['file']['name'];
	$fileTmpName = $_FILES['file']['tmp_name'];
	$fileSize = $_FILES['file']['size'];
	$fileError = $_FILES['file']['error'];
	$fileType = $_FILES['file']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('mp4');

	if (in_array($fileActualExt, $allowed )) {
		if ($fileError === 0) {
			if ($fileSize < 50000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'video/'.$fileNameNew;
				chmod($fileTmpName, 0755);
				move_uploaded_file($fileTmpName, $fileDestination);	

				$id_video = $_POST['id_video'];
				$title = $_POST['videoName'];



				// GET ALREADY EXISTENT MUSIC
				$sqlProjectVideo = "SELECT video_url FROM video WHERE id_video = ".$id_video."";
				$resultVideo = mysqli_query($connection, $sqlProjectVideo);
				$rowVideo = mysqli_fetch_assoc($resultVideo);

				//delete the file
				$deletePath = 'video/'.$rowVideo['video_url'];
				if(file_exists($deletePath)){
					unlink($deletePath);
				}else{
					echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
				}


				// UPDATE MUSIC

				$sqlUpdateMusic = "UPDATE video SET name = '".$title."', video_url = '".$fileNameNew."' WHERE video.id_video = '".$id_video."'";
			
				mysqli_query($connection, $sqlUpdateMusic);


				echo '<span class="success">&#x2713; File upload success!</span>';

			}else{
				echo '<span class="warning">&#x2718; Error: file is too big! Max size: 12MB</span>';	
			}
		}else{
			echo '<span class="warning">&#x2718; Error: unexpected error occurred uploading your file!</span>';	
		}
	}else{
		echo '<span class="warning">&#x2718; Error: cannot upload files of this type!</span>';
	}


}else if ((isset($_FILES['file']) && $_FILES['file']['size'] > 0) == false) {

				$id_video = $_POST['id_video'];
				$title = $_POST['videoName'];

				// UPDATE MUSIC

				$sqlUpdateVideo = "UPDATE video SET name = '".$title."' WHERE video.id_video = '".$id_video."'";

				mysqli_query($connection, $sqlUpdateVideo);

				echo '<span class="success">&#x2713; Update successfull!</span>';
	
}else{
		echo '<span class="warning">&#x2718; Error: something went wrong with the upload.</span>';

}

?>