<?php

$path = parse_url($_SERVER['REQUEST_URI'])['path'];

// Extract the path from the URI and remove "/oop_php" from the path
//$uri = str_replace("/oop_php", "", $path);

reRoute($path);