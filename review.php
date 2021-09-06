<?php
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
    	body
    	{
    		background-color: black;
    		
    	} 
    	.wrapper
    	{
    		padding: 20px;
    		margin: -20px auto;
    		width:1341px;
    		height: 350px;
    		background-color: grey;
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
		<h4>Website Review</h4>
        <p>If you have any suggesions or questions for the website please comment below.</p>
        <p> Feel free to leave comments even if you are not a registered user</p>

		<form style="" action="" method="post">

						<div class="form-row">
							<div class="form-group col-md-4">
                                <label for="firstname">Name</label>
                                <input type="text" class="form-control" name="personname" placeholder="Name" required="">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
							<div class="form-group col-md-4">
                                <label for="phone">Contact</label>
                                <input type="text" 
                                       onkeypress= "return onlyNumberKey(event)" 
                                       maxlength="11"class="form-control" name="phone" placeholder="Phone Number" required="">
                            </div>
                            
                        </div>

			<div class="form-row">
				<input class="form-control" type="text" name="sitecomment" placeholder="Write something..." required=""><br>
			</div>
			<input class="btn btn-default" type="submit" name="submit2" value="Comment" style="width: 100px; height: 35px;">		
		</form>
		</div>
	
	<br>
<?php
    if(isset($_POST['submit2'])){

    $reviewername=$_POST['personname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $sitecomment=$_POST['sitecomment'];
    
    //inserts into sitereview in the database with user input
    $ins="INSERT INTO `sitereview` VALUES('','$reviewername','$email','$phone','$sitecomment');";
    $result = mysqli_query($db,$ins);
    ?>
    <script type="text/javascript">
           alert("Comment sent successful");
    </script>
    <?php

    }
?>

	<div class="wrapper">
		<h4>Tutor/Student Review.</h4>
        <p>Only registered users can use this form</p><br>
        <p>If you have any comments or reviews you want to give to a tutor or tutee, you can do so below.</p>
		<br><form  style = "color :grey" action="" method="post">
   			<label class="form-label"><b style = "color :white">Username of the tutor/tutee: </b></label>
   			<input class="form-control-lg" type="text" name="targetuser" placeholder="Username" required=""><br>
   			<br><input class="form-control"  type="text" name="comment" placeholder="Write something..." required=""><br> 
   			<input class="btn btn-default" type="submit" name="submit1" value="submit" style="width: 100px; height: 35px;">  
  		</form>
	

		<?php
			if(isset($_POST['submit1']))
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
							?>
							<script type="text/javascript">
							alert("Your comment has been noted.");
							</script>
							<?php
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
    <br>

	
	

<?php include "footer.php"; ?>
</body>
<script>
    function onlyNumberKey(evt) {

        // Only ASCII character in that range allowed
        var ASCIICode = (evt.which) ? evt.which : evt.keyCode
        if (ASCIICode > 31 && (ASCIICode < 48 || ASCIICode > 57))
            return false;
        return true;
    }
</script>
</html>