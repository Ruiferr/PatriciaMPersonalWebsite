<?php 
	include('config.php');
 	$id = $_POST['val']; 

	$sqlVideos = "SELECT * FROM video WHERE id_video = ".$id."";
	$result = mysqli_query($connection, $sqlVideos);
	$row = mysqli_fetch_assoc($result);
?>

	<li>
		<label for="videoName">Name: </label>
		<input type="text" name="videoName" id="videoName" value="<?php echo $row['name'] ?>" required></input>
	</li>								
	<li>
		<label for="file">Video file: </label><br><br>
		<input type="file" name="file" id="file">
	</li>
