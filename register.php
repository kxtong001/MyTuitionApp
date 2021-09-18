<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html>
<head>

    <title>Registration</title>
    
    <link rel="stylesheet" type="text/css" href="style.css">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        section {
            margin-top: -20px;
        }
    </style>
</head>
<body>

    <section>
        <div class="reg_img">

            <div class="box2">

                <h1 style="text-align: center; font-size: 22px;">User Registration Form</h1>

                <form name="Registration" action="" method="post">
                    <div class="login">
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="phone">Contact</label>
                                <input type="text" 
                                       onkeypress= "return onlyNumberKey(event)" 
                                       maxlength="11"class="form-control" name="phone" placeholder="Phone Number" required="">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" required="">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname"  placeholder="Last Name" required="">
                            </div>
                        </div>
                        
                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" aria-describedby="usernameHelper" required="">
                                <small id="usernameHelper" class="form-text text-muted">
                                Must not contain spaces, special characters,emoji.
                                </small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Password" aria-describedby="passwordHelper" required="">
                                <small id="passwordHelper" class="form-text text-muted">
                                Must not contain spaces, special characters,emoji.
                                </small>

                            </div>
                            <div class="form-group col-md-3">
                                <label for="userType">Tutor or Tutee?</label>
                                <select id="userType" class="form-control" name="userType" aria-describedby="tutorHelper" required>
                                    <option selected></option>
                                    <option>Tutor</option>
                                    <option>Tutee</option>
                                </select>
                                <small id="tutorHelper" class="form-text text-muted">
                                Please indicate if you are a tutor or tutee.
                                </small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="area">Area</label>
                                <select id="area" class="form-control" name="area" aria-describedby="locationHelper" required>
                                    <option selected></option>
                                    <option>North</option>
                                    <option>West</option>
                                    <option>Central</option>
                                    <option>East</option>
                                </select>
                                <small id="locationHelper" class="form-text text-muted">
                                Please indicate which region you're staying in Singapore.
                                </small>
                            </div>    

                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="edulevel">Level of Education</label>
                                <select id="edulevel" class="form-control" name="edulevel" aria-describedby="levelHelper" required>
                                        <option selected></option>
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
                            <div class="form-group col-md-3">
                                <label for="subject1">Subject 1:</label>
                                <select id="subject1" class="form-control" name="subject1" aria-describedby="subjectHelper" required>
                                        <option selected></option>
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
                            <div class="form-group col-md-3">
                                <label for="subject2">Subject 2:</label>
                                <select id="subject2" class="form-control" name="subject2">
                                        <option selected></option>
                                        <option>English</option>
                                        <option>Chinese</option>
                                        <option>Malay</option>
                                        <option>Tamil</option>
                                        <option>Maths</option>
                                        <option>Science</option>
                                        <option>Humanities</option>
                                </select>
                                <small id="subjectHelper" class="form-text text-muted">
                                (Optional)Please indicate the subject you are looking for.
                                </small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="subject3">Subject 3:</label>
                                <select id="subject3" class="form-control" name="subject3">
                                        <option selected></option>
                                        <option>English</option>
                                        <option>Chinese</option>
                                        <option>Malay</option>
                                        <option>Tamil</option>
                                        <option>Maths</option>
                                        <option>Science</option>
                                        <option>Humanities</option>
                                </select>
                                <small id="subjectHelper" class="form-text text-muted">
                                (Optional)Please indicate the subject you are looking for.
                                </small>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-3">
                                <label for="timeslot">Timeslot:</label>
                                <select id="timeslot" class="form-control" name="timeslot" aria-describedby="timeHelper" required>
                                        <option selected></option>
                                        <option>Morning</option>
                                        <option>Afternoon</option>
                                        <option>Night</option>
                                </select>
                                <small id="timeHelper" class="form-text text-muted">
                                Please indicate your available time of the day.
                                </small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="availableday1">Available Day 1:</label>
                                <select id="availableday1" class="form-control" name="availableday1" aria-describedby="dayHelper" required>
                                        <option selected></option>
                                        <option>Monday</option>
                                        <option>Tuesday</option>
                                        <option>Wednesday</option>
                                        <option>Thursday</option>
                                        <option>Friday</option>
                                        <option>Saturday</option>
                                        <option>Sunday</option>
                                </select>
                                <small id="dayHelper" class="form-text text-muted">
                                Please indicate your available day(s).
                                </small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="availableday2">Available Day 2:</label>
                                <select id="availableday2" class="form-control" name="availableday2">
                                        <option selected></option>
                                        <option>Monday</option>
                                        <option>Tuesday</option>
                                        <option>Wednesday</option>
                                        <option>Thursday</option>
                                        <option>Friday</option>
                                        <option>Saturday</option>
                                        <option>Sunday</option>
                                </select>
                                <small id="dayHelper" class="form-text text-muted">
                                (Optional)Please indicate your available day(s).
                                </small>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="availableday3">Available Day 3:</label>
                                <select id="availableday3" class="form-control" name="availableday3">
                                        <option selected></option>
                                        <option>Monday</option>
                                        <option>Tuesday</option>
                                        <option>Wednesday</option>
                                        <option>Thursday</option>
                                        <option>Friday</option>
                                        <option>Saturday</option>
                                        <option>Sunday</option>
                                </select>
                                <small id="dayHelper" class="form-text text-muted">
                                (Optional)Please indicate your available day(s).
                                </small>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="rate">Tuition Rate($):</label>
                                <select id="availableday3" class="form-control" name="rate" aria-describedby="rateHelper" required>
                                    <option selected></option>
                                    <option>30</option>
                                    <option>50</option>
                                    <option>70</option>
                                    <option>100</option>
                                    <option>120</option>
                                </select>
                                <small id="rateHelper" class="text-muted">
                                Please choose the mininum rate you are looking for.
                                </small>
                            </div> 
                            <div class="form-group col-md-6">                               
                            <input class="btn btn-default" type="submit" name="submit" value="Register" style="color: black; float: left; width: 200px; height: 60px">
                            </div>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </section>

    <?php

    if(isset($_POST['submit']))
    {
    
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $firstname=$_POST['firstname'];
    $lastname=$_POST['lastname'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    $userType=$_POST['userType'];
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

    $count=0;
    $sql="SELECT username from `users`";
    $res=mysqli_query($db,$sql);
    
    while($row=mysqli_fetch_assoc($res))
    {
        if($row['username']==$username)
        {
         $count=$count+1;
        }
    }
    if($count==0)
    {
        //inserts into users in the database with user related info
        $ins="INSERT INTO `users` VALUES('','$email','$phone','$firstname','$lastname','$username','$password','$userType', 'p.jpg');";
        $result = mysqli_query($db,$ins);

        //inserts into matchinfo in the database with match related info
        $insert="INSERT INTO `matchinfo` VALUES('','$area','$edulevel','$subject1','$subject2','$subject3','$timeslot','$availableday1','$availableday2','$availableday3','$rate',LAST_INSERT_ID());";
        $result .= mysqli_query($db,$insert);
    ?>
    <script type="text/javascript">
           alert("Registration successful");
    </script>
    <?php
    }
    else
    {

    ?>
    <script type="text/javascript">
              alert("The username already exist.");
    </script>
    <?php

    }

    }

    ?>

<br />
<br />
<br />
<br />
<?php

include "footer.php";
?>
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
