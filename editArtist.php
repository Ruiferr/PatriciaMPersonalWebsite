<?php 
	include('config.php');
 	$id = $_POST['val']; 

	$sqlArtist = "SELECT * FROM artists WHERE id_artists = ".$id."";
	$result = mysqli_query($connection, $sqlArtist);
	$row = mysqli_fetch_assoc($result);
?>

	<li>
		<label for="name">Title: </label>
		<input type="text" name="name" id="name" value="<?php echo $row['name'] ?>" required></input>
	</li>				
	<li>
		<label for="description">Description: </label>
		<textarea name="description" id="description" required><?php echo $row['summary'] ?></textarea>
	</li>				
	<li>
		<label for="file">Img file: </label><br><br>
		<input type="file" name="file" id="file">
	</li>
	

