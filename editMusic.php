<?php 
	include('config.php');
 	$id = $_POST['val']; 

	$sqlMusics = "SELECT * FROM music WHERE id_music = ".$id."";
	$result = mysqli_query($connection, $sqlMusics);
	$row = mysqli_fetch_assoc($result);
?>

	<li>
		<label for="musicName">Name: </label>
		<input type="text" name="musicName" id="musicName" value="<?php echo $row['name'] ?>" required></input>
	</li>								
	<li>
		<label for="file">Music file: </label><br><br>
		<input type="file" name="file" id="file">
	</li>
