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
				$fileDestination = 'audioImg/'.$fileNameNew;
				chmod($fileTmpName, 0755);
				move_uploaded_file($fileTmpName, $fileDestination);	

				$id_project = $_POST['id_project'];
				$title = $_POST['title'];
				$description = $_POST['description'];
				$player = $_POST['player'];

				if ($_POST['type_input'] == 'no') {

					// $type is already attached to musics or videos
					$sqlProjects = "SELECT * FROM projects WHERE id_project = ".$id_project."";
					$result = mysqli_query($connection, $sqlProjects);
					$row = mysqli_fetch_assoc($result);

					$type = $row['music_or_post'];
				}else{
					$type = $_POST['file_type'];
				}


				// GET ALREADY EXISTENT IMAGE
				$sqlProjectImg = "SELECT img_url FROM projects WHERE id_project = ".$id_project."";
				$resultImg = mysqli_query($connection, $sqlProjectImg);
				$rowImg = mysqli_fetch_assoc($resultImg);


				//delete the file
				$deletePath = 'audioImg/'.$rowImg['img_url'];
				if(file_exists($deletePath)){
					unlink($deletePath);
				}else{
					echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
				}


				// UPDATE PROJECT

				$sqlUpdateProject = "UPDATE projects SET title = '".$title."', summary = '".$description."', img_url = '".$fileNameNew."', has_album = '".$player."', music_or_post = '".$type."' WHERE projects.id_project = '".$id_project."'";

				mysqli_query($connection, $sqlUpdateProject);

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

				$id_project = $_POST['id_project'];
				$title = $_POST['title'];
				$description = $_POST['description'];
				$player = $_POST['player'];

				if ($_POST['type_input'] == 'no') {

					// $type is already attached to musics or videos
					$sqlProjects = "SELECT * FROM projects WHERE id_project = ".$id_project."";
					$result = mysqli_query($connection, $sqlProjects);
					$row = mysqli_fetch_assoc($result);

					$type = $row['music_or_post'];
				}else{
					$type = $_POST['file_type'];
				}

				// UPDATE PROJECT

				$sqlUpdateProject = "UPDATE projects SET title = '".$title."', summary = '".$description."', has_album = '".$player."', music_or_post = '".$type."' WHERE projects.id_project = '".$id_project."'";

				mysqli_query($connection, $sqlUpdateProject);

				echo '<span class="success">&#x2713; Update successfull!</span>';
	
}else{
		echo '<span class="warning">&#x2718; Error: something went wrong with the upload.</span>';

}

?>