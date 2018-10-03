<?php 
	include('config.php');
 	$id = $_POST['val']; 

	$sqlProjects = "SELECT * FROM projects WHERE id_project = ".$id."";
	$result = mysqli_query($connection, $sqlProjects);
	$row = mysqli_fetch_assoc($result);
?>
<li><span>Title: </span> <?php echo $row['title'] ?></li>
<li><span>Description: </span><?php echo $row['summary'] ?></li>
<li><span>Img_url: </span><?php echo $row['img_url'] ?></li>
<li><span>On Player: </span><?php echo $row['has_album'] ?></li>
<li><span>Music/Post: </span><?php if($row['music_or_post'] == 1){ echo 'Music';}else{ echo 'Post Production';}; ?></li>