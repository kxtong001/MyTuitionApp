<?php
  session_start();
?>
<?php

include "../connection.php"; 

$matchid = $_GET['matchid']; // get id through query string
	
$edit = mysqli_query($db,"UPDATE matchrequest JOIN users ON matchrequest.loguser=users.username JOIN matchinfo ON users.id=matchinfo.used_id  SET approval = 'NO' WHERE matchid = '$matchid'");

if($edit)
{
    mysqli_close($db); // Close connection
    header("location:../approve.php"); // redirects to approval page
    exit;
}
else
{
    echo "Error approving record";
    echo mysqli_error();
}    	

?>

