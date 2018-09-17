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


			<section class="portfolio-section section">
				<div class="close" id="portfolio-section"><i class="fa fa-times fa-lg" aria-hidden="true"></i>
				</div>
				<nav class="portfolio portfolio-menu">
					<div class="portfolio-options">
					<h2>Portfolio</h2>
						<ul>
							<li><button onclick="filterPortfolio('set1')"><p>Eletronic</p></button></li>
							<li><button onclick="filterPortfolio('set2')"><p>Film Scoring</p></button></li>
							<li><button onclick="filterPortfolio('set3')"><p>ETIC</p></button></li>
							<li><button onclick="filterPortfolio('set4')"><p>Games</p></button></li>					
						</ul>
					</div>
				</nav>
				<div class="mobileContainer">
					<section class="portfolio scrollPortfolio">
							<div class="go-back">
								<button onclick="filterPortfolio('set0')">
								<i class="fas fa-chevron-left"></i>
								<p>ALL</p></button>
							</div>
							<section class="set1 project1">
								<figure>
									<img src="audio/musicImg/orangeDelight.jpg">
								</figure>
								<div class="project-description">
									<h3>Orange Delight</h3>
								</div>
							</section>
							<section class="set2 project2">
								<figure>
									<img src="audio/musicImg/king.jpg">
								</figure>
								<div class="project-description">
									<h3>Project 2</h3>
								</div>
							</section>
							<section class="set1 project3">
								<figure >
									<img src="audio/musicImg/divide.jpg">
								</figure>
								<div class="project-description">
									<h3>Project 3</h3>
								</div>
							</section>
							<section class="set3 project4">
								<figure>
									<img src="audio/musicImg/no.png">
								</figure>
								<div class="project-description">
									<h3>Project 4</h3>
								</div>
							</section>
							<section class="set2 project5">
								<figure >
									<img src="audio/musicImg/no.png">
								</figure>
								<div class="project-description">
									<h3>Project 5</h3>
								</div>
							</section>
							<section class="set1 project6">
								<figure >
									<img src="audio/musicImg/no.png">
								</figure>
								<div class="project-description">
									<h3>Project 6</h3>
								</div>
							</section>
							<section class="set4 project7">
								<figure>
									<img src="audio/musicImg/no.png">
								</figure>
								<div class="project-description">
									<h3>Project 7</h3>
								</div>
							</section>
							<section class="set2 project8">
								<figure>
									<img src="audio/musicImg/no.png">
								</figure>
								<div class="project-description">
									<h3>Project 8</h3>
								</div>
							</section>
							<section class="set4 project9">
								<figure>
									<img src="audio/musicImg/no.png">
								</figure>
								<div class="project-description">
									<h3>Project 9</h3>
								</div>
							</section>
							<section class="set1 project10">
								<figure>
									<img src="audio/musicImg/no.png">
								</figure>
								<div class="project-description">
									<h3>Project 10</h3>
								</div>
							</section>
							<section class="set3 project11">
								<figure>
									<img src="audio/musicImg/no.png">
								</figure>
								<div class="project-description">
									<h3>Project 11</h3>
								</div>
							</section>								
					</section>
					<section class="portfolio portfolio-know-more" style="border:none;overflow-y: scroll;overflow-x: hidden;">
						<div class="go-back">
							<button class="back-projects"><i class="fas fa-chevron-left"></i><p>BACK</p></button>
						</div>	
						<div class="project-know-more" id="project1">
							<h3>Orange Delight</h3>
							<figure>
									<img src="audio/musicImg/orangeDelight.jpg">
							</figure>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="king"> Listen the EP</span><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project2">
							<h3>Project 2</h3>
							<figure>

							</figure>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
							<!-- Trigger/Open The Modal -->
								<li><button id="myBtn"> Watch here</button><br><br></li>
								<li><button id="myBtn"> Watch here</button><br><br></li>
								<li><button id="myBtn"> Watch here</button><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project3">
							<h3>Project 3</h3>
							<figure>
									<img src="audio/musicImg/divide.jpg">
							</figure>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="waves"> Track1</span><br><br></li>
								<li>&#9654;<span id="younger"> Track2</span><br><br></li>
								<li>&#9654;<span id="triangle"> Track3</span><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project4">
							<h3>Project 4</h3>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="waves"> Track1</span><br><br></li>
								<li>&#9654;<span id="younger"> Track2</span><br><br></li>
								<li>&#9654;<span id="triangle"> Track3</span><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project5">
							<h3>Project 5</h3>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="waves"> Track1</span><br><br></li>
								<li>&#9654;<span id="younger"> Track2</span><br><br></li>
								<li>&#9654;<span id="triangle"> Track3</span><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project6">
							<h3>Project 6</h3>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="waves"> Track1</span><br><br></li>
								<li>&#9654;<span id="younger"> Track2</span><br><br></li>
								<li>&#9654;<span id="triangle"> Track3</span><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project7">
							<h3>Project 7</h3>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="waves"> Track1</span><br><br></li>
								<li>&#9654;<span id="younger"> Track2</span><br><br></li>
								<li>&#9654;<span id="triangle"> Track3</span><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project8">
							<h3>Project 8</h3>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="waves"> Track1</span><br><br></li>
								<li>&#9654;<span id="younger"> Track2</span><br><br></li>
								<li>&#9654;<span id="triangle"> Track3</span><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project9">
							<h3>Project 9</h3>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="waves"> Track1</span><br><br></li>
								<li>&#9654;<span id="younger"> Track2</span><br><br></li>
								<li>&#9654;<span id="triangle"> Track3</span><br><br></li>
							</ul>
						</div>
						<div class="project-know-more" id="project10">
							<h3>Project 10</h3>
							<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>
							</p>
							<ul>
								<li>&#9654;<span id="waves"> Track1</span><br><br></li>
								<li>&#9654;<span id="younger"> Track2</span><br><br></li>
								<li>&#9654;<span id="triangle"> Track3</span><br><br></li>
							</ul>
						</div>
					
					</section>	
				</div>
				
			</section>


			<!-- The Modal -->
			<div id="myModal" class="modal">

			<!-- Modal content -->
			  	<div class="modal-content">
				    <video id="video" width="100%" controls controlsList="nodownload">
					  	<source src="video/uc16.mp4" type="video/mp4">
					  	Your browser does not support HTML5 video.
					</video>
			  	</div>

			</div>




			<!--        ARTISTS SECTION         -->

			<section class="artists-section section">
				<section class="artists">
					<div class="close" id="artists-section"><i class="fa fa-times fa-lg" aria-hidden="true"></i></div>
					<h3>ARTISTS</h3>
					<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>

					Graeco quaestio ex vel, vim ei duis erant inciderint, est graece labitur expetenda cu. Ad his aeque legendos, eros aperiam necessitatibus per id, timeam vidisse adipisci qui ne. Eum ea officiis disputationi. Ex vidit iracundia usu, ius accumsan necessitatibus eu. Pri dicat facete definitiones ad, et his error menandri perpetua, an omnes epicurei pro.</p>
					
				</section>
				<section class="artists">
					<div class="artist-description">
						<figure>
						  <img src="img/artist-img.png">
						  <figcaption>Artist Name</figcaption>
						</figure>
						<p>
							Graeco quaestio ex vel, vim ei duis erant inciderint, est graece labitur expetenda cu. Ad his aeque legendos, eros aperiam necessitatibus per id, timeam vidisse adipisci qui ne. Eum ea officiis disputationi. Ex vidit iracundia usu, ius accumsan necessitatibus eu. Pri dicat facete definitiones ad, et his error menandri perpetua, an omnes epicurei pro.
						</p>
					</div>
					<div class="artist-description">
						<figure>
						  <img src="img/artist-img.png">
						  <figcaption>Artist Name</figcaption>
						</figure>
						<p>
							Graeco quaestio ex vel, vim ei duis erant inciderint, est graece labitur expetenda cu. Ad his aeque legendos, eros aperiam necessitatibus per id, timeam vidisse adipisci qui ne. Eum ea officiis disputationi. Ex vidit iracundia usu, ius accumsan necessitatibus eu. Pri dicat facete definitiones ad, et his error menandri perpetua, an omnes epicurei pro.
						</p>
					</div>
					<div class="artist-description">
						<figure>
						  <img src="img/artist-img.png">
						  <figcaption>Artist Name</figcaption>
						</figure>
						<p>
							Graeco quaestio ex vel, vim ei duis erant inciderint, est graece labitur expetenda cu. Ad his aeque legendos, eros aperiam necessitatibus per id, timeam vidisse adipisci qui ne. Eum ea officiis disputationi. Ex vidit iracundia usu, ius accumsan necessitatibus eu. Pri dicat facete definitiones ad, et his error menandri perpetua, an omnes epicurei pro.
						</p>
					</div>
					<div class="artist-description">
						<figure>
						  <img src="img/artist-img.png">
						  <figcaption>Artist Name</figcaption>
						</figure>
						<p>
							Graeco quaestio ex vel, vim ei duis erant inciderint, est graece labitur expetenda cu. Ad his aeque legendos, eros aperiam necessitatibus per id, timeam vidisse adipisci qui ne. Eum ea officiis disputationi. Ex vidit iracundia usu, ius accumsan necessitatibus eu. Pri dicat facete definitiones ad, et his error menandri perpetua, an omnes epicurei pro.
						</p>
					</div>


				</section>
			</section>


			<!--      CONTACT ME SECTION      -->

			<section class="contact-section section">
				<div class="contact firstSection">
					<div class="close" id="contact-section"><i class="fa fa-times fa-lg" aria-hidden="true"></i></div>
					<h4>Contact</h4>
					<p>Graeco quaestio ex vel, vim ei duis erant inciderint, est graece labitur expetenda cu. Ad his aeque legendos, eros aperiam necessitatibus per id.
					</p>

					
				</div>
				<div class="contact secondSection" style="border:none">

					<div class="formulario">
						<form>
							<label>Name:</label>
							<input type="text" name="name"><br>
							<label>Email:</label>
							<input type="text" name="email"><br>
							<label>Message:</label>
							<textarea></textarea><br>
							<button>Send</button>
						</form>
					</div>

				</div>				
			</section>
		</div>
		<section class="play-music-section">
			<div class="album-image">
				<div class="image" id="image-player" style="background-image: url(audio/musicImg/orangeDelight.jpg)"></div>
			</div>

			<audio class="audio-player" id="music" preload="true">
			</audio>
			<div id="audioplayer">
				<div class="errorMessage"><p>Sorry your browser does not support audio</p></div>
				<div class="musicLabel" id="musicLabel">
					<p></p>
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

		</section>
		<aside class="right-bar">
			<div class="player-menu">
				<img class="fa-play" src="img/play.png">
				<img class="fa-times" src="img/times.png">
			</div>
			<button class="mobile-album-btn">MORE <i class="fas fa-angle-double-down"></i><i class="fas fa-angle-double-up"></i></button>
			<div class="album-selection">
				<div class="covers">
					<div class="coverImg" id="orangeDelight" style="background-image: url(audio/musicImg/orangeDelight.jpg)">				
					</div>

				</div>
				<div class="covers">
					<div class="coverImg" id="divide" style="background-image: url(audio/musicImg/divide.jpg)">
					</div>
				</div>
				<div class="covers">
					<div class="coverImg" id="king" style="background-image: url(audio/musicImg/king.jpg)">
					</div>
				</div>
			</div>	
		</aside>
	</div>
</body>
</html>