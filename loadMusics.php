<?php 
	include('config.php');
 	$id = $_POST['val']; 

	$sqlMus = "SELECT * FROM music WHERE id_music = ".$id."";
	$resultMus = mysqli_query($connection, $sqlMus);
	$rowMus = mysqli_fetch_assoc($resultMus);
?>
<li><audio style="width: 100%;background: #f1f3f4;" controls controlsList="nodownload"><source src="audio/<?php echo $rowMus['music_url'] ?>" type="audio/ogg"></audio>
<li><span>Title: </span> <?php echo $rowMus['name'] ?></li>
<li><span>Music file: </span><?php echo $rowMus['music_url'] ?></li>