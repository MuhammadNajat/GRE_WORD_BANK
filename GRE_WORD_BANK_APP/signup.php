<?php session_start(); ?>

<!-- <?php include "class_and_db.php"; ?> -->


<?php

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>



<?php

    $con = new mysqli("localhost","username","password","test");

// Check connection

    
    if (!$con) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    

    if(isset($_POST['submit'])) {
        /*
        $username = mysqli_real_escape_string($con, $_POST['name']);
        $email = mysqli_real_escape_string($con, $_POST['email']);
        $pass1 = mysqli_real_escape_string($con, $_POST['pass1']);
        $pass2 = mysqli_real_escape_string($con, $_POST['pass2']);
        */

        $username = test_input($_POST['name']);
        $email = test_input($_POST['email']);
        $pass1 = test_input($_POST['pass1']);
        $pass2 = test_input($_POST['pass2']);

        $pass3 = md5($pass1);              //
        $pass4 = md5($pass2);              //

        
        //mysqli_query($con,"SELECT * FROM userdb where name = '$username' OR email = '$email' ");
        $result = $con->query("SELECT * FROM users where name = '$username' OR email = '$email'");

        $row=$result->fetch_assoc();

        if($row) {
            /*echo "Username or E-mail already Exists";                     //note:  may be removed later or do in another way*/
            $_SESSION['message'] = "Username or E-mail already Exists"; 
        }


        else if(strlen($username) > 15) {
            $_SESSION["message"] = "Username can have at most 15 characters";
        }

        else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION["message"] = "Invalid email format"; 
        }

        else if($pass1 == $pass2 && strlen($pass1) >= 8) {
            //$pass1 = md5($pass3);
            $password = $pass3;

            $sql = "INSERT INTO users (id, name, email, pass) VALUES ('', '$username', '$email', '$password')";

            if (!$con->query($sql)) {
                die('Error: ' . mysqli_error($con));
            }

            /** inserting in my backup table for admin panel **/

                mysqli_close($con);

                $con = new mysqli("localhost","username","password","gwb_admin");

                // Check connection
   
                if (!$con) {
                    die("Failed to connect to MySQL: " . mysqli_connect_error());
                }

                if (!$con->query($sql)) {
                    die('Error: ' . mysqli_error($con));
                }


            /** inserting in the backup - end **/

            $_SESSION["message"] = "Rgistration Done Successfully!";
            $_SESSION["username"] = $username;

        ?>

        <script type="text/javascript">
                document.location.href ='index.php?userlogin=1';
        </script>

        <?php

            /*header("Location: index.php");                  // Homepage should be given in the place of '#'*/

        }

        else if($pass1 == $pass2 && strlen($pass1) < 8) {
            /*echo "Length of Password should be at Least 6";                    //note:  may be removed later or do in another way*/
            $_SESSION['message'] = "Length of password should be at least 8"; 
        }

        else {
            /*echo "The 2 Passwords Don't Match.";                               //note:  may be removed later or do in another way*/
            $_SESSION['message'] = "Passwords Don't Match."; 
        }

        ?>

        <script type="text/javascript">
            document.location.href = "signup.php?failedsignup=1";
        </script>

<?php

    }       

?>




<!DOCTYPE html>
<html>
<head>
    <title></title>

    <link rel="stylesheet" type="text/css" href="test_nav_css.css">

    <style type="text/css">
        
        body {font-family: Arial, Helvetica, sans-serif;}
        * {box-sizing: border-box}

        /* Full-width input fields */
        input[type=text], input[type=password] {
            width: 100%;
            padding: 15px;
            margin: 5px 0 22px 0;
            display: inline-block;
            border: none;
            background: #f1f1f1;
        }

        input[type=text]:focus, input[type=password]:focus {
            background-color: #ddd;
            outline: none;
        }

        hr {
            border: 1px solid #f1f1f1;
            margin-bottom: 25px;
        }

        /* Set a style for all buttons */
        button {
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            cursor: pointer;
            width: 100%;
            opacity: 0.9;
        }

        button:hover {
            opacity:1;
        }

        /* Extra styles for the cancel button */
        .cancelbtn {
            padding: 14px 20px;
            background-color: #f44336;
        }

        /* Float cancel and signup buttons and add an equal width */
        .cancelbtn, .signupbtn {
          float: left;
          width: 50%;
        }

        /* Add padding to container elements */
        .container {
            padding: 16px;
        }

        /* Clear floats */
        .clearfix::after {
            content: "";
            clear: both;
            display: table;
        }

        /* Change styles for cancel button and signup button on extra small screens */
        @media screen and (max-width: 300px) {
            .cancelbtn, .signupbtn {
               width: 100%;
            }
        }

    </style>

    <!-- <link rel="stylesheet" type="text/css" href="search_style.css"> -->

</head>
<body>

<!-- 
<div class="bgner"> 
    <p style="font-size: 40px;">GRE WORD BANK</p>
</div>
-->

<!--header-->

<div style="background-color: #D7D8EC; padding: 6px 7px">

        <div style="display: inline;">
            <a href="index.php"><img src="gwb12.png" style="/*display: inline;*/"></a> <!--<p style="/*display: inline;*/font-size: 22px;float: right;">Online Tutor</p> -->
        </div>

        <div style="display: inline; float: right;">
            <br>
            <img src="gwb16.png" >
        </div>

</div>

<!--header/-->

<div class="topnav" id="myTopnav">
<!-- p style="background-color: green; font-size: 20px;">GRE WORD BANK</p> -->
    <a href="index.php">&emsp; &emsp; Home &emsp; &emsp;</a>
    <a href="search_editor.php">&emsp; Vocabs Room &emsp;</a>
    <a href="liveSearch.php">&emsp; &emsp; Live Search &emsp; &emsp;</a>
    <a href="exam.php">&emsp; &emsp; Exam Room &emsp; &emsp;</a>
    <a href="about.php">&emsp; &emsp; About Us &emsp; &emsp;</a>
    <?php
        if(isset($_SESSION['name'])) {
    ?>
            <a href="signout.php">&emsp; &emsp; Sign out &emsp; &emsp;</a>
    <?php
        }
        else {
    ?>
            <a href="signin.php">&emsp; &emsp; Sign in &emsp; &emsp;</a>
            <a href="signup.php">&emsp; &emsp; Sign up &emsp; &emsp;</a>
    <?php
        }
    ?>

  <!-- <a href="javascript:void(0);" class="icon" onclick="myFunction()">&#9776;</a> -->



</div>


<form style="border:1px solid #ccc" action="" method="post">
  <div class="container">

    <?php
        if(isset($_GET['failedsignup'])) {
            echo "<h3 style='text-align: center; color: red'>" . $_SESSION['message'] . "</h3>";
        }
    ?>

    <h1>Sign Up</h1>
    <p>Please fill in this form to create an account.</p>
    <hr>

    <label for="name"><b>User Name</b></label>
    <input type="text" placeholder="Enter User Name (at most 15 characters)" name="name" required>

    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="email" required>

    <label for="psw"><b>Password</b></label>
    <input type="password" placeholder="Enter Password (at least 8 characters)" name="pass1" required>

    <label for="psw-repeat"><b>Repeat Password</b></label>
    <input type="password" placeholder="Repeat Password" name="pass2" required>
    
    <label><b>Remember Me</b></label>
      <input type="checkbox" checked="checked" name="remember" style="margin-bottom:15px">
    
    <p>By creating an account you agree to our <a href="terms_and_pri.php" style="color:dodgerblue">Terms & Privacy</a>.</p>

    <div class="clearfix">
      <button type="button" class="cancelbtn">Cancel</button>
      <button type="submit" class="signupbtn" name="submit" >Sign Up</button>
    </div>
  </div>
</form>


<div id='foot'>
    <p>&copy; GRE Word Bank 2018 </p>
    <p>Developed by <a href="about.php">Team Voyagers</a></p>
</div>


</body>
</html>