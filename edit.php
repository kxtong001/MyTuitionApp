<?php
	include "navbar.php";
	include "connection.php";
?>
<!DOCTYPE html>
<html>
<head>
	<title>edit profile</title>
	<style type="text/css">
		.form-control
		{
			width:250px;
			height: 38px;
		}
		.form1
		{
			margin:0 200px;
		}
		label
		{
			color: black;
		}

	</style>
</head>
<body style="background-color: #F5FCFF;">

	<h2 style="text-align: center;color: #000000;">Edit Information</h2>
	<?php
		
		$sql = "SELECT * FROM users JOIN matchinfo ON users.id = matchinfo.used_id WHERE users.username='$_SESSION[login_user]';";
		$result = mysqli_query($db,$sql) or die (mysql_error());

		while ($row = mysqli_fetch_assoc($result)) 
		{
			$email=$row['email'];
    		$phone=$row['phone'];
    		$firstname=$row['firstname'];
    		$lastname=$row['lastname'];
    		$username=$row['username'];
    		$password=$row['password'];
    		$userType=$row['userType'];
    		$area=$row['area'];
    		$edulevel=$row['edulevel'];
    		$subject1=$row['subject1'];
    		$subject2=$row['subject2'];
    		$subject3=$row['subject3'];
    		$timeslot=$row['timeslot'];
    		$availableday1=$row['availableday1'];
    		$availableday2=$row['availableday2'];
    		$availableday3=$row['availableday3'];
    		$rate=$row['rate'];
		}

	?>

	<div class="profile_info" style="text-align: center;">
		<span style="color: black;">Welcome,</span>	
		<h4 style="color: black;"><?php echo $_SESSION['login_user']; ?></h4>
	</div><br><br>

	<?php
 			echo "<div style='text-align: center'>
 				<img class='img-circle profile-img' height=110 width=120 src='images/".$_SESSION['pic']."'>
 			</div>";
 		?>
	
	<div class="form1">
		<form action="" method="post" enctype="multipart/form-data">

			<div class="d-flex justify-content-center">
			<label><h4><b>Profile Picture: </b></h4></label>
				<input class="form-control" type="file" name="file" aria-describedby="fileHelper">
				<small id="fileHelper" class="form-text text-muted">
					Upload a Image file for your profile image.
				</small>
			</div>	
		
		<div class="form-row">
			<div class="form-group col-md-4">
			<label><h4><b>First Name: </b></h4></label>
				<input class="form-control" type="text" name="firstname" value="<?php echo $firstname; ?>"required ="">
			</div>
			<div class="form-group col-md-4">
			<label><h4><b>Last Name:</b></h4></label>
				<input class="form-control" type="text" name="lastname" value="<?php echo $lastname; ?>"required ="">
			</div>	
			<div class="form-group col-md-4">
			<label><h4><b>Phone: </b></h4></label>
				<input class="form-control" type="text" name="phone" value="<?php echo $phone; ?>" required ="">
			</div>		
	    </div>	

		<div class="form-row">
			<div class="form-group col-md-4">
				<label><h4><b>Username: </b></h4></label>
				<input class="form-control" type="text" name="username" value="<?php echo $username; ?>"aria-describedby="usernameHelper" required ="">
				<small id="usernameHelper" class="form-text text-muted">
                    Must not contain spaces, special characters,emoji.
                </small>
			</div>
			<div class="form-group col-md-4">
				<label><h4><b>Password: </b></h4></label>
				<input class="form-control" type="text" name="password" value="<?php echo $password; ?>"aria-describedby="passwordHelper" required ="">
				<small id="passwordHelper" class="form-text text-muted">
                    Must not contain spaces, special characters,emoji.
                </small>
			</div>	
			<div class="form-group col-md-4">
				<label><h4><b>Email: </b></h4></label>
				<input class="form-control" type="email" name="email" value="<?php echo $email; ?>"aria-describedby="emailHelper" required ="">
				<small id="emailHelper" class="form-text text-muted">
                    Please enter a valid email address.
                </small>
			</div>		
	    </div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="userType">Role</label>
					<select id="userType" class="form-control" name="userType" aria-describedby="tutorHelper" required>
							<option selected><?php echo $userType; ?></option>
							<option>Tutor</option>
							<option>Tutee</option>
					</select>
					<small id="tutorHelper" class="form-text text-muted">
					Please indicate if you are a tutor or tutee.
					</small>
			</div>

			<div class="form-group col-md-4">
				<label for="area">Area</label>
					<select id="area" class="form-control" name="area" aria-describedby="locationHelper" required>
						<option selected><?php echo $area; ?></option>
						<option>North</option>
						<option>West</option>
						<option>Central</option>
						<option>East</option>
					</select>
					<small id="locationHelper" class="form-text text-muted">
					Please indicate the region you're staying in Singapore.
					</small>
			</div>	
			<div class="form-group col-md-4">
				<label for="edulevel">Level of Education</label>
					<select id="edulevel" class="form-control" name="edulevel" aria-describedby="levelHelper" required>
							<option selected><?php echo $edulevel; ?></option>
							<option>Lower Primary</option>
							<option>Upper Primary</option>
							<option>Lower Secondary</option>
							<option>Upper Secondary</option>
							<option>Junior College/MI</option>
					</select>
					<small id="levelHelper" class="form-text text-muted">
					Please indicate the education level you are looking for.
					</small>
			</div>		
	    </div>


		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="subject1">Subject 1:</label>
					<select id="subject1" class="form-control" name="subject1" aria-describedby="subjectHelper" required>
							<option selected><?php echo $subject1; ?></option>
							<option>English</option>
							<option>Chinese</option>
							<option>Malay</option>
							<option>Tamil</option>
							<option>Maths</option>
							<option>Science</option>
							<option>Humanities</option>
					</select>
					<small id="subjectHelperr" class="form-text text-muted">
					Please indicate the subject you are looking for.
					</small>
			</div>

			<div class="form-group col-md-4">
				<label for="area">Subject 2:</label>
					<select id="area" class="form-control" name="subject2" >
						<option selected><?php echo $subject2; ?></option>
						<option>English</option>
						<option>Chinese</option>
						<option>Malay</option>
						<option>Tamil</option>
						<option>Maths</option>
						<option>Science</option>
						<option>Humanities</option>
					</select>
					<small id="subjectHelper" class="form-text text-muted">
					Please indicate the subject you are looking for.
					</small>
			</div>	
			<div class="form-group col-md-4">
				<label for="edulevel">Subject 3:</label>
					<select id="edulevel" class="form-control" name="subject3" >
							<option selected><?php echo $subject3; ?></option>
							<option>English</option>
							<option>Chinese</option>
							<option>Malay</option>
							<option>Tamil</option>
							<option>Maths</option>
							<option>Science</option>
							<option>Humanities</option>
					</select>
					<small id="subjectHelper" class="form-text text-muted">
					Please indicate the subject you are looking for.
					</small>
			</div>		
	    </div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="availableday1">1st Preferred Day of the week:</label>
					<select id="availableday1" class="form-control" name="availableday1" aria-describedby="dayHelper" required>
							<option selected><?php echo $availableday1; ?></option>
							<option>Monday</option>
							<option>Tuesday</option>
							<option>Wednesday</option>
							<option>Thursday</option>
							<option>Friday</option>
							<option>Saturday</option>
							<option>Sunday</option>
					</select>
					<small id="subjectHelperr" class="form-text text-muted">
					Please indicate your preferred day.
					</small>
			</div>

			<div class="form-group col-md-4">
				<label for="availableday2">2nd Preferred Day of the week:</label>
					<select id="availableday2" class="form-control" name="availableday2" >
						<option selected><?php echo $availableday2; ?></option>
						<option>Monday</option>
						<option>Tuesday</option>
						<option>Wednesday</option>
						<option>Thursday</option>
						<option>Friday</option>
						<option>Saturday</option>
						<option>Sunday</option>
					</select>
					<small id="dayHelper" class="form-text text-muted">
					Please indicate the subject you are looking for.
					</small>
			</div>	
			<div class="form-group col-md-4">
				<label for="availableday3">3rd Preferred Day of the week:</label>
					<select id="availableday3" class="form-control" name="availableday3" >
							<option selected><?php echo $availableday3; ?></option>
							<option>Monday</option>
							<option>Tuesday</option>
							<option>Wednesday</option>
							<option>Thursday</option>
							<option>Friday</option>
							<option>Saturday</option>
							<option>Sunday</option>
					</select>
					<small id="dayHelper" class="form-text text-muted">
					Please indicate the subject you are looking for.
					</small>
			</div>		
	    </div>

		<div class="form-row">
			<div class="form-group col-md-4">
				<label for="timeslot">Preferred Time Slot:</label>
					<select id="timeslot" class="form-control" name="timeslot" aria-describedby="timeHelper" required>
							<option selected><?php echo $timeslot; ?></option>
							<option>Morning</option>
							<option>Afternoon</option>
							<option>Night</option>
					</select>
					<small id="timeHelperr" class="form-text text-muted">
					Please indicate your preferred time of the day.
					</small>
			</div>

			<div class="form-group col-md-4">
				<label for="rate">Preferred Tuition Rate:</label>
					<select id="rate" class="form-control" name="rate" aria-describedby="rateHelper" required>
						<option selected><?php echo $rate; ?></option>
						<option>30</option>
						<option>50</option>
						<option>70</option>
						<option>100</option>
						<option>120</option>
					</select>
					<small id="rateHelper" class="form-text text-muted">
					Please indicate your preferred tuition rate.
					</small>
			</div>	
			<div class="form-group col-md-4">
				
			</div>		
	    </div>


		<br>
		<div style="padding-left: 100px;">
			<button class="btn btn-default" type="submit" style="color: black; width: 160px; height: 60px" name="submit">save</button></div>
	</form>
</div>
	<?php 

		if(isset($_POST['submit']))
		{
			move_uploaded_file($_FILES['file']['tmp_name'],"images/".$_FILES['file']['name']);

			
			$email=$_POST['email'];
			$contact=$_POST['phone'];
			$firstname=$_POST['firstname'];
			$lastname=$_POST['lastname'];
			$username=$_POST['username'];
			$password=$_POST['password'];
			$userType=$_POST['userType'];
			$pic=$_FILES['file']['name'];
			$area=$_POST['area'];
    		$edulevel=$_POST['edulevel'];
    		$subject1=$_POST['subject1'];
    		$subject2=$_POST['subject2'];
    		$subject3=$_POST['subject3'];
    		$timeslot=$_POST['timeslot'];
    		$availableday1=$_POST['availableday1'];
    		$availableday2=$_POST['availableday2'];
    		$availableday3=$_POST['availableday3'];
    		$rate=$_POST['rate'];

			$sql1 ="UPDATE matchinfo JOIN users ON matchinfo.used_id = users.id SET area='$area', edulevel='$edulevel', subject1='$subject1', subject2='$subject2', subject3='$subject3', timeslot='$timeslot', availableday1='$availableday1',availableday2='$availableday2',availableday3='$availableday3',rate='$rate' WHERE username='".$_SESSION['login_user']."';";
			$result = mysqli_query($db, $sql1);
			$sql2 = "UPDATE users SET pic='$pic', firstname='$firstname', lastname='$lastname', username='$username', password ='$password', email='$email', phone='$phone', userType='$userType' WHERE username='".$_SESSION['login_user']."';";
			
			if(mysqli_query($db, $sql2))
			{
				
				?>
					<script type="text/javascript">
						alert("Saved Successfully.");
						window.location="profile.php";
					</script>
				<?php
			}
			else
    		{

    		?>
    		<script type="text/javascript">
              alert("Error has occured. Please check your inputs and try again.");
    		</script>
    		<?php

    		}
		}
 	?>
</body>
</html>

