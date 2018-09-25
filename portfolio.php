			

			<section class="portfolio-section section">
				<div class="close" id="portfolio-section"><i class="fa fa-times fa-lg" aria-hidden="true"></i>
				</div>
				<nav class="portfolio portfolio-menu">
					<div class="portfolio-options">
					<h2>Portfolio</h2>
						<ul>
							<li>
								<button onclick="filterPortfolio('set1')"><p>Music </p></button>
								<button class="close-projects" onclick="filterPortfolio('set0')">x</button>

							</li>
							<li>
								<button onclick="filterPortfolio('set2')"><p>Post Production</p></button>
								<button class="close-projects" onclick="filterPortfolio('set0')">x</button>
							</li>
						</ul>
					</div>
				</nav>
				<div class="mobileContainer">
					<section class="portfolio scrollPortfolio">
							<div class="go-back"></div>

						<?php
							$sqlProjects = "SELECT * FROM projects";
							$result = mysqli_query($connection, $sqlProjects);

							while ($rowProjects = mysqli_fetch_assoc($result)) {	
								
						?>

							<section class="set<?php echo $rowProjects['music_or_post'] ?> project<?php echo $rowProjects['id_project'] ?>">
								<figure>
									<img src="audioImg/<?php echo $rowProjects['img_url']; ?>">
								</figure>
								<div class="project-description">
									<h3><?php echo $rowProjects['title']; ?></h3>
								</div>
							</section>
						<?php } ?>

							
					</section>
					<section class="portfolio portfolio-know-more" style="border:none;overflow-y: scroll;overflow-x: hidden;">
						<div class="go-back">
							<button class="back-projects"><i class="fas fa-chevron-left"></i><p>BACK</p></button>
						</div>

						<?php
							$sqlProj = "SELECT * FROM projects";
							$resultProj = mysqli_query($connection, $sqlProj);

							while ($rowProj = mysqli_fetch_assoc($resultProj)) {
									
								
						?>	
						<div class="project-know-more" id="project<?php echo $rowProj['id_project'] ?>">
							<h3><?php echo $rowProj['title']; ?></h3>
							<figure>
									<img src="audioImg/<?php echo $rowProj['img_url']; ?>">
							</figure>
							<p><?php echo $rowProj['summary']; ?><br><br><br>
							</p>
							<ul>


							<?php 

								if($rowProj['music_or_post'] == 1){

										$sqlMusics = "SELECT * FROM music INNER JOIN projects_has_music ON id_music = fk_id_music INNER JOIN projects ON fk_id_projects = ".$rowProj['id_project']." WHERE id_project = ".$rowProj['id_project']."";
										$resultMusics = mysqli_query($connection, $sqlMusics);


										while ($rowMusics = mysqli_fetch_assoc($resultMusics)) {
											$musicWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $rowMusics['music_url']);
																
							?> 
											<li>&#9654; <span id="<?php echo $musicWithoutExt ?>">  <?php echo $rowMusics['name'] ?></span><br><br></li>
							<?php 
								 		};

								} else if ($rowProj['music_or_post'] == 2) {

										$sqlVideos = "SELECT * FROM video INNER JOIN projects_has_video ON id_video = fk_id_video INNER JOIN projects ON fk_id_projects = ".$rowProj['id_project']." WHERE id_project = ".$rowProj['id_project']."";
										$resultVideos = mysqli_query($connection, $sqlVideos);


										while ($rowVideos = mysqli_fetch_assoc($resultVideos)) {
											//$videoWithoutExt = preg_replace('/\\.[^.\\s]{3,4}$/', '', $rowVideos['video_url']);

								 ?>
								 			<!-- Trigger/Open The Modal -->
											<li><button class="myBtn" id="<?php echo $rowVideos['video_url'] ?>"><? echo $rowVideos['name'] ?></button><br><br></li>
								<?php
								 		};
								}
							?>
							</ul>
						</div>
						<?php }; ?>	
					</section>	
				</div>
				
			</section>

			<!-- The Modal -->
			<div id="myModal" class="modal">

			<!-- Modal content -->
			  	<div class="modal-content">
			  	</div>

			</div>