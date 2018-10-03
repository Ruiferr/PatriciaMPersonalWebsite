<?php 
include('config.php');

$id_artist = $_POST['val'];

if ($id_artist == '') {
	echo '<span class="warning">&#9888; artist not found!</span>';
	return;
}


//  DELETE FILE FROM FOLDER
$sqlArtist = "SELECT * FROM artists WHERE id_artists = ".$id_artist."";
$result = mysqli_query($connection, $sqlArtist);
$row = mysqli_fetch_assoc($result);

$deletePath = 'artistsImg/'.$row['img_url'];
if(file_exists($deletePath)){
	unlink($deletePath);
}else{
	echo '<span class="unresolved">Info: could not delete already existing files.</span><br>';
}

// DELETE ARTIST
$sqlDeleteArtist = "DELETE FROM artists WHERE id_artists = ".$id_artist."";
mysqli_query($connection, $sqlDeleteArtist);


echo '<br><span class="success">&#x2713; Artist deleted successfully!</span>';




?>