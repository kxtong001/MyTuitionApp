<?php
$url = parse_url(getenv("mysql:\b13d2a62a9a1fd:8f70ec7c@us-cdbr-east-04.cleardb.com\heroku_179fff40fae295c?reconnect=true"));
//Get Heroku ClearDB connection information
$server = $url["us-cdbr-east-04.cleardb.com"];
$username = $url["b13d2a62a9a1fd"];
$password = $url["8f70ec7c"];
$database = substr($url["heroku_179fff40fae295c"], 1);
// Connect to DB
$db = mysqli_connect($server, $username, $password, $db);
?>
