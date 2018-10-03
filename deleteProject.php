<?php 
include('config.php');

$id_project = $_POST['val'];

if ($id_project == '') {
	echo '<span class="warning">&#9888; project not found!</span>';
	return;
}

// Check if project has musics or videos
$sqlProjects = "SELECT * FROM projects WHERE id_project = ".$id_project."";
$resultPro = mysqli_query($connection, $sqlProjects);
$rowP = mysqli_fetch_assoc($resultPro);




if ($rowP['music_or_post'] == 1) {//music

	// SELECT ALL PROJECT_HAS_MUSIC AND GET THE MUSIC ID's
	$sqlSelectHasMusic = "SELECT * FROM projects_has_music WHERE fk_id_projects = ".$id_project."";
	$result = mysqli_query($connection, $sqlSelectHasMusic);


	// DELETE ALL PROJECT_HAS_MUSIC
	$sqlDeleteHasMusic  = "DELETE FROM projects_has_music WHERE fk_id_projects = ".$id_project."";
	mysqli_query($connection, $sqlDeleteHasMusic);


	while ($row = mysqli_fetch_assoc($result)) {

		//CHECK THE DELETED FILES 
		$sqlMusics = "SELECT * FROM music WHERE id_music = ".$row['fk_id_music']."";
		$resultMus = mysqli_query($connection, $sqlMusics);
		$rowMus = mysqli_fetch_assoc($resultMus);

		// DELETE MUSIC FILE FROM FOLDER
		$deletePath = 'audio/'.$rowMus['music_url'];
		if(file_exists($deletePath)){
			unlink($deletePath);
		}else{
			echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
		}

		echo '<span class="unresolved">music file deleted: '.$rowMus['name'].'</span><br>';

		// DELETE MUSICS IN THE PROJECT
		$sqlDeleteMusic  = "DELETE FROM music WHERE id_music = ".$row['fk_id_music']."";
		mysqli_query($connection, $sqlDeleteMusic);

	}


	// DELETE IMG FILE FROM FOLDER
	$deletePath = 'audioImg/'.$rowP['img_url'];
	if(file_exists($deletePath)){
		unlink($deletePath);
	}else{
		echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
	}

	// DELETE PROJECT
	$sqlDeleteProject = "DELETE FROM projects WHERE id_project = ".$id_project."";
	mysqli_query($connection, $sqlDeleteProject);


	echo '<br><span class="success">&#x2713; Project deleted successfully!</span>';

}else if ($rowP['music_or_post'] == 2) {//post


	// SELECT ALL PROJECT_HAS_POST AND GET THE VIDEO ID's
	$sqlSelectHasVideo = "SELECT * FROM projects_has_video WHERE fk_id_projects = ".$id_project."";
	$result = mysqli_query($connection, $sqlSelectHasVideo);

	// DELETE ALL PROJECT_HAS_VIDEO
	$sqlDeleteHasVideo  = "DELETE FROM projects_has_video WHERE fk_id_projects = ".$id_project."";
	mysqli_query($connection, $sqlDeleteHasVideo);


	while ($row = mysqli_fetch_assoc($result)) {

		//CHECK THE DELETED FILES 
		$sqlVideo = "SELECT * FROM video WHERE id_video = ".$row['fk_id_video']."";
		$resultVid = mysqli_query($connection, $sqlVideo);
		$rowVid = mysqli_fetch_assoc($resultVid);

		// DELETE VIDEO FILE FROM FOLDER
		$deletePath = 'video/'.$rowVid['video_url'];
		if(file_exists($deletePath)){
			unlink($deletePath);
		}else{
			echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
		}

		echo '<span class="unresolved">video file deleted: '.$rowVid['name'].'</span><br>';

		// DELETE VIDEOS IN THE PROJECT
		$sqlDeleteVideo  = "DELETE FROM video WHERE id_video = ".$row['fk_id_video']."";
		mysqli_query($connection, $sqlDeleteVideo);

	}


	// DELETE IMG FILE FROM FOLDER
	$deletePath = 'audioImg/'.$rowP['img_url'];
	if(file_exists($deletePath)){
		unlink($deletePath);
	}else{
		echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
	}

	// DELETE PROJECT
	$sqlDeleteProject = "DELETE FROM projects WHERE id_project = ".$id_project."";
	mysqli_query($connection, $sqlDeleteProject);

	echo '<span class="success">&#x2713; File deleted successfully!</span>';

	
}else{

	// DELETE IMG FILE FROM FOLDER
	$deletePath = 'audioImg/'.$rowP['img_url'];
	if(file_exists($deletePath)){
		unlink($deletePath);
	}else{
		echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
	}

	// DELETE PROJECT
	$sqlDeleteProject = "DELETE FROM projects WHERE id_project = ".$id_project."";
	mysqli_query($connection, $sqlDeleteProject);
}



?>