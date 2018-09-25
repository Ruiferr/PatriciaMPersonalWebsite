			

			<section class="artists-section section">
				<section class="artists">
					<div class="close" id="artists-section"><i class="fa fa-times fa-lg" aria-hidden="true"></i></div>
					<h3>ARTISTS</h3>
					<p>Lorem ipsum dolor sit amet, ex nec animal rationibus, his ex graeci impetus salutatus. Ad vix quas labore, debet lucilius at cum. Id corpora pericula sed, eam cetero theophrastus eu. Pro eruditi principes posidonium cu, populo numquam vituperatoribus mea cu. Audiam quaeque meliore ius ad. Noster quaestio reprehendunt ne eam, usu ne solet civibus gloriatur.<br><br><br>

					Graeco quaestio ex vel, vim ei duis erant inciderint, est graece labitur expetenda cu. Ad his aeque legendos, eros aperiam necessitatibus per id, timeam vidisse adipisci qui ne. Eum ea officiis disputationi. Ex vidit iracundia usu, ius accumsan necessitatibus eu. Pri dicat facete definitiones ad, et his error menandri perpetua, an omnes epicurei pro.</p>
					
				</section>
				<section class="artists">
					<?php
							$sqlArtists = "SELECT * FROM artists";
							$resultArtists = mysqli_query($connection, $sqlArtists);


							while ($rowArtists = mysqli_fetch_assoc($resultArtists)) {
					?>
					<div class="artist-description">
						<figure>
						  <img src="artistsImg/<?php echo $rowArtists['img_url'] ?>">
						  <figcaption><?php echo $rowArtists['name'] ?></figcaption>
						</figure>
						<p>
							<?php echo $rowArtists['summary'] ?>
						</p>
					</div>
					<?php }; ?>


				</section>
			</section>