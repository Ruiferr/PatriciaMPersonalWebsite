<?php 
include('config.php');


if((isset($_FILES['file']) && $_FILES['file']['size'] > 0) == true){

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
				$fileDestination = 'artistsImg/'.$fileNameNew;
				chmod($fileTmpName, 0755);
				move_uploaded_file($fileTmpName, $fileDestination);	

				$id_artist = $_POST['id_artist'];
				$title = $_POST['name'];
				$description = $_POST['description'];


				// GET ALREADY EXISTENT IMAGE
				$sqlArtistImg = "SELECT img_url FROM artists WHERE id_artists = ".$id_artist."";
				$result = mysqli_query($connection, $sqlArtistImg);
				$rowImg = mysqli_fetch_assoc($result);

				//delete the file
				$deletePath = 'artistsImg/'.$rowImg['img_url'];
				if(file_exists($deletePath)){
					unlink($deletePath);
				}else{
					echo '<span class="unresolved">Info: could not delete already existing files.</span><br><br>';
				}


				// UPDATE PROJECT

				$sqlUpdateArtist = "UPDATE artists SET name = '".$title."', summary = '".$description."', img_url = '".$fileNameNew."' WHERE artists.id_artists = '".$id_artist."'";

				mysqli_query($connection, $sqlUpdateArtist);

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


}else if ((isset($_FILES['file']) && $_FILES['file']['size'] > 0) == false) {

				$id_artist = $_POST['id_artist'];
				$title = $_POST['name'];
				$description = $_POST['description'];


				// UPDATE PROJECT

				$sqlUpdateArtist = "UPDATE artists SET name = '".$title."', summary = '".$description."' WHERE artists.id_artists = '".$id_artist."'";

				mysqli_query($connection, $sqlUpdateArtist);

				echo '<span class="success">&#x2713; Update successfull!</span>';
	
}else{
		echo '<span class="warning">&#x2718; Error: something went wrong with the upload.</span>';

}

?>