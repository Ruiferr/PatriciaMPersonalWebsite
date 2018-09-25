<?php
	include('config.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>PatriciaMelvill</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<link rel="stylesheet" type="text/css" href="css/tablet.css">
	<link rel="stylesheet" type="text/css" href="css/mobile.css">
	<link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
	<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
	<script rel="preload" type="text/javascript" src="js/social.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	<script type="text/javascript" src="js/audio.js"></script>





</head>
<body>
	<!--  Loading Bar  -->

    <div id="overlay">
	    <div id="progstat"></div>
	    <div id="progress"></div>
	</div>


	<div class="wrapper">
		<aside class="left-bar">
			<div class="menu-bar">
				<img class="fa-bars" src="img/menu.png">
				<img class="fa-arrow-left" src="img/arrow.png">
			</div>
			<div class="social">
				<a href="https://www.facebook.com/Patriciamelvill/" target="_blank">
					<div class="social-icon face">
						<i class="fab fa-facebook-f fa-lg"></i>
					</div>
				</a>
				<a href="https://www.instagram.com/patriciamelvill/?hl=pt" target="_blank">
					<div class="social-icon insta">
						<i class="fab fa-instagram fa-lg" aria-hidden="true"></i>
					</div>
				</a>
				<a href="">
					<div class="social-icon twit">
						<i class="fab fa-twitter" fa-lg" aria-hidden="true"></i>
					</div>
				</a>
				<a href="https://soundcloud.com/patriciamelvill" target="_blank">
					<div class="social-icon soundC">
						<i class="fab fa-soundcloud fa-lg" aria-hidden="true"></i>
					</div>
				</a>
				<a href="https://www.youtube.com/channel/UCv9ERWpdC4KtSQtiXc3_M2g" target="_blank">
				<div class="social-icon youtube" style="border: none;">
					<i class="fab fa-youtube fa-lg" aria-hidden="true"></i>
				</div>
				</a>
			</div>
			
		</aside>
		<div class="main-content">

			<div id="firstContent" class="content">
				<div class="feed feedSection1 box">
						<p>Social Feed</p>
						<span>stay tuned</span>

				</div>
				<div id="content-first-column" class="feed-output">

						
				</div>
			<p class="dev">website developed by <a href="https://www.ruiferrao.net/">RF</a></p>
			</div>
			<div class="content">				
				<div id="content-second-column" class="feed-output">

						
				</div>

			</div>
			<div class="content">
				<div id="content-third-column" class="feed-output">

						
				</div>

			</div>
			<div class="content" style="border:none">
				<div id="content-forth-column" class="feed-output">

						
				</div>

			</div>

			<nav class="menu-div">
				<div class="content-menu menu1 select-section" id="about-section">
					<p>About</p>
					<span>Who am I?</span>
				</div>
				<div class="content-menu menu2 select-section" id="portfolio-section">
					<p>Portfolio</p>
					<span>My music</span>
				</div>
				<div class="content-menu menu3 select-section" id="artists-section">
					<p>Artists</p>
					<span>Who i worked with</span>
				</div>
				<div class="content-menu menu4 select-section" id="contact-section" style="border:none">
					<p>Contact</p>
					<span>Drop me a line...</span>
				</div>
			</nav>


			<!--      ABOUT ME SECTION      -->


			<section class="about-section section">
				<section class="about firstSection">
				<div class="close"><i class="fa fa-times fa-lg" aria-hidden="true"></i></div>
				<h1>About me</h1>

					<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>

					Graeco quaestio ex vel, vim ei duis erant inciderint, est graece labitur expetenda cu. Ad his aeque legendos, eros aperiam necessitatibus per id, timeam vidisse adipisci qui ne. Eum ea officiis disputationi. Ex vidit iracundia usu, ius accumsan necessitatibus eu. Pri dicat facete definitiones ad, et his error menandri perpetua, an omnes epicurei pro.</p>
					
				</section>
				<section class="about secondSection" style="border:none">

					<p>
						Vim case dicat docendi ea, per ut scaevola postulant instructior. Amet platonem disputationi eu eos, pri et invidunt disputationi. Wisi inani convenire no mei, est labore denique apeirian et, per in dicit aliquip inermis. Usu amet causae ei, suas ludus utroque vis et, nemore commune copiosae ei vim.<br><br><br>

						An est invidunt comprehensam, nostro facilisis quo te, qui laudem lucilius moderatius id. Scripta quaestio mel id. Vim pertinax deseruisse no, an nostrud feugiat vel. Qui gloriatur vituperata ad, inimicus accusamus eu nec. Nullam ignota oportere cu sed, quot probo malis cu qui.
					</p>
					
				</section>
				
			</section>


			<!--        PORTFOLIO SECTION         -->


			<?php include('portfolio.php'); ?>





			<!--        ARTISTS SECTION         -->



			<?php include('artists.php'); ?>




			<!--      CONTACT ME SECTION      -->


			<?php include('contact.php'); ?>



		</div>
			

			<!--      MUSIC PLAYER     -->

		<section class="play-music-section">
			<div class="album-image">
				<?php
						$sqlFirstImg = "SELECT img_url FROM projects LIMIT 1";
						$firstImg = mysqli_query($connection, $sqlFirstImg);
						$rowFirstImg = mysqli_fetch_assoc($firstImg);

				?>
				<div class="image" id="image-player" style="background-image: url(audioImg/<?php echo $rowFirstImg['img_url']; ?>)"></div>
			</div>

			<audio class="audio-player" id="music" preload="true">
			</audio>
			<div id="audioplayer">
				<div class="errorMessage"><p>Sorry your browser does not support audio</p></div>
				<div class="musicLabel" id="musicLabel">
					<p>	
						<?php
							// GET Project title
							$sqlFirstTitle = "SELECT title FROM projects LIMIT 1";
							$firstTitle = mysqli_query($connection, $sqlFirstTitle);
							$rowFirstTitle = mysqli_fetch_assoc($firstTitle);
							// GET music name
							$sqlFirstMusicTitle = "SELECT * FROM music INNER JOIN projects_has_music ON id_music = fk_id_music INNER JOIN projects ON fk_id_projects = id_project LIMIT 1";
							$firstMusicTitle = mysqli_query($connection, $sqlFirstMusicTitle);
							$rowFirstMusicTitle = mysqli_fetch_assoc($firstMusicTitle);


							echo $rowFirstTitle['title'].': '.$rowFirstMusicTitle['name'];
						?>
							
					</p>
				</div>
				<div id="timelineFrame">
			 		<div id="timeline">    
  		  				<div id="playhead"></div>
  					</div>		
				</div>
				<div class="controls">
					<button id="mute" class="play">
					<i class="fa fa-volume-up" aria-hidden="true"></i>
					</button>
					<button id="btnPrev" class="play"><i class="fas fa-angle-left"></i></button>
					<button id="playButton" class="play"><i class="fas fa-caret-right"></i></button>
					<button id="btnNext" class="play"><i class="fas fa-angle-right"></i></button>			
				</div> 

			</div>

			<!--      MUSIC PLAYER : RIGHT BAR / ALBUM SECTION     -->

		</section>
		<aside class="right-bar">
			<div class="player-menu">
				<img class="fa-play" src="img/play.png">
				<img class="fa-times" src="img/times.png">
			</div>
			<button class="mobile-album-btn">MORE <i class="fas fa-angle-double-down"></i><i class="fas fa-angle-double-up"></i></button>
			<div class="album-selection">
				<?php
					$sqlAlbuns = "SELECT * FROM projects WHERE has_album = 'yes'";

					$resultAlbuns = mysqli_query($connection, $sqlAlbuns);


					while($row = mysqli_fetch_assoc($resultAlbuns)){
							$sqlImages = "SELECT img_url FROM projects WHERE id_project = ".$row['id_project']."";
							$resultImg = mysqli_query($connection, $sqlImages);
							$rowImg = mysqli_fetch_assoc($resultImg);
							$imgWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $rowImg['img_url']);

				?>
				<div class="covers">
					<div class="coverImg" id="<?php echo $imgWithoutExt; ?>" style="background-image: url(audioImg/<?php echo $rowImg['img_url']; ?>)">				
					</div>

				</div>
				<?php } ?>
			</div>	
		</aside>
	</div>
</body>
</html>