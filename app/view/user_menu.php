							<?php 
							if (strpos($_SERVER['REQUEST_URI'],'/edit_account') !== FALSE) { 
									echo '<li class="selected">'. $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] .'</li>'; 
								}
								else {
									echo '<li><a href="edit_account">'. $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] .'</a></li>';
								}
							if ($_SESSION['vendor_id'] != "-1") {
								
								if (strpos($_SERVER['REQUEST_URI'],'/edit_provider') !== FALSE) { 
									echo '<li class="selected">Provider Profile</li>'; 
								}
								else {
									echo '<li><a href="edit_provider">Provider Profile</a></li>';
								}
								

								if (strpos($_SERVER['REQUEST_URI'],'/manage_courses') !== FALSE) { 
									echo '<li class="selected">Manage Courses</li>'; 
								}
								else {
									echo '<li><a href="manage_courses">Manage Courses</a></li>';
								}

								/*
								if ($_SERVER['REQUEST_URI'] == '/manage_conferences') { 
									echo '<li class="selected">Manage Conferences</li>'; 
								}
								else {
									echo '<li><a href="manage_conferences">Manage Conferences</a></li>';
								}
								*/
							}
							?>