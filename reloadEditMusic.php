<?php
include('config.php');
?>

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