<?php 
	include('config.php');
 	$id = $_POST['val']; 

	$sqlArt = "SELECT * FROM artists WHERE id_artists = ".$id."";
	$resultArt = mysqli_query($connection, $sqlArt);
	$rowArt = mysqli_fetch_assoc($resultArt);
?>
<li><figure style="width: 40%;margin-left: 30%;" class="image-php"><img style="width: 100%;" src="artistsImg/<?php echo $rowArt['img_url'] ?>"></figure></li>
<li><span>Title: </span> <?php echo $rowArt['name'] ?></li>
<li><span>Description: </span> <?php echo $rowArt['summary'] ?></li>
<li><span>Img file: </span><?php echo $rowArt['img_url'] ?></li>
