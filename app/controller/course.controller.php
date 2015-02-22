<?php

$templateFields = array('course_id' => $_GET['id'], 'keywords' => $_GET['keywords'], 'start' => $_GET['start'], 'end' => $_GET['end'], 'location' => $_GET['location']);



displayTemplate('course', $templateFields);
displayTemplate('footer');