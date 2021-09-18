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
			
 		</div>
 	</div>
 </body>
 </html>