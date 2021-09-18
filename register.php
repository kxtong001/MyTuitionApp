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
                <h1 style="text-align: center; font-size: 28px;font-family: Lucida Console;"> Tuition Management System</h1>
                <h1 style="text-align: center; font-size: 22px;">User Registration Form</h1>

                <form name="Registration" action="" method="post">
                    <div class="login">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Email" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="phone">Contact</label>
                                <input type="text" 
                                       onkeypress= "return onlyNumberKey(event)" 
                                       maxlength="11"class="form-control" name="phone" placeholder="Phone Number" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstname">First Name</label>
                                <input type="text" class="form-control" name="firstname" placeholder="First Name" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastname">Last Name</label>
                                <input type="text" class="form-control" name="lastname"  placeholder="Last Name" required="">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" name="username" placeholder="Username" required="">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="inputPassword4">Password</label>
                                <input type="password" class="form-control" name="password"  placeholder="Password" required="">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="area">Area</label>
                            <select id="area" class="form-control" name="area"required>
                                <option selected></option>
                                <option>North</option>
                                <option>West</option>
                                <option>Central</option>
                                <option>East</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="userType">Tutor or Tutee?</label>
                            <select id="userType" class="form-control" name="userType" required>
                                <option selected></option>
                                <option>Tutor</option>
                                <option>Tutee</option>
                            </select>
                        </div>
                        <input class="btn btn-default" type="submit" name="submit" value="Register" style="color: black; width: 70px; height: 30px">
                    </div>
                </form>

            </div>
        </div>
    </section>

    <?php

    if(isset($_POST['submit']))
    {
    $count=0;
    $sql="SELECT username from `users`";
    $res=mysqli_query($db,$sql);

    while($row=mysqli_fetch_assoc($res))
    {
        if($row['username']==$_POST['username'])
        {
         $count=$count+1;
        }
    }
    if($count==0)
    {
    mysqli_query($db,"INSERT INTO `users` VALUES('','$_POST[email]', '$_POST[phone]', '$_POST[firstname]', '$_POST[lastname]', '$_POST[username]', '$_POST[password]','$_POST[area]','$_POST[userType]', 'p.jpg');");
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