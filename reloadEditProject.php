<?php
include('config.php');
?>	

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