<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>Approval Page</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<style type="text/css">
		.srch
		{
			padding-left: 1000px;

		}
		
		body {
  font-family: "Lato", sans-serif;
  transition: background-color .5s;
}

.sidenav {
  height: 100%;
  margin-top: 50px;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #222;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #818181;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: white;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}

#main {
  transition: margin-left .5s;
  padding: 16px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}
.img-circle
{
	margin-left: 20px;
}
.h:hover
{
	color:white;
	width: 300px;
	height: 50px;
	background-color: #00544c;
}

	</style>

</head>
<body>
<!--_________________sidenav_______________-->
	
	<div id="mySidenav" class="sidenav">
  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>

  			<div style="color: white; margin-left: 60px; font-size: 20px;">

                <?php
                if(isset($_SESSION['login_user']))

                { 	echo "<img class='img-circle profile_img' height=120 width=120 src='images/".$_SESSION['pic']."'>";
                    echo "</br></br>";

                    echo "Welcome ".$_SESSION['login_user']; 
                }
                ?>
            </div><br><br>

  <div class="h"> <a href="matchsearch.php">Match Search</a></div>
  <div class="h"> <a href="search.php">Search</a></div>
  <div class="h"> <a href="request.php">Tutor Request</a></div>
  <div class="h"> <a href="approve.php">Request Approval</a></div>
  <div class="h"><a href="expired.php">Your Matches</a></div>

</div>
<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>
<div class="container">


	<script>
	function openNav() {
	  document.getElementById("mySidenav").style.width = "300px";
	  document.getElementById("main").style.marginLeft = "300px";
	  document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
	}

	function closeNav() {
	  document.getElementById("mySidenav").style.width = "0";
	  document.getElementById("main").style.marginLeft= "0";
	  document.body.style.backgroundColor = "white";
	}
	</script>
	<br><br>
	
	<?php
	if(isset($_SESSION['login_user']))

		{
			$q=mysqli_query($db,"SELECT * from users JOIN matchinfo ON users.id=matchinfo.used_id JOIN matchrequest ON users.username=matchrequest.loguser WHERE requser='$_SESSION[login_user]' ;");
			
			if(mysqli_num_rows($q)==0)
			{
				echo "There's no pending request";
			}
			else
			{
			echo "<table class='table table-bordered table-hover' >";
				echo "<tr style='background-color: #6db6b9e6;'>";
					//Table header
					echo "<th>"; echo "MatchID";  echo "</th>";
					echo "<th>"; echo "Username";  echo "</th>";
					echo "<th>"; echo "Firstname";  echo "</th>";
					echo "<th>"; echo "Lastname";  echo "</th>";
					echo "<th>"; echo "Area";  echo "</th>";
					echo "<th>"; echo "Level";  echo "</th>";
					echo "<th>"; echo "Subject 1";  echo "</th>";
					echo "<th>"; echo "Subject 2";  echo "</th>";
					echo "<th>"; echo "Subject 3";  echo "</th>";
					echo "<th>"; echo "Available time";  echo "</th>";
					echo "<th>"; echo "Available day 1";  echo "</th>";
					echo "<th>"; echo "Available day 2";  echo "</th>";
					echo "<th>"; echo "Available day 3";  echo "</th>";
					echo "<th>"; echo "Rates";  echo "</th>";
					echo "<th>"; echo "Role";  echo "</th>";
					echo "<th>"; echo "Approved";  echo "</th>";
					echo "<th>"; echo "Approve";  echo "</th>";
				
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
			?>
				<tr>
					<td><?php echo $row['matchid']; ?></td>
					<td><?php echo $row['username']; ?></td>
					<td><?php echo $row['firstname']; ?></td>    
					<td><?php echo $row['lastname']; ?></td>
					<td><?php echo $row['area']; ?></td>
					<td><?php echo $row['edulevel']; ?></td>
					<td><?php echo $row['subject1']; ?></td>
					<td><?php echo $row['subject2']; ?></td>
					<td><?php echo $row['subject3']; ?></td>
					<td><?php echo $row['timeslot']; ?></td>
					<td><?php echo $row['availableday1']; ?></td>
					<td><?php echo $row['availableday2']; ?></td>
					<td><?php echo $row['availableday3']; ?></td>
					<td><?php echo $row['rate']; ?></td>
					<td><?php echo $row['userType']; ?></td>
					<td><?php echo $row['approval']; ?></td>
					<td><a href="matchmanagement/approvematch.php?matchid=<?php echo $row['matchid']; ?>">Approve</a></td>
					<td><a href="matchmanagement/declinematch.php?matchid=<?php echo $row['matchid']; ?>">Decline</a></td>
    				<td><a href="matchmanagement/deletematch.php?matchid=<?php echo $row['matchid']; ?>">Delete</a></td>
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
			echo " Please login first to see the request information.";
			echo "</b></h2>";
		}
		?>
	</div>
</div>
</body>
</html>