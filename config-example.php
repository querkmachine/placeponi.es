<?php 

// Rename file to config.php when in use

$domain = $_SERVER["HTTP_HOST"];
switch($domain) {
	case "placeponi.es":
		class Config {
			const DEBUG = false;
			const DB_HOST = "localhost";
			const DB_USER = "user";
			const DB_PASS = "password";
			const DB_NAME = "database";
			const DIR_SOURCE = "/source/";
			const DIR_GENERATED = "/generated/";
		}
		break;
	default: 
		die("ERROR: Settings for environment '" . $domain . "' could not be found.");
		break;
}

date_default_timezone_set("UTC");
if(Config::DEBUG) {
	error_reporting(E_ALL);
}
else {
	error_reporting(0);
}