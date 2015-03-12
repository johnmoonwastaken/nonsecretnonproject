<?php

session_start();
setcookie('trainingful_oauth', "", time()-3600);
session_unset();
session_destroy();

header("Location: /");
die();

?>