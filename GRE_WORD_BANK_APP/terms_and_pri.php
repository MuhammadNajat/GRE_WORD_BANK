<?php include "class_and_db.php"; ?>


<!DOCTYPE html>
<html>
<head>
	<title></title>

	<link rel="stylesheet" type="text/css" href="test_nav_css.css">

	<link rel="stylesheet" type="text/css" href="search_style.css">

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
	<a href="profile.php">&emsp; &emsp; Home &emsp; &emsp;</a>
    <a href="search_editor.php">&emsp; &emsp; Vocabs Room &emsp; &emsp;</a>
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

<div>
    <h1 style="text-align: center; color: #128BC7">TERMS AND CONDITIONS ARE YET TO BE DETERMINED</h1>
    <h2 style="text-align: center; color: #F92672">THANK YOU</h2>
</div>


<div id='foot' style="color: red">
	<p>&copy; GRE Word Bank 2018 </p>
	<p>Developed by <a href="about.php">Team Voyagers</a></p>
</div>


</body>
</html>