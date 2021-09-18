<?phpp
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>
	<title>Review</title>
	
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
    <style type="text/css">
    	/* body
    	{
    		background-image: url("images/66.jpg");
    		background-repeat: no-repeat;
    	} */
    	.wrapper
    	{
    		padding: 20px;
    		margin: -20px auto;
    		width:1200px;
    		height: 900px;
    		background-color: black;
    		opacity: .8;
    		color: white;
    	}
    	.form-control
    	{
    		height: 60px;
    		width: 60%;
    	}
    	.scroll
    	{
    		width: 100%;
    		height: 300px;
    		overflow: auto;
    	}

    </style>
</head>
<body>

	<div class="wrapper">
		<h4>If you have any comments or reviews you want to give to a tutor or tutee, you can do so below.</h4>
		<br><br><form  style = "color :black" action="" method="post">
   			<label class="form-label"><b style = "color :white">Username of the tutor/tutee: </b></label>
   			<input class="form-control-lg" type="text" name="targetuser" placeholder="Username" required=""><br>
   			<br><input class="form-control"  type="text" name="comment" placeholder="Write something..."><br> 
   			<input class="btn btn-default" type="submit" name="submit" value="submit" style="width: 100px; height: 35px;">  
  		</form>
	

		<?php
			if(isset($_POST['submit']))
			{
				$targetuser=$_POST['targetuser'];
				$comment=$_POST['comment'];
				if(isset($_SESSION['login_user'])){
					$counter=0;
					$commentVerification = mysqli_query($db,"SELECT * FROM matchrequest WHERE (loguser='$_SESSION[login_user]' AND requser='$_POST[targetuser]') or (loguser='$_POST[targetuser]' AND requser='$_SESSION[login_user]');");
					// $row= mysqli_fetch_assoc($commentVerification);
					$counter=mysqli_num_rows($commentVerification);
						if($counter == 0){
							?>
							<script type="text/javascript">
							alert("You cannot comment on a tutor/tutee you have not interacted with before.");
							</script>
							<?php
						}else{
							$sql="INSERT INTO `review` VALUES ('', '$_SESSION[login_user]','$targetuser','$comment','GOOD') ;";
							$result = mysqli_query($db,$sql);
						}
				}else{
					?>
					<script type="text/javascript">
					alert("You must login to leave your comment");
					</script>
				<?php
				}
			}
		?>

	</div>
	
</body>
</html>