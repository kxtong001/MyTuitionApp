<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>
	</title>

	  <link rel="stylesheet" type="text/css" href="style.css">
	  <meta charset="utf-8">
	  <meta name="viewport" content="width=device-width, initial-scale=1">
  
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" >


</head>
<body>

	    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
          <div class="navbar-header">
            <a class="navbar-brand active">Tuition Management System</a>
          </div>
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="review.php">Review</a></li>
          </ul>
          <?php
            if(isset($_SESSION['login_user']))
            {

          ?>
                <ul class="nav navbar-nav">
                  <li><a href="profile.php">PROFILE</a></li>
                  <li><a href="fine.php">FINES</a></li>

                </ul>
                <ul class="nav navbar-nav navbar-right">
                  <li><a href="">
                    <div style="color: white">
                      <?php
                        echo "<img class='img-circle profile_img' height=30 width=30 src='images/".$_SESSION['pic']."'>";
                        echo " ".$_SESSION['login_user']; 
                      ?>
                    </div>
                  </a></li>
                  <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"> LOGOUT</span></a></li>
                </ul>
              <?php
            }
            else
            {   ?>
              <ul class="nav navbar-nav navbar-right">

                <li><a href="login.php"><span class="glyphicon glyphicon-log-in"> Login</span></a></li>
                
                <li><a href="register.php"><span class="glyphicon glyphicon-user"> Register</span></a></li>
              </ul>
                <?php
            }
          ?>

      </div>
    </nav>
    
</body>
</html>