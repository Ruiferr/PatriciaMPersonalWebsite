<?php 
include('config.php');


if( isset($_FILES['video_file']) == 1 ){

	$img_file = $_FILES['video_file'];

	$filename = $_FILES['video_file']['name'];
	$fileTmpName = $_FILES['video_file']['tmp_name'];
	$fileSize = $_FILES['video_file']['size'];
	$fileError = $_FILES['video_file']['error'];
	$fileType = $_FILES['video_file']['type'];

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

				$name = $_POST['videoName'];
				$id_project = $_POST['select_project_video'];


				// UPLOAD VIDEO
				$sqlUploadVideo = "INSERT INTO video (name, video_url) VALUES('".$name."', '".$fileNameNew."')";
				mysqli_query($connection, $sqlUploadVideo);

				// GET THE UPLOADED VIDEO ID 
				$sqlNewVideoID = "SELECT * FROM video ORDER BY id_video DESC LIMIT 1";
				$result = mysqli_query($connection, $sqlNewVideoID);
				$row = mysqli_fetch_assoc($result);
				$id_video = $row['id_video'];

				// ATTATCH VIDEO TO A PROJECT
				$sqlAttachVideo = "INSERT INTO projects_has_video (fk_id_projects, fk_id_video) VALUES ('".$id_project."', '".$id_video."')";

				mysqli_query($connection, $sqlAttachVideo);

				echo '<span class="success">&#x2713; File upload success!</span>';	

			}else{
				echo '<span class="warning">&#x2718; Error: file is too big! Max size: 50MB</span>';

			}
		}else{
			echo '<span class="warning">&#x2718; Error: unexpected error occurred uploading your file!</span>';	
		}
	}else{
		echo '<span class="warning">&#x2718; Error: cannot upload files of this type!<br> Format allowed: mp4</span>';
	}


}else{
		echo '<span class="warning">&#x2718; Error: something went wrong with the upload.</span>';

}

?>








