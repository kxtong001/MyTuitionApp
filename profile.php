<?php 
	include "connection.php";
	include "navbar.php";
 ?>
 <!DOCTYPE html>
 <html>
 <head>
 	<title>Profile</title>
 	<style type="text/css">
 		.wrapper
 		{
 			width: 900px;
 			margin: 0 auto;
 			color: black;
 		}
 	</style>
 </head>
 <body style="background-color: #F5FCFF; ">
 	<div class="container">
 		<form action="" method="post">
 			<button class="btn btn-default" style="float: right; width: 120px;" name="submit1">Edit User Info</button>
 		</form>
 		<div class="wrapper">
 			<?php

 				if(isset($_POST['submit1']))
 				{
 					?>
 						<script type="text/javascript">
 							window.location="edit.php"
 						</script>
 					<?php
 				}
 				$q=mysqli_query($db,"SELECT * FROM users JOIN matchinfo ON users.id = matchinfo.used_id WHERE users.username='$_SESSION[login_user]';");
 			?>
 			<h2 style="text-align: center;">My Profile</h2>

 			<?php
 				$row=mysqli_fetch_assoc($q);

 				echo "<div style='text-align: center'>
 					<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'>
 				</div>";
 			?>
 			<div style="text-align: center;"> <b>Welcome, </b>
	 			<h4>
	 				<?php echo $_SESSION['login_user']; ?>
	 			</h4>
 			</div>
 					  
			<?php
 				echo "<b>";
 				echo "<table class='table table-bordered'>";
				 // creates a table with 6 columns that are formatted to fit nicely.
				
				 	echo "<thead>";
					echo "<tr>";
						echo "<th style='width: 10%'> First Name:</th>";
						echo "<th style='width: 23%'>";
							echo $row['firstname'];
						echo"</th>";
						echo "<th style='width: 10%'> Last Name:</th>";
						echo "<th style='width: 23%'>";
							echo $row['lastname'];
						echo"</th>";
						echo "<th style='width: 10%'>Phone Number:</th>";
						echo "<th style='width: 23%'>";
							echo $row['phone'];
						echo"</th>";
					echo "</tr>";
				   	echo "</thead>";

	 				echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Email: </b>";	
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['email'];
	 					echo "</td>";

						echo "<td>";
							echo "<b> User Name: </b>";
						echo "</td>";
						echo "<td>";
							echo $row['username'];
						echo "</td>";

						echo "<td>";
							echo "<b> Password: </b>";
						echo "</td>";
						echo "<td>";
							echo $row['password'];
						echo "</td>";


					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Role: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['userType'];
	 					echo "</td>";

						echo "<td>";
	 						echo "<b> Area: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['area'];
	 					echo "</td>";

						 echo "<td>";
	 						echo "<b> Education Level: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['edulevel'];
	 					echo "</td>";
	 				echo "</tr>";
					
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Subject 1: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['subject1'];
	 					echo "</td>";

						echo "<td>";
	 						echo "<b> Subject 2: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['subject2'];
	 					echo "</td>";

						 echo "<td>";
	 						echo "<b> Subject 3: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['subject3'];
	 					echo "</td>";
	 				echo "</tr>";
					 
					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Available Day of the Week: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['availableday1'];
	 					echo "</td>";

						echo "<td>";
	 						echo "<b> Available Day of the Week: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['availableday2'];
	 					echo "</td>";

						 echo "<td>";
	 						echo "<b> Available Day of the Week: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['availableday3'];
	 					echo "</td>";
	 				echo "</tr>";

					echo "<tr>";
	 					echo "<td>";
	 						echo "<b> Preferred Period of the Day: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['timeslot'];
	 					echo "</td>";

						echo "<td>";
	 						echo "<b> Preferred Tuition Rate: </b>";
	 					echo "</td>";
	 					echo "<td>";
	 						echo $row['rate'];
	 					echo "</td>";
	 				echo "</tr>";

						
 				echo "</table>";
				echo "</b>";			
 			?>
			
			<br><br>
			<h2>Your comments</h2>
			<p>Comments left by other users. Do make use of the report button if you find the comment malicious</p>
			<br><br>
	
	<?php
	if(isset($_SESSION['login_user']))

		{
			$q=mysqli_query($db,"SELECT * from review WHERE targetuser='$_SESSION[login_user]' AND status='GOOD' ;");
			
			if(mysqli_num_rows($q)==0)
			{
				echo "You have no comments as of now";
			}
			else
			{
			echo "<table class='table table-bordered table-hover' >";
				echo "<tr style='background-color: #6db6b9e6;'>";
					//Table header
					echo "<th>"; echo "Username";  echo "</th>";
					echo "<th>"; echo "Comment";  echo "</th>";

			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))     
			{
			?>
				<tr> 
					<td><?php echo $row['writeruser']; ?></td>
					<td><?php echo $row['review']; ?></td>
					<td><a href="commentmanagement/reportcomment.php?id=<?php echo $row['id']; ?>">Report</a></td>
				</tr>
				<?php	
			}
			
			echo "</table>";
			}
		}
		else
		{
			echo "</br></br></br>"; 
			echo "<h2><b>";
			echo " Please login first to see the comments.";
			echo "</b></h2>";
		}
		?>
	
	
 		</div>
 	</div>
 </body>
 </html>