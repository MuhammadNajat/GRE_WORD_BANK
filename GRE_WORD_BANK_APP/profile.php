<?php session_start(); ?>

<?php include "class_and_db.php"; ?>

<?php

    $username = $_SESSION['username'];

    $conUs = new mysqli("localhost", "username", "password", "test");
    $result = $conUs->query("SELECT * FROM users where name = '$username'");

    $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="test_nav_css.css">

	<!--<link rel="stylesheet" type="text/css" href="search_style.css"> -->

    <style type="text/css">

        form {border: 3px solid #f1f1f1;}

        input[type=text], input[type=password] {
          width: 100%;
          padding: 12px 20px;
          margin: 8px 0;
          display: inline-block;
          border: 1px solid #ccc;
          box-sizing: border-box;
      }

      .container {
          padding: 16px;
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
    <a href="search_editor.php">&emsp; &emsp; Vocabs Room &emsp; &emsp;</a>
  	<a href="liveSearch.php">&emsp; Live Search &emsp;</a>
    <a href="exam.php">&emsp; &emsp; Exam Room &emsp; &emsp;</a>
    <a href="about.php">&emsp; &emsp; About Us &emsp; &emsp;</a>
    
    <?php
        if(isset($_SESSION["username"])) {
    ?>

            <a href="profile.php">&emsp; &emsp; <?php echo $_SESSION["username"]; ?> &emsp; &emsp;</a>
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

<h2 style="text-align: center; color: blue;">My Profile</h2>

<form style="text-align: center;">

    <div class="container">
        <label for="uname"><b>Username</b></label>
        <input style="text-align: center;" type="text" name="username" value="<?php echo $row['name']; ?>" readonly >

        <label for="email"><b>E-mail</b></label>
        <input style="text-align: center;" type="text" name="email" value="<?php echo $row['email']; ?>" readonly >

        <!--
          <label for="pass1"><b>Password</b></label>
          <input style="text-align: center;" type="text" name="pass1" value="<?php echo $row['pass']; ?>" readonly >
        -->
    </div>
</form>

<!--
    <table style="text-align: center;">
        <tr>
            <td>Name</td> <td><?php echo $row['name']; ?></td>
        </tr>
        <tr>
            <td>E-mail</td> <td><?php echo $row['email']; ?></td>
        </tr>
    </table>
-->


<div id='foot' style="color: red">
	<p>&copy; GRE Word Bank 2018 </p>
	<p>Developed by <a href="about.php">Team Voyagers</a></p>
</div>


</body>
</html>