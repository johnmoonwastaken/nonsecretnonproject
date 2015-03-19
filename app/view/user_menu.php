							<?php 
							if ($_SERVER['REQUEST_URI'] == '/edit_account') { 
									echo '<li class="selected">'. $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] .'</li>'; 
								}
								else {
									echo '<li><a href="edit_account">'. $_SESSION['first_name'] . ' ' . $_SESSION['last_name'] .'</a></li>';
								}
							if ($_SESSION['vendor_id'] != "-1") {
								/*
								if ($_SERVER['REQUEST_URI'] == '/edit_provider') { 
									echo '<li class="selected">Provider Profile</li>'; 
								}
								else {
									echo '<li><a href="edit_provider">Provider Profile</a></li>';
								}
								*/

								if ($_SERVER['REQUEST_URI'] == '/manage_courses') { 
									echo '<li class="selected">Courses</li>'; 
								}
								else {
									echo '<li><a href="manage_courses">Courses</a></li>';
								}

								/*
								if ($_SERVER['REQUEST_URI'] == '/manage_conferences') { 
									echo '<li class="selected">Conferences</li>'; 
								}
								else {
									echo '<li><a href="manage_conferences">Conferences</a></li>';
								}
								*/
							}
							?>