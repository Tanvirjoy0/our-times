<?php

ob_start();

session_start();
session_unset();
session_destroy();

header('LOCATION: ../index.php');

ob_end_flush();

?>