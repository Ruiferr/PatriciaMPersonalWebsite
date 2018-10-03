<?php
	include('config.php');
	$tracks = array();
	$i = 0;

	$sqlPlayerCol = "SELECT * FROM music INNER JOIN projects_has_music ON id_music = fk_id_music INNER JOIN projects WHERE id_project = fk_id_projects";
	$result = mysqli_query($connection, $sqlPlayerCol);

	while ($row = mysqli_fetch_assoc($result)) {
		$i++;
		if ($row['has_album'] == 'yes') {$main = 'main';}else{$main = 'port';}
		$musicFileNoExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $row['music_url']);
		$imgFileNoExt  = preg_replace('/\\.[^.\\s]{3,4}$/', '', $row['img_url']);

		$obj = new stdClass();
		$obj = (object) array(
					'track' => $i,
					'name' => $row['name'],
					'hasAlbum' => $row['has_album'],
					'imageCode' => $imgFileNoExt,
					'imageFullCode' => $row['img_url'],
					'albumName' => $row['title'],
					'type' => $main,
					'file' => $musicFileNoExt);

		array_push($tracks, $obj);
	}


	$json = json_encode($tracks);
	//echo '<pre>' . var_export($tracks, true) . '</pre>';
	echo $json;
?>
