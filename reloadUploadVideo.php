<?php
include('config.php');
?>					
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