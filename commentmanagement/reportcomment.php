<?php
  session_start();
?>
<?php

include "../connection.php"; 

$id = $_GET['id']; // get id through query string
	
$edit = mysqli_query($db,"UPDATE review SET status = 'BAD' WHERE id = '$id'");

if($edit)
{
    mysqli_close($db); // Close connection
    header("location:../profile.php"); // redirects to profile page
    exit;
}
else
{
    echo "Error approving record";
    echo mysqli_error();
}    	

?>