<?php
    include "connection.php";
    include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match Search</title>
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
  <div class="h"><a href="matchsearch.php">Smart Match</a></div>
  <div class="h"> <a href="request.php">Tutor Request</a></div>
  <div class="h"> <a href="approve.php">Request Approval</a></div>
  
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

<h2>Your Recommended Matches</h2>
<b><p>Matches are based on your level of study, preferred time of day, preferred rate, area, subject(s), available day(s)</p></b>
	<br><br>



<?php
//check if user is logged in
if(isset($_SESSION['login_user'])){

        $q= mysqli_query($db, "SELECT * FROM users JOIN matchinfo ON users.id = matchinfo.used_id WHERE users.username = '$_SESSION[login_user]';");
        $qrow = mysqli_fetch_assoc($q);
        $results= mysqli_query($db, "SELECT * FROM users JOIN matchinfo ON users.id = matchinfo.used_id WHERE edulevel = '$qrow[edulevel]' AND 
                                                                                                            timeslot = '$qrow[timeslot]' AND 
                                                                                                            rate = '$qrow[rate]' AND 
                                                                                                            userType != '$qrow[userType]' AND
                                                                                                            area = '$qrow[area]' AND
                                                                                                            (subject1 IN ('$qrow[subject1]', '$qrow[subject2]', '$qrow[subject3]') OR
                                                                                                             subject2 IN ('$qrow[subject1]', '$qrow[subject2]', '$qrow[subject3]') OR
                                                                                                             subject3 IN ('$qrow[subject1]', '$qrow[subject2]', '$qrow[subject3]')) AND
                                                                                                            (availableday1 IN ('$qrow[availableday1]', '$qrow[availableday2]', '$qrow[availableday3]') OR
                                                                                                             availableday2 IN ('$qrow[availableday1]', '$qrow[availableday2]', '$qrow[availableday3]') OR
                                                                                                             availableday3 IN ('$qrow[availableday1]', '$qrow[availableday2]', '$qrow[availableday3]'))
                                                                                                            ORDER BY RAND() LIMIT 3;");
                                                                                                                               

        if(mysqli_num_rows($results)==0){
            echo "Sorry! No matches for your picks! Try editing your profile choices!";
        }
        else
        {       
        ?>       
        <div class="srch">
            <form class="navbar-form" method="post" name="form1">
                
                    <input class="form-control" type="text" name="matchid" placeholder="Enter ID" required="">
                    <button style="background-color: #6db6b9e6;" type="submit" name="submit1" class="btn btn-default">Request
                    </button>
            </form>
        </div>
        <?php                                                                           
        echo "<center>";
        echo "<h1>HERE ARE YOUR MATCHES!</h1>";

        echo "<table class='table table-bordered table-hover' >";
        echo "<tr style='background-color: #6db6b9e6;'>";
                
                echo "<th>"; echo "ID"; echo "</th>";
		echo "<th>"; echo "Username"; echo "</th>";
                echo "<th>"; echo "First Name"; echo "</th>";
                echo "<th>"; echo "Last Name"; echo "</th>";
                echo "<th>"; echo "Education Level"; echo "</th>";
                echo "<th>"; echo "Timeslot"; echo "</th>";
                echo "<th>"; echo "Rate"; echo "</th>";
                echo "<th>"; echo "User Type"; echo "</th>";
                echo "<th>"; echo "Area"; echo "</th>";
                echo "<th>"; echo "Subject 1"; echo "</th>";
                echo "<th>"; echo "Subject 2"; echo "</th>";
                echo "<th>"; echo "Subject 3"; echo "</th>";
                echo "<th>"; echo "Available Day 1"; echo "</th>";
                echo "<th>"; echo "Available Day 2"; echo "</th>";
                echo "<th>"; echo "Available Day 3"; echo "</th>";
            "</tr>";
            while($sr= mysqli_fetch_assoc($results)){   
                echo"<tr>";
                echo"<td>".$sr['id']."</td>";
		echo"<td>".$sr['username']."</td>";
                echo"<td>".$sr['firstname']."</td>";
                echo"<td>".$sr['lastname']."</td>";
                echo"<td>".$sr['edulevel']."</td>";
                echo"<td>".$sr['timeslot']."</td>";
                echo"<td>".$sr['rate']."</td>";
                echo"<td>".$sr['userType']."</td>";
                echo"<td>".$sr['area']."</td>";
                echo"<td>".$sr['subject1']."</td>";
                echo"<td>".$sr['subject2']."</td>";
                echo"<td>".$sr['subject3']."</td>";
                echo"<td>".$sr['availableday1']."</td>";
                echo"<td>".$sr['availableday2']."</td>";
                echo"<td>".$sr['availableday3']."</td>";
                echo"</tr>";
            }
        if(isset($_POST['submit1'])){
            mysqli_query($db,"INSERT INTO matchrequest Values('','$_SESSION[login_user]', $_POST[matchid], '', 'NO');");
            mysqli_query($db,"UPDATE matchrequest JOIN users ON users.id=matchrequest.requestid SET matchrequest.requser = users.username;");
            ?>
				<script type="text/javascript">
						window.location="request.php"
				</script>
			<?php
        }

    
        }
}
        //if user not logged in send error message
else{
?>
    <script type="text/javascript">
    alert("You must login to search for a tutor");
    </script>
    <?php
    }

        echo"</table>";
        echo"</center>"; 
?>
<?php

include "footer.php";
?>
</body>
</html>
