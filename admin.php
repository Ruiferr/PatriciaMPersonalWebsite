<?php
	include('config.php');
	session_start();

	if (!isset($_SESSION['user_name'])) {
	   	header("Location:login-back-office.php");
	}
	 
	//Expire the session if user is inactive for 30
	//minutes or more.
	$expireAfter = 30; 

	if(isset($_SESSION['last_action'])){

	    //Figure out how many seconds have passed
	    //since the user was last active.
	    $secondsInactive = time() - $_SESSION['last_action'];
	    
	    //Convert our minutes to seconds.
	    $expireAfterSeconds = $expireAfter * 60;
	    
	    if($secondsInactive >= $expireAfterSeconds){
	        //User has been inactive for too long.
	        //Kill session.
	        session_unset();
	        session_destroy();
	        header("Location:login-back-office.php");
	    }
	}
	 
	//latest activity
	$_SESSION['last_action'] = time();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<link rel="icon" href="img/admin.png">
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/bckadm.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
</head>
<body>
	<div class="tab">
		  <button class="tablinks active" onclick="tab(event, 'Home')">Home</button>
		  <button class="tablinks" onclick="tab(event, 'Upload')">Upload</button>
		  <button class="tablinks" onclick="tab(event, 'Edit')">Manage</button>
		  <div class="session_timer"><p style="float: left;">session:  </p> <div id="time" style="text-align: center; float:left;font-family: Andale Mono;"> </div></div>
	</div>
	<div class="login-bar">
		<div class="login-info">
			<p><span>user:</span> <?php echo $_SESSION['user_name'] ?></p>
			<a href="logout.php">Logout</a>
		</div>
	</div>
	<div class="wrapper">
		<div id="Home" class="tabcontent tabhome">
			  <h3>Home</h3>
			  <div class="home_main">
			  	<div>Welcome <span style="color: #4c83b5;font-weight: bold;"><?php echo $_SESSION['user_name'] ?><span></div><br>
			  	<div class="dayDate"><p id="dayDate"></p></div><br><br>
			  	<div class="sessionLog">
			  		<h4>Last sessions:</h4><br>
			  		<?php 
			  			$sqlSessions = "SELECT * FROM `sessions` ORDER BY id_sessions DESC LIMIT 5";
						$sessionResult = mysqli_query($connection, $sqlSessions);

						while ($row = mysqli_fetch_assoc($sessionResult)) {

			  		?>
			  		<p><?php echo '#'.$row['id_sessions'].'  '.$row['date_session'] ?></p><br>
			  		<?php } ?>
			  	</div><br><br>
			  </div>
			  <div class="notes">
			  	<button>Help</button>
			  	<div class="helpNotes">
			  		<h4>Uploading Files:</h4><br><br>
			  		<p class="help_section">Project:</p><br>
				  	<p>
				  	<span>Title:</span><br>Título do projecto<br><br>
				  	<span>Description:</span><br>  Descrição do projecto<br><br>
				  	<span>Image file::</span><br> Carregar o ficheiro de imagem. (ex: ficheiro.jpeg)<br>
				  	image ratio: 1:1 (ex: 300x300 px)<br><br>
				  	<span>Player album:</span><br>  Predefinido como 'off'. Definir 'on' para aparecer na barra lateral direita do site.<br><br>
				  	<span>Type:</span><br>  Define o tipo de projecto. 'Music' ou 'Post production'<br><br>
				  	</p><br>
				  	<p class="help_section">Music:</p><br>
				  	<p>
				  	As músicas estão sempre agregadas a projectos de 'Music' e portanto o primeiro parâmetro de 'upload' será selecionar o projecto.<br><br>
				  	<span>Title:</span><br>Nome da música<br><br>
				  	<span>Music file:</span><br> Carregar o ficheiro de audio. (ex: filename.mp3)<br><br>
				  	</p><br>
				  	<p class="help_section">Vídeo:</p><br>
				  	<p>
				  	Os vídeos estão sempre agregadas a projectos de 'Post production' e portanto o primeiro parâmetro de 'upload' será selecionar o projecto.<br><br>
				  	<span>Title:</span><br>Nome do vídeo<br><br>
				  	<span>Video file:</span><br> Carregar o ficheiro de vídeo. (ex: filename.mp4)<br><br>
				  	</p><br>
				  	<p class="help_section">Artists:</p><br>
				  	<p>
				  	<span>Title:</span><br>Nome do artista<br><br>
				  	<span>Description:</span><br>Descrição do artista<br><br>
				  	<span>Image file::</span><br> Carregar o ficheiro de imagem. (ex: ficheiro.jpg)<br>
				  	image ratio: 1:1 (ex: 300x300 px)<br><br>
			  		<h4 style="color: #b94b59;">Editing/Deleting Files:</h4><br><br>
				  	<p class="help_section">Projects/Music/Videos/Artists:</p><br>
				  	<p>
				  	<span>Select ...:</span><br>Selecionar o projecto, musica, video ou artista<br>
				  	<br>Depois de selecionar o projecto, musica, video ou artista toda a informação vai ser processada e exibida na secção abaixo. Duas opções estão disponíveis 'Edit' ou 'Delete'. Na opção 'Edit' uma nova secção irá aparecer, possibilitando a edição do projecto. Os campos editados irão substituir os parâmetros já existentes após a confirmação. Na opção 'Delete' o projecto ou ficheiro será elimindo incluindo as musicas ou vídeos do mesmo.<br><br><br>
				  	</p>
			  	</div>
			  </div>
		</div>



		<!--               UPLOAD PROJECTS                   -->




		<div id="Upload" class="tabcontent">
			  	<h3>Upload New Files</h3>
			  	<div class="tab secondTab">
			  		<button class="secondtablinks active" onclick="secondTab(event, 'upload_Project')">Project</button>
		  			<button class="secondtablinks" onclick="secondTab(event, 'upload_Music')">Music</button>
		  			<button class="secondtablinks" onclick="secondTab(event, 'upload_Video')">Video</button>
		  			<button class="secondtablinks" onclick="secondTab(event, 'upload_Artist')">Artist</button>
			  	</div>
			  	<div id="upload_Project" class="uploadContent updateP">
				  	<form id="upload_project_form" method="post" enctype="multipart/form-data">
					  	<fieldset id="projectSection">
					  			<p>Project File:</p>
								<ul>
									<li>
										<label for="name">Title: </label>
										<input type="text" name="title" id="title" required>
									</li>				
									<li>
										<label for="description">Description: </label>
										<textarea name="description" id="description" required></textarea>
									</li>				
									<li>
										<label for="file">Image file: </label><br><br>
										<input type="file" name="file" id="file" required>
									</li>
									<li>
										<label style="vertical-align: 4px;">Player album: </label>
										<label for="player_option" class="switch">
										  <input type="checkbox" name="player_option"  id="player_option" >
										  <span class="slider"></span>
										</label>
									</li>				
									<li>
										<label for="file_type">Type: </label>
										<select name="file_type" id="file_type" required>
										  <option value="">Select type</option>
										  <option value="1">Music</option>
										  <option value="2">Post Production</option>
										</select>
									</li>
									<li class="status_upload"></li>
								</ul>
						</fieldset>
						<button type="submit" name="submit" class="upload_button" id="upload_project_button">Upload</button>
					</form>
				</div>
			  	<div id="upload_Music" class="uploadContent">
				  	<form id="upload_music_form" method="post" enctype="multipart/form-data">
						<fieldset id="musicSection">
							<p>Music File:</p>
							<ul class="reloadUploadMusic">
								<li>
									<label for="select_project_music">Project: </label>
										<select name="select_project_music" id="select_project_music" required>
										<option value="">Select project</option>
							<?php 
									$sqlProjects = "SELECT * FROM projects WHERE music_or_post = 1 OR music_or_post = 0";
									$result = mysqli_query($connection, $sqlProjects);

									while ($row = mysqli_fetch_assoc($result)) {	
							?>
										<option value="<?php echo $row['id_project'] ?>"><?php echo $row['title'] ?></option>
							<?php };?>
									</select>
								</li>
							</ul>
							<ul>
								<li>
									<label for="musicName">Name: </label>
									<input type="text" name="musicName" id="musicName" required>
								</li>	
								<li>
									<label for="music_file">Music file: </label><br><br>
									<input type="file" name="music_file" id="music_file" required>
								</li>
								<li class="status_upload"></li>	
							</ul>	
						</fieldset>
						<button type="submit" class="upload_button">Upload</button>
					</form>
				</div>
			  	<div id="upload_Video" class="uploadContent">
				  	<form id="upload_video_form" method="post" enctype="multipart/form-data">
						<fieldset id="movieSection">
							<p>Video File:</p>
							<ul class="reloadUploadVideo">
								<li>
									<label for="select_project_video">Project: </label>
										<select name="select_project_video" id="select_project_video" required>
										<option value="">Select project</option>
										<?php 
												$sqlProjects = "SELECT * FROM projects WHERE music_or_post = 2 OR music_or_post = 0";
												$result = mysqli_query($connection, $sqlProjects);

												while ($row = mysqli_fetch_assoc($result)) {	
										?>
										<option value="<?php echo $row['id_project'] ?>"><?php echo $row['title'] ?></option>
										<?php };?>
									</select>
								</li>
							</ul>
							<ul>
								<li>
									<label for="videoName">Name: </label>
									<input type="text" name="videoName" id="videoName" required>
								</li>	
								<li>
									<label for="video_file">Video file: </label><br><br>
									<input type="file" name="video_file" id="video_file" required>
								</li>
								<li class="status_upload"></li>	
							</ul>	
						</fieldset>
						<button type="submit" class="upload_button">Upload</button>
					</form>
				</div>
				<div id="upload_Artist" class="uploadContent">
				  	<form id="upload_artist_form" method="post" enctype="multipart/form-data">
						<fieldset id="artistSection">
							<p>New Artist:</p>
							<ul>
								<li>
									<label for="artistName">Name: </label>
									<input type="text" name="artistName" id="artistName" required>
								</li>
								<li>
									<label for="description">Description: </label>
									<textarea name="description" id="description" required></textarea>
								</li>		
								<li>
									<label for="img_file">Image file: </label><br><br>
									<input type="file" name="img_file" id="img_file" required>
								</li>	
								<li class="status_upload"></li>
							</ul>		
						</fieldset>
						<button type="submit" class="upload_button">Upload</button>
					</form>
				</div>
		</div>


		<!--               MANAGE PROJECTS                   -->



		<div id="Edit" class="tabcontent">
			  	<h3>Edit/Delete Files</h3>
			  	<div class="tab thirdTab">
			  		<button class="thirdtablinks active" onclick="thirdTab(event, 'edit_Project')">Project</button>
		  			<button class="thirdtablinks" onclick="thirdTab(event, 'edit_Music')">Music</button>
		  			<button class="thirdtablinks" onclick="thirdTab(event, 'edit_Video')">Video</button>		  			
		  			<button class="thirdtablinks" onclick="thirdTab(event, 'edit_Artist')">Artist</button>
			  	</div>
			  	<div class="reload">
			  	<div id="edit_Project" class="editContent editP">
				  	<form id="updateProject" action="update.php" method="post">
					  	<fieldset id="projectSection">
					  			<p>Project File:</p>
								<ul class="reloadEditProject">
									<li>
										<label for="project_options">Select project: </label>
											<select class="selector" name="project_options" id="project_options" required>
											<option value="">Select project</option>
											<?php 
													$sqlProjects = "SELECT * FROM projects";
													$result = mysqli_query($connection, $sqlProjects);

													while ($row = mysqli_fetch_assoc($result)) {	
											?>
											<option value="<?php echo $row['id_project'] ?>"><?php echo $row['title'] ?></option>
											<?php };?>
										</select>
									</li>
								</ul>
									<ul id="parameters" class="param">

									</ul>
									<ul>
										<li class="status_delete"></li>	
									</ul>	
							<button  type="button" id="pro_edit" class="edit_section_button manage_button">Edit</button>
							<button type="button" id="pro_delete" class="delete_button manage_button">Delete</button>
						</fieldset>
					</form>
				  	<form id="update_project_form" method="post" enctype="multipart/form-data">
						<fieldset class="edit_section">
							<p>Edit Project:</p>
							<ul id="pro_edit_section">

							</ul>
							<ul>
								<li class="status_upload"></li>	
							</ul>
								<button type="submit" class="confirm_changes_button">Confirm</button>
								<button type="button" class="cancel_button">Cancel</button>	
						</fieldset>
					</form>
				</div>

			  	<div id="edit_Music" class="editContent">
				  	<form id="updateMusic" action="update.php" method="post">
						<fieldset id="musicSection">
							<p>Music File:</p>
							<ul class="reloadEditMusic">
								<li>
									<label for="music_options">Select music: </label>
										<select class="selector" name="music_options" id="music_options" required>
										<option value="">Select music</option>
							<?php 
									$sqlMus = "SELECT * FROM music";
									$resultMus = mysqli_query($connection, $sqlMus);

									while ($rowMus = mysqli_fetch_assoc($resultMus)) {	
							?>
										<option value="<?php echo $rowMus['id_music'] ?>"><?php echo $rowMus['name'] ?></option>
							<?php };?>
									</select>
								</li>
							</ul>
								<ul id="parameters2" class="param">

								</ul>
								<ul>
									<li class="status_delete"></li>	
								</ul>
							<button  type="button" class="edit_section_button manage_button">Edit</button>
							<button type="button" id="mus_delete" class="delete_button manage_button">Delete</button>
						</fieldset>
					</form>
					<form id="update_music_form" method="post" enctype="multipart/form-data">		
						<fieldset class="edit_section">
								<p>Edit Music:</p>
								<ul id="mus_edit_section">

								</ul>
								<ul>
									<li class="status_upload"></li>	
								</ul>
								<button type="submit" class="confirm_changes_button">Confirm</button>
								<button type="button" class="cancel_button">Cancel</button>		
						</fieldset>
					</form>
				</div>

			  	<div id="edit_Video" class="editContent">
				  	<form id="updateVideo" action="update.php" method="post">
						<fieldset id="movieSection">
							<p>Video File:</p>
							<ul class="reloadEditVideo">
								<li>
									<label for="video_options">Select video: </label>
										<select class="selector" name="video_options" id="video_options" required>
										<option value="">Select video</option>
										<?php 
												$sqlProjects= "SELECT * FROM video";
												$result = mysqli_query($connection, $sqlProjects);

												while ($row = mysqli_fetch_assoc($result)) {	
										?>
										<option value="<?php echo $row['id_video'] ?>"><?php echo $row['name'] ?></option>
										<?php };?>
									</select>
								</li>
							</ul>
							<ul id="parameters3" class="param">

							</ul>
							<ul>
								<li class="status_delete"></li>	
							</ul>
							<button type="button" class="edit_section_button manage_button">Edit</button>
							<button type="button" id="vid_delete" class="delete_button manage_button">Delete</button>
						</fieldset>
					</form>
					<form id="update_video_form" method="post" enctype="multipart/form-data">
						<fieldset class="edit_section">
							<p>Edit Video:</p>
								<ul id="vid_edit_section">

								</ul>
								<ul>
									<li class="status_upload"></li>	
								</ul>
							<button type="submit" class="confirm_changes_button">Confirm</button>
							<button type="button" class="cancel_button">Cancel</button>	
						</fieldset>
					</form>
				</div>
				<div id="edit_Artist" class="editContent">
				  	<form id="updateArtist" action="update.php" method="post">
						<fieldset id="artistSection">
							<p>Artist:</p>
							<ul class="reloadEditArtist">
								<li>
									<label for="artist_options">Select artist: </label>
									<select class="selector" name="artist_options" id="artist_options" required>
										<option value="">Select artist</option>
										<?php 
												$sqlProjects= "SELECT * FROM artists";
												$result = mysqli_query($connection, $sqlProjects);

												while ($row = mysqli_fetch_assoc($result)) {	
										?>
										<option value="<?php echo $row['id_artists'] ?>"><?php echo $row['name'] ?></option>
										<?php };?>
									</select>
								</li>
							</ul>
							<ul id="parameters4" class="param">

							</ul>
							<ul>
								<li class="status_delete"></li>	
							</ul>
						<button  type="button" class="edit_section_button manage_button">Edit</button>
						<button type="button"  id="art_delete" class="delete_button manage_button">Delete</button>
						</fieldset>
				</form>
				<form id="update_artist_form" method="post" enctype="multipart/form-data">
						<fieldset class="edit_section">
							<p>Edit Artist:</p>
								<ul id="artist_edit_section">

								</ul>
								<ul>
									<li class="status_upload"></li>	
								</ul>
							<button type="submit" class="confirm_changes_button">Confirm</button>
							<button type="button" class="cancel_button">Cancel</button>	
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>	

<script>

// HOME DATE

(function date() {
var d = new Date();
  var monthNames = [
    "January", "February", "March",
    "April", "May", "June", "July",
    "August", "September", "October",
    "November", "December"
  ];
	var days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
	
  var dayName = days[d.getDay()];
  var day = d.getDate();
  var monthIndex = d.getMonth();
  var year = d.getFullYear();

  $('#dayDate').append( dayName +' ' + day + ' ' + monthNames[monthIndex] + ' ' + year );

})();


// CLOCK SESSION

var i = 1801;

function updateClock() {
	i--;
    var minutes = parseInt(i/60);
    var seconds = i%60;
    seconds < 10 ? seconds = '0'+seconds : null;
    minutes < 10 ? minutes = '0'+minutes : null;
    var time =  minutes + ':' + seconds;

    i == 0 ? location.reload() : null;
    // set the content of the element with the ID time to the formatted string
    document.getElementById('time').innerHTML = time;


    // call this function again in 1000ms
    setTimeout(updateClock, 1000);
}
updateClock();


// TAB OPTIONS

function tab(evt, name){
	var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " active";

	$.ajax({
		url: "reloadEditProject.php",
		type: "post",
		cache: false
	}).done(function( data ) {
		$(".reloadEditProject").html(data);
	});

   	$('.status_upload').empty();
   	$('.param').children().remove();
   	$('.edit_section').hide();
	$('.manage_button').show();
    $('#upload_project_form')[0].reset();
    $('#updateProject')[0].reset();
    $('#updateMusic')[0].reset();
    $('#updateVideo')[0].reset();
    $('#updateArtist')[0].reset();
    $('.status_delete').empty();

}


function secondTab(evt, name){
	var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("uploadContent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("secondtablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }

    $.ajax({
		url: "reloadUploadMusic.php",
		type: "post",
		cache: false
	}).done(function( data ) {
		$(".reloadUploadMusic").html(data);
	});

	$.ajax({
		url: "reloadUploadVideo.php",
		type: "post",
		cache: false
	}).done(function( data ) {
		$(".reloadUploadVideo").html(data);
	});

    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " active";
   	$('.status_upload').empty();
   	$('#upload_project_form')[0].reset();
   	$('#upload_music_form')[0].reset();
}


function thirdTab(evt, name){
	var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("editContent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("thirdtablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(name).style.display = "block";
    evt.currentTarget.className += " active";


	$.ajax({
		url: "reloadEditProject.php",
		type: "post",
		cache: false
	}).done(function( data ) {
		$(".reloadEditProject").html(data);
	});

	$.ajax({
		url: "reloadEditMusic.php",
		type: "post",
		cache: false
	}).done(function( data ) {
		$(".reloadEditMusic").html(data);
	});

	$.ajax({
		url: "reloadEditVideo.php",
		type: "post",
		cache: false
	}).done(function( data ) {
		$(".reloadEditVideo").html(data);
	});

	$.ajax({
		url: "reloadEditArtist.php",
		type: "post",
		cache: false
	}).done(function( data ) {
		$(".reloadEditArtist").html(data);
	});
    
    $('.edit_section').hide();
	$('.manage_button').show();
	$('.status_upload').empty();
	$('.param').children().remove();
    $('#updateProject')[0].reset();
    $('#updateMusic')[0].reset();
    $('#updateVideo')[0].reset();
    $('#updateArtist')[0].reset();
   	$('.status_delete').empty();

}





$(document).ready(function () {

// HOME HELP BUTTON

	$('.notes button').click(function(){

		$('.helpNotes').is(':visible') ? $('.helpNotes').hide() : $('.helpNotes').fadeIn(500);
		
	});


// UPLOAD SECTION

    $('#upload_project_form').on('submit', function(e) {
	    e.preventDefault();
	    var formData = new FormData(this);
	    var player = 'no';
	   	$('.status_upload').empty();
	    $('.status_upload').append( "Status: Loading..." );
	    $('.slider').css('background-color') == 'rgb(33, 150, 243)'  ? player = 'yes' : player = 'no';
	    formData.append("player", player);

	    $.ajax({
	        url: 'uploadProject.php',
	        type: 'POST',
	        data: formData,
	        success: function (data) {
	           	$('.status_upload').empty();
	           	$('.status_upload').append(data);
	           	$('#upload_project_form')[0].reset();
	        },
	        cache: false,
	        contentType: false,
	        processData: false,
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
	                myXhr.upload.addEventListener('progress', function () {
	                    /* faz alguma coisa durante o progresso do upload */
	                }, false);
	            }
	        return myXhr;
	        }
	    });
	});

    $('#upload_music_form').on('submit', function(e) {
	    e.preventDefault();
	    var formData = new FormData(this);
	    $('.status_upload').empty();
	    $('.status_upload').append( "Status: Loading..." );

	    $.ajax({
	        url: 'uploadMusic.php',
	        type: 'POST',
	        data: formData,
	        success: function (data) {
	           	$('.status_upload').empty();
	           	$('.status_upload').append(data);
   				$('#upload_music_form')[0].reset();
	        },
	        cache: false,
	        contentType: false,
	        processData: false,
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
	                myXhr.upload.addEventListener('progress', function () {
	                    /* faz alguma coisa durante o progresso do upload */
	                }, false);
	            }
	        return myXhr;
	        }
	    });
	});


    $('#upload_video_form').on('submit', function(e) {
	    e.preventDefault();
	    var formData = new FormData(this);
	    $('.status_upload').empty();
	    $('.status_upload').append( "Status: Loading..." );

	    $.ajax({
	        url: 'uploadVideo.php',
	        type: 'POST',
	        data: formData,
	        success: function (data) {
	           	$('.status_upload').empty();
	           	$('.status_upload').append(data);
   				$('#upload_video_form')[0].reset();
	        },
	        cache: false,
	        contentType: false,
	        processData: false,
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
	                myXhr.upload.addEventListener('progress', function () {
	                    /* faz alguma coisa durante o progresso do upload */
	                }, false);
	            }
	        return myXhr;
	        }
	    });
	});


    $('#upload_artist_form').on('submit', function(e) {
	    e.preventDefault();
	    var formData = new FormData(this);
	    $('.status_upload').empty();
	    $('.status_upload').append( "Status: Loading..." );

	    $.ajax({
	        url: 'uploadArtist.php',
	        type: 'POST',
	        data: formData,
	        success: function (data) {
	           	$('.status_upload').empty();
	           	$('.status_upload').append(data);
   				$('#upload_artist_form')[0].reset();
	        },
	        cache: false,
	        contentType: false,
	        processData: false,
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
	                myXhr.upload.addEventListener('progress', function () {
	                    /* faz alguma coisa durante o progresso do upload */
	                }, false);
	            }
	        return myXhr;
	        }
	    });
	});




// EDIT/DELETE ON CHANGE SELECTORS




	$(document).on('change', '#project_options', function() {
		var selector = document.getElementById('project_options');
		var value = selector[selector.selectedIndex].value;
		if(value == ''){ $('.param').children().remove(); return;};
   		$('.status_upload').empty();
    	$('.status_delete').empty();



		$.ajax({
		  url: "loadProjects.php",
		  type: "post",
		  data: { val: value},
		  cache: false
		}).done(function( data ) {
		    $("#parameters").html(data);
		});

		$.ajax({
		  url: "editProject.php",
		  type: "post",
		  data: { val: value},
		  cache: false
		}).done(function( data ) {
		    $("#pro_edit_section").html(data);
		});

	});


	$(document).on('change', '#music_options', function() {
		var selector = document.getElementById('music_options');
		var value = selector[selector.selectedIndex].value;
		if(value == ''){ $('.param').children().remove(); return;};
   		$('.status_upload').empty();

		
		$.ajax({
			  url: "loadMusics.php",
			  type: "post",
			  data: { val: value},
			  cache: false
			})
			  .done(function( data ) {
			    $("#parameters2").html(data);
			});

		$.ajax({
		  url: "editMusic.php",
		  type: "post",
		  data: { val: value},
		  cache: false
		}).done(function( data ) {
		    $("#mus_edit_section").html(data);
		});

	});


	$(document).on('change', '#video_options', function() {
		var selector = document.getElementById('video_options');
		var value = selector[selector.selectedIndex].value;
		if(value == ''){ $('.param').children().remove(); return;};
   		$('.status_upload').empty();

		 $.ajax({
		  url: "loadVideos.php",
		  type: "post",
		  data: { val: value},
		  cache: false
		})
		  .done(function( data ) {
		    $("#parameters3").html(data);
		  });

		$.ajax({
		  url: "editVideo.php",
		  type: "post",
		  data: { val: value},
		  cache: false
		}).done(function( data ) {
		    $("#vid_edit_section").html(data);
		});

	});


	$(document).on('change', '#artist_options', function() {
		var selector = document.getElementById('artist_options');
		var value = selector[selector.selectedIndex].value;
		if(value == ''){ $('.param').children().remove(); return;};
   		$('.status_upload').empty();


		 $.ajax({
		  url: "loadArtist.php",
		  type: "post",
		  data: { val: value},
		  cache: false
		})
		  .done(function( data ) {
		    $("#parameters4").html(data);
		  });

		$.ajax({
		  url: "editArtist.php",
		  type: "post",
		  data: { val: value},
		  cache: false
		}).done(function( data ) {
		    $("#artist_edit_section").html(data);
		});


	});

// UPDATE PROJECT

    $('#update_project_form').on('submit', function(e) {
	    e.preventDefault();
	   	var selector = document.getElementById('project_options');
		var value = selector[selector.selectedIndex].value;
	    var formData = new FormData(this);
	    var player = 'no';
	   	$('.status_upload').empty();
	    $('.status_upload').append( "Status: Loading..." );
	    $('.secondSlider').css('background-color') == 'rgb(33, 150, 243)'  ? player = 'yes' : player = 'no';
	    formData.append("player", player);
	    formData.append("id_project", value);
	    formData.append("type_input", 'no');

	    $.ajax({
	        url: 'updateProject.php',
	        type: 'POST',
	        data: formData,
	        success: function (data) {
	           	$('.status_upload').empty();
	           	$('.status_upload').append(data);
	        },
	        cache: false,
	        contentType: false,
	        processData: false,
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
	                myXhr.upload.addEventListener('progress', function () {
	                    /* faz alguma coisa durante o progresso do upload */
	                }, false);
	            }
	        return myXhr;
	        }
	    });
	});


    $('#update_music_form').on('submit', function(e) {
	    e.preventDefault();
	    var selector = document.getElementById('music_options');
		var value = selector[selector.selectedIndex].value;
	    var formData = new FormData(this);
	    $('.status_upload').empty();
	    $('.status_upload').append( "Status: Loading..." );
	   	formData.append("id_music", value);

	    $.ajax({
	        url: 'updateMusic.php',
	        type: 'POST',
	        data: formData,
	        success: function (data) {
	           	$('.status_upload').empty();
	           	$('.status_upload').append(data);
	        },
	        cache: false,
	        contentType: false,
	        processData: false,
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
	                myXhr.upload.addEventListener('progress', function () {
	                    /* faz alguma coisa durante o progresso do upload */
	                }, false);
	            }
	        return myXhr;
	        }
	    });
	});


    $('#update_video_form').on('submit', function(e) {
	    e.preventDefault();
	    var selector = document.getElementById('video_options');
		var value = selector[selector.selectedIndex].value;
	    var formData = new FormData(this);
	    $('.status_upload').empty();
	    $('.status_upload').append( "Status: Loading..." );
	   	formData.append("id_video", value);

	    $.ajax({
	        url: 'updateVideo.php',
	        type: 'POST',
	        data: formData,
	        success: function (data) {
	           	$('.status_upload').empty();
	           	$('.status_upload').append(data);
	        },
	        cache: false,
	        contentType: false,
	        processData: false,
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
	                myXhr.upload.addEventListener('progress', function () {
	                    /* faz alguma coisa durante o progresso do upload */
	                }, false);
	            }
	        return myXhr;
	        }
	    });
	});

    $('#update_artist_form').on('submit', function(e) {
	    e.preventDefault();
	   	var selector = document.getElementById('artist_options');
		var value = selector[selector.selectedIndex].value;
	    var formData = new FormData(this);
	   	$('.status_upload').empty();
	    $('.status_upload').append( "Status: Loading..." );
	    formData.append("id_artist", value);

	    $.ajax({
	        url: 'updateArtist.php',
	        type: 'POST',
	        data: formData,
	        success: function (data) {
	           	$('.status_upload').empty();
	           	$('.status_upload').append(data);
	        },
	        cache: false,
	        contentType: false,
	        processData: false,
	        xhr: function() {  // Custom XMLHttpRequest
	            var myXhr = $.ajaxSettings.xhr();
	            if (myXhr.upload) { // Avalia se tem suporte a propriedade upload
	                myXhr.upload.addEventListener('progress', function () {
	                    /* faz alguma coisa durante o progresso do upload */
	                }, false);
	            }
	        return myXhr;
	        }
	    });
	});


	$('.edit_section_button').click(function(){

		var value = $(this).parent().find('.selector').val();

		if (value != '') {
			$(this).parent().parent().parent().find('.edit_section').show();
			$(this).parent().find('.manage_button').hide();
		}

		$('.status_delete').empty();


	});

// DELETE PROJECT


$('.delete_button').click(function(){

	var value = $(this).parent().find('.selector').val();
	var answer = confirm("Are you sure?"); //double check with the user

	if (answer == true) {
		switch($(this).attr('id')) {
		    case 'pro_delete':
		        $.ajax({
				  url: "deleteProject.php",
				  type: "post",
				  data: { val: value},
				  cache: false
				}).done(function( data ) {
		           	$('.status_delete').empty();
		           	$('.status_delete').append(data);
		           	$('#updateProject')[0].reset();
		           	$('.param').children().remove();
		           	$.ajax({
						url: "reloadEditProject.php",
						type: "post",
						cache: false
					}).done(function( data ) {
						$(".reloadEditProject").html(data);
					});
				});
		        break;
		    case 'mus_delete':
		        $.ajax({
				  url: "deleteMusic.php",
				  type: "post",
				  data: { val: value},
				  cache: false
				}).done(function( data ) {
		           	$('.status_delete').empty();
		           	$('.status_delete').append(data);
		           	$('#updateProject')[0].reset();
		           	$('.param').children().remove();
		           	$.ajax({
						url: "reloadEditMusic.php",
						type: "post",
						cache: false
					}).done(function( data ) {
						$(".reloadEditMusic").html(data);
					});
				});
		        break;
		    case 'vid_delete':
		        $.ajax({
				  url: "deleteVideo.php",
				  type: "post",
				  data: { val: value},
				  cache: false
				}).done(function( data ) {
		           	$('.status_delete').empty();
		           	$('.status_delete').append(data);
		           	$('#updateProject')[0].reset();
		           	$('.param').children().remove();
		           	$.ajax({
						url: "reloadEditVideo.php",
						type: "post",
						cache: false
					}).done(function( data ) {
						$(".reloadEditVideo").html(data);
					});
				});
		        break;
		    case 'art_delete':
		        $.ajax({
				  url: "deleteArtist.php",
				  type: "post",
				  data: { val: value},
				  cache: false
				}).done(function( data ) {
		           	$('.status_delete').empty();
		           	$('.status_delete').append(data);
		           	$('#updateProject')[0].reset();
		           	$('.param').children().remove();
		           	$.ajax({
						url: "reloadEditArtist.php",
						type: "post",
						cache: false
					}).done(function( data ) {
						$(".reloadEditArtist").html(data);
					});
				});
		        break;
		    default:

		}
	} else {
	    return;
	}




});



	$('.cancel_button').click(function(){

		$(this).parent().hide();
		$(this).parent().parent().parent().children(':first').find('.manage_button').show();

	});




});







</script>
</body>
</html>

