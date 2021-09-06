<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
$cleardb_server = $cleardb_url["us-cdbr-east-04.cleardb.net"];
$cleardb_username = $cleardb_url["b13d2a62a9a1fd"];
$cleardb_password = $cleardb_url["8f70ec7c"];
$cleardb_db = substr($cleardb_url["tuitionapp"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$db = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
