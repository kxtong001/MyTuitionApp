<?php
	include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
    <title>
        Tuition Management System
    </title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style type="text/css">
    {
      margin-top: -50px;
    }
    body{
        padding-top: 68px;
    }
    </style>
</head>


<body>
    <!--- carousel start -->
    <div id="carouselPicture" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            
            <div class="carousel-item active">
            <img class="d-block w-100" src="images/image0.jpg" alt="1">
            
                <div class="carousel-caption">
            <a href="register.php"><button type="button" class="button1">Sign Up</button></a>
                </div>    
            </div>

            <div class="carousel-item">
            <img class="d-block w-100" src="images/image1.jpg" alt="2">
            </div>

            <div class="carousel-item">
            <img class="d-block w-100" src="images/image2.jpg" alt="3">
            </div>

            
        </div>
        <a class="carousel-control-prev" href="#carouselPicture" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselPicture" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--- carousel end -->

    <div class="container">
		<div class="row justify-content-center text-center">
			<div class="col-10 py-5">
				<h2>MyTuitionApp</h2>
				<p class="lead">MyTuitionApp is an open-source front-end website to assist users in getting matches based on their tuition requirements,whether they are tutors seeking students or students seeking tutors.</p><p> Register to start finding matches!</p><a class="btn btn-purple btn-lg" href="register.php" >Register now!</a>
			</div>
		</div>
	</div>
    


    </div>
    <?php

    include "footer.php";
    ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>