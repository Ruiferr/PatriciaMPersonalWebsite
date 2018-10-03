<?php
include('config.php');
?>	
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