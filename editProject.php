<?php 
	include('config.php');
 	$id = $_POST['val']; 

	$sqlProjects = "SELECT * FROM projects WHERE id_project = ".$id."";
	$result = mysqli_query($connection, $sqlProjects);
	$row = mysqli_fetch_assoc($result);
?>

	<li>
		<label for="name">Title: </label>
		<input type="text" name="title" id="title" value="<?php echo $row['title'] ?>" required></input>
	</li>				
	<li>
		<label for="description">Description: </label>
		<textarea name="description" id="description" required><?php echo $row['summary'] ?></textarea>
	</li>				
	<li>
		<label for="file">Image file: </label><br><br>
		<input type="file" name="file" id="file">
	</li>
	<li>
		<label for="player" style="vertical-align: 4px;">Player album: </label>
		<label class="switch">
		<input type="checkbox" name="player" <?php if ($row['has_album'] == 'yes'){echo 'checked="checked"';} ?>">
		<span class="slider secondSlider"></span>
		</label>
	</li>	
<?php 		

	$sqlCheckProject = "	SELECT * FROM projects INNER JOIN projects_has_music ON id_project = fk_id_projects WHERE id_project = ".$id." GROUP BY id_project";
	$res = mysqli_query($connection, $sqlCheckProject);

if (mysqli_num_rows($res) == 0) { 
?>	
	<li>
		<label for="file_type">Type: </label>
		<select name="file_type" id="file_type">
			<option value="">Select type</option>
			<option value="1" <?php if ($row['music_or_post'] == 1){echo 'selected="selected"';} ?>">Music</option>
			<option value="2" <?php if ($row['music_or_post'] == 2){echo 'selected="selected"';} ?>>Post Production</option>
		</select>
	</li>
<?php } ?>

