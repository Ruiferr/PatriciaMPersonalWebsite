<?php 
include('config.php');


if( isset($_FILES['music_file']) == 1 ){

	$img_file = $_FILES['music_file'];

	$filename = $_FILES['music_file']['name'];
	$fileTmpName = $_FILES['music_file']['tmp_name'];
	$fileSize = $_FILES['music_file']['size'];
	$fileError = $_FILES['music_file']['error'];
	$fileType = $_FILES['music_file']['type'];

	$fileExt = explode('.', $filename);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('mp3');

	if (in_array($fileActualExt, $allowed )) {
		if ($fileError === 0) {
			if ($fileSize < 12000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'audio/'.$fileNameNew;
				chmod($fileTmpName, 0755);
				move_uploaded_file($fileTmpName, $fileDestination);	

				$name = $_POST['musicName'];
				$id_project = $_POST['select_project_music'];


				// UPLOAD MUSIC
				$sqlUploadMusic = "INSERT INTO music (name, music_url) VALUES('".$name."', '".$fileNameNew."')";
				mysqli_query($connection, $sqlUploadMusic);

				// GET THE UPLOADED MUSIC ID 
				$sqlNewMusicID = "SELECT * FROM music ORDER BY id_music DESC LIMIT 1";
				$result = mysqli_query($connection, $sqlNewMusicID);
				$row = mysqli_fetch_assoc($result);
				$id_music = $row['id_music'];

				// ATTATCH MUSIC TO A PROJECT
				$sqlAttachMusic = "INSERT INTO projects_has_music (fk_id_projects, fk_id_music) VALUES ('".$id_project."', '".$id_music."')";

				mysqli_query($connection, $sqlAttachMusic);

				echo '<span class="success">&#x2713; File upload success!</span>';

			}else{
				echo '<span class="warning">&#x2718; Error: file is too big! Max size: 12MB</span>';

			}
		}else{
			echo '<span class="warning">&#x2718; Error: unexpected error occurred uploading your file!</span>';	
		}
	}else{
		echo '<span class="warning">&#x2718; Error: cannot upload files of this type!<br> Format allowed: mp3</span>';
	}


}else{
		echo '<span class="warning">&#x2718; Error: something went wrong with the upload.</span>';

}

?>