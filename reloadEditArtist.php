<?php 
include('config.php');
?>							

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