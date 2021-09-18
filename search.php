<?php
  include "connection.php";
  include "navbar.php";
?>


<!DOCTYPE html>
<html>
<head>
	<title>Search</title>
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

 
  <div class="h"> <a href="search.php">Search</a></div>
  <div class="h"> <a href="request.php">Tutor Request</a></div>
  <div class="h"> <a href="issue_info.php">Issue Information</a></div>
  <div class="h"><a href="expired.php">Expired List</a></div>
</div>

<div id="main">
  
  <span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776; open</span>


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
	<!--___________________search bar________________________-->

	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="search" placeholder="Enter Keyword etc.." required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit" class="btn btn-default">
					<span class="glyphicon glyphicon-search"></span>
				</button>
		</form>
	</div>
	<!--___________________request book__________________-->
	<div class="srch">
		<form class="navbar-form" method="post" name="form1">
			
				<input class="form-control" type="text" name="bid" placeholder="Enter tutor ID" required="">
				<button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Request
				</button>
		</form>
	</div>


	<h2>List Of Tutors</h2>
	<?php
		if(isset($_POST['submit']))
		{
			$q=mysqli_query($db,"SELECT * from users JOIN matchinfo ON users.id=matchinfo.used_id WHERE (username like '%$_POST[search]%' or
																										 userType like '%$_POST[search]%' or
																										 area like '%$_POST[search]%' or
																										 edulevel like '%$_POST[search]%' or
																										 subject1 like '%$_POST[search]%' or
																										 subject2 like '%$_POST[search]%' or
																										 subject3 like '%$_POST[search]%' or
																										 timeslot like '%$_POST[search]%' or
																										 availableday1 like '%$_POST[search]%' or
																										 availableday2 like '%$_POST[search]%' or
																										 availableday3 like '%$_POST[search]%' or
																										 rate like '%$_POST[search]%') ");
			
			if(mysqli_num_rows($q)==0)
			{
				echo "Sorry! No tutor found. Try searching again for a specific name or with keywords (North, Night, Saturday, Tutor, etc).";
			}
			else
			{
		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
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
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($q))
			{
				echo "<tr>";
				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['area']; echo "</td>";
				echo "<td>"; echo $row['edulevel']; echo "</td>";
				echo "<td>"; echo $row['subject1']; echo "</td>";
				echo "<td>"; echo $row['subject2']; echo "</td>";
				echo "<td>"; echo $row['subject3']; echo "</td>";
				echo "<td>"; echo $row['timeslot']; echo "</td>";
				echo "<td>"; echo $row['availableday1']; echo "</td>";
				echo "<td>"; echo $row['availableday2']; echo "</td>";
				echo "<td>"; echo $row['availableday3']; echo "</td>";
				echo "<td>"; echo $row['rate']; echo "</td>";
				echo "<td>"; echo $row['userType']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
			}
		}
			/*if button is not pressed.*/
		else
		{
			$res=mysqli_query($db,"SELECT * from users INNER JOIN matchinfo ON users.id=matchinfo.used_id;");

		echo "<table class='table table-bordered table-hover' >";
			echo "<tr style='background-color: #6db6b9e6;'>";
				//Table header
				echo "<th>"; echo "ID";	echo "</th>";
				echo "<th>"; echo "Username";  echo "</th>";
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
			echo "</tr>";	

			while($row=mysqli_fetch_assoc($res))
			{
				echo "<tr>";
				echo "<td>"; echo $row['id']; echo "</td>";
				echo "<td>"; echo $row['username']; echo "</td>";
				echo "<td>"; echo $row['area']; echo "</td>";
				echo "<td>"; echo $row['edulevel']; echo "</td>";
				echo "<td>"; echo $row['subject1']; echo "</td>";
				echo "<td>"; echo $row['subject2']; echo "</td>";
				echo "<td>"; echo $row['subject3']; echo "</td>";
				echo "<td>"; echo $row['timeslot']; echo "</td>";
				echo "<td>"; echo $row['availableday1']; echo "</td>";
				echo "<td>"; echo $row['availableday2']; echo "</td>";
				echo "<td>"; echo $row['availableday3']; echo "</td>";
				echo "<td>"; echo $row['rate']; echo "</td>";
				echo "<td>"; echo $row['userType']; echo "</td>";

				echo "</tr>";
			}
		echo "</table>";
		}

		if(isset($_POST['submit1']))
		{
			if(isset($_SESSION['login_user']))
			{
				mysqli_query($db,"INSERT INTO issue_book Values('$_SESSION[login_user]', '$_POST[bid]', '', '', '');");
				?>
					<script type="text/javascript">
						window.location="request.php"
					</script>
				<?php
			}
			else
			{
				?>
					<script type="text/javascript">
						alert("You must login to search for a tutor");
					</script>
				<?php
			}
		}

	?>
</div>
</body>
</html>