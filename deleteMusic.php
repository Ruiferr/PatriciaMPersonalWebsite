<?php 
include('config.php');

$id_music = $_POST['val'];

if ($id_music == '') {
	echo '<span class="warning">&#9888; music not found!</span>';
	return;
}


// DELETE ALL MUSICS IN PROJECT_HAS_MUSIC
$sqlDeleteHasMusic  = "DELETE FROM projects_has_music WHERE fk_id_music = ".$id_music."";
mysqli_query($connection, $sqlDeleteHasMusic);


//  DELETE FILE FROM FOLDER
$sqlMusic = "SELECT * FROM music WHERE id_music = ".$id_music."";
$result = mysqli_query($connection, $sqlMusic);
$row = mysqli_fetch_assoc($result);

$deletePath = 'audio/'.$row['music_url'];
if(file_exists($deletePath)){
	unlink($deletePath);
}else{
	echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
}

// DELETE MUSIC
$sqlDeleteProject = "DELETE FROM music WHERE id_music = ".$id_music."";
mysqli_query($connection, $sqlDeleteProject);


echo '<br><span class="success">&#x2713; Music deleted successfully!</span>';




?>