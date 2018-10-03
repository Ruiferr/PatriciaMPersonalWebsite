<?php 
	include('config.php');
 	$id = $_POST['val']; 

	$sqlProjects = "SELECT * FROM video WHERE id_video = ".$id."";
	$result = mysqli_query($connection, $sqlProjects);
	$row = mysqli_fetch_assoc($result);
?>
<li><div style="width: 80%;margin-left: 10%;" class="image-php"><video id="video" width="100%" controls controlsList="nodownload"><source src="video/<?php echo $row['video_url'] ?>"" type="video/mp4"></video></div></li>
<li><span>Title: </span> <?php echo $row['name'] ?></li>
<li><span>Video file: </span><?php echo $row['video_url'] ?></li>