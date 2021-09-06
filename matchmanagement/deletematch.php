<?php
  session_start();
?>
<?php

include "../connection.php"; 

$matchid = $_GET['matchid']; // get id through query string
	
$del = mysqli_query($db,"DELETE FROM matchrequest WHERE matchid = '$matchid'");

if($del)
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