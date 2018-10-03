<?php 
include('config.php');

$id_video = $_POST['val'];

if ($id_video == '') {
	echo '<span class="warning">&#9888; video not found!</span>';
	return;
}


// DELETE ALL VIDEO IN PROJECT_HAS_MUSIC
$sqlDeleteHasVideo = "DELETE FROM projects_has_video WHERE fk_id_video = ".$id_video."";
mysqli_query($connection, $sqlDeleteHasVideo);


//  DELETE FILE FROM FOLDER
$sqlVideo = "SELECT * FROM video WHERE id_video = ".$id_video."";
$result = mysqli_query($connection, $sqlVideo);
$row = mysqli_fetch_assoc($result);

$deletePath = 'video/'.$row['video_url'];
if(file_exists($deletePath)){
	unlink($deletePath);
}else{
	echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
}

// DELETE VIDEO
$sqlDeleteVideo = "DELETE FROM video WHERE id_video = ".$id_video."";
mysqli_query($connection, $sqlDeleteVideo);


echo '<br><span class="success">&#x2713; Video deleted successfully!</span>';




?>