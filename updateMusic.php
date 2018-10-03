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

	$allowed = array('mp3');

	if (in_array($fileActualExt, $allowed )) {
		if ($fileError === 0) {
			if ($fileSize < 12000000) {
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				$fileDestination = 'audio/'.$fileNameNew;
				chmod($fileTmpName, 0755);
				move_uploaded_file($fileTmpName, $fileDestination);	

				$id_music = $_POST['id_music'];
				$title = $_POST['musicName'];



				// GET ALREADY EXISTENT MUSIC
				$sqlProjectMusic = "SELECT music_url FROM music WHERE id_music = ".$id_music."";
				$resultMusic = mysqli_query($connection, $sqlProjectMusic);
				$rowMusic = mysqli_fetch_assoc($resultMusic);

				//delete the file
				$deletePath = 'audio/'.$rowMusic['music_url'];
				if(file_exists($deletePath)){
					unlink($deletePath);
				}else{
					echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
				}


				// UPDATE MUSIC

				$sqlUpdateMusic = "UPDATE music SET name = '".$title."', music_url = '".$fileNameNew."' WHERE music.id_music = '".$id_music."'";
			
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

				$id_music = $_POST['id_music'];
				$title = $_POST['musicName'];

				// UPDATE MUSIC

				$sqlUpdateMusic = "UPDATE music SET name = '".$title."' WHERE music.id_music = '".$id_music."'";

				mysqli_query($connection, $sqlUpdateMusic);

				echo '<span class="success">&#x2713; Update successfull!</span>';
	
}else{
		echo '<span class="warning">&#x2718; Error: something went wrong with the upload.</span>';

}

?>