
<?php session_start(); ?>

<?php include "class_and_db.php"; ?>

<?php

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>


<?php
  
  $con=/*mysqli_connect*/new mysqli("localhost","username","password","test");

// Check connection

  if (/*mysqli_connect_errno()*/!$con) {
      echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

  if(isset($_POST['submit'])) {
    
    //$username = mysqli_real_escape_string($con, $_POST['username']);
    //$pass1 = mysqli_real_escape_string($con, $_POST['pass1']);

    $username = test_input($_POST['username']);

    $pass1 = test_input($_POST['pass1']);

    $pass1 = md5($pass1);
    
    mysqli_query($con,"SELECT * FROM users where name = '$username' AND pass = '$pass1' ");
    //$result = $con->query("SELECT * FROM users where name = '$username' AND pass = '$pass1'")

    if(mysqli_affected_rows($con) > 0) {
      //echo "You have Logged in Successfully!";                   //may be removed later   
      $_SESSION['message'] = "You have Logged in Successfully "; 

      $_SESSION['username'] =  $username;

    ?>

    <script type="text/javascript">
       document.location.href ='index.php';
    </script>

    <?php
    }
    else {
      //echo "Username or Password is Incorrect!";            
      //header("location: signin.php");    
      $_SESSION['message'] = "Username or Password is Incorrect!";  //may be removed later
    }

    ?>

    <script type="text/javascript">
        document.location.href = "signin.php?failedlogin=1";
    </script>

    <?php

  }   

?>



<!DOCTYPE html>
<html>
<head>
  <title></title>

  <link rel="stylesheet" type="text/css" href="test_nav_css.css">

  <!-- <link rel="stylesheet" type="text/css" href="search_style.css"> -->

  <style>
      body {font-family: Arial, Helvetica, sans-serif;}
      form {border: 3px solid #f1f1f1;}

      input[type=text], input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
      }

      button {
          background-color: #4CAF50;
          color: white;
          padding: 14px 20px;
          margin: 8px 0;
          border: none;
          cursor: pointer;
          width: 100%;
      }

      button:hover {
          opacity: 0.8;
      }

      .cancelbtn {
          width: auto;
          padding: 10px 18px;
          background-color: #f44336;
      }

      .imgcontainer {
          text-align: center;
          margin: 24px 0 12px 0;
      }

      img.avatar {
          width: 40%;
          border-radius: 50%;
      }

      .container {
          padding: 16px;
      }

      span.psw {
          float: right;
          padding-top: 16px;
      }

      /* Change styles for span and cancel button on extra small screens */
      @media screen and (max-width: 300px) {
          span.psw {
             display: block;
             float: none;
          }
          .cancelbtn {
             width: 100%;
          }
      }
</style>

</head>
<body style="/*background-image: url('alphabet_3.jpg');*/font-family: sans-serif;">

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
    <a href="liveSearch.php">&emsp; Live Search &emsp;</a>
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


<div style='text-align: center; color: red'>

<?php
    if(isset($_GET['failedlogin'])) {
        echo "<h3> Username or password is incorrect </h3>";
    }

    else if(isset($_GET['examlog'])) {
        echo "<h3> You must be signed in to take an exam </h3>";
        echo "<a href='signup.php'> Don't have an account? </a>";
    }

?>

</div>



<h2>Login Form</h2>

<form action="" method="post">
  <!-- 

  <div class="imgcontainer">
    <img src="img_avatar2.png" alt="Avatar" class="avatar">
  </div>

  -->

  <div class="container">
    <label for="username"><b>Username</b></label>
    <input type="text" placeholder="Enter Username" name="username" required>

    <label for="pass1"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="pass1" required>
        
    <button type="submit" name="submit">Login</button>
    <label>
      <input type="checkbox" checked="checked" name="remember"> Remember me
    </label>
  </div>

</form>

<!---

  <div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="deleteFields()" >Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>

-->


<div id='foot'>
  <p>&copy; GRE Word Bank 2018 </p>
  <p>Developed by <a href="about.php">Team Voyagers</a></p>
</div>


</body>
</html>