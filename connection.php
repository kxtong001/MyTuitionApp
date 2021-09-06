<?php
//Get Heroku ClearDB connection information
$cleardb_url = parse_url(getenv("mysql://b13d2a62a9a1fd:8f70ec7c@us-cdbr-east-04.cleardb.com/heroku_179fff40fae295c?reconnect=true"));
$cleardb_server = $cleardb_url["us-cdbr-east-04.cleardb.net"];
$cleardb_username = $cleardb_url["b13d2a62a9a1fd"];
$cleardb_password = $cleardb_url["8f70ec7c"];
$cleardb_db = substr($cleardb_url["heroku_179fff40fae295c"],1);
$active_group = 'default';
$query_builder = TRUE;
// Connect to DB
$db = mysqli_connect($cleardb_server, $cleardb_username, $cleardb_password, $cleardb_db);
?>
